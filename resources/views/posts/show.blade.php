<x-layouts.app>
    <x-slot:title>{{ $post->title }}</x-slot:title>
    <div class="px-6 pt-8 mx-auto max-w-7xl sm:px-8 lg:pt-16">
        <header class="container rounded-xl">
            <div class="max-w-screen-md mx-auto">
                <div class="">
                    <div class="space-y-5">
                        <div class="flex flex-wrap space-x-2">
                            <a class="inline-flex px-3 py-1 text-xs font-medium text-red-800 transition-colors duration-300 bg-red-100 rounded-full hover:text-white nc-Badge hover:bg-red-800" href="{{ route('categories.show', $post->category) }}">
                                {{ $post->category->name }}
                            </a>
                        </div>
                        <h1 class="text-neutral-900 font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100 max-w-4xl" title="{{ $post->name }}">
                            {{ $post->title }}
                        </h1>
                        <div class="w-full border-b border-neutral-200 dark:border-neutral-700"></div>
                        <div class="flex flex-col justify-between space-y-5 sm:flex-row sm:items-end sm:space-y-0 sm:space-x-5">
                            <div class="flex flex-wrap items-center flex-shrink-0 text-sm leading-none text-left text-neutral-700 dark:text-neutral-200">
                                <a class="flex items-center space-x-2" href="{{ route('posts.show', $post) }}">
                                    <div class="relative inline-flex items-center justify-center flex-shrink-0 w-10 h-10 overflow-hidden text-xl font-semibold uppercase shadow-inner wil-avatar text-neutral-100 rounded-ful sm:h-11 sm:w-11 ring-1 ring-white dark:ring-neutral-900">
                                        <img src="{{ $post->author->avatar_url }}" class="absolute inset-0 object-cover w-full h-full" alt="{{ $post->author->name }}" />
                                    </div>
                                </a>
                                <div class="ml-3">
                                    <div class="flex items-center">
                                        <a class="block font-semibold" href="{{ route('posts.show', $post) }}">
                                            {{ $post->author->name }}
                                        </a>
                                    </div>
                                    <div class="text-xs mt-1.5">
                                        <span class="text-neutral-700 dark:text-neutral-300">{{ $post->created_at->format('M d, Y') }}</span>
                                        <span class="mx-2 font-semibold">·</span>
                                        <span class="text-neutral-700 dark:text-neutral-300">{{ $post->read_duration }} phút đọc</span>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="flex flex-row space-x-2.5 items-center">
                                    <div class="flex items-center space-x-2.5">
                                        <button wire:click="like" class="relative min-w-[68px] flex items-center rounded-full leading-none group transition-colors px-4 h-9 text-sm text-neutral-700 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 hover:bg-rose-50 dark:hover:bg-rose-100 hover:text-rose-600 dark:hover:text-rose-500" title="Liked">
                                            <x-lineicons-eye class="w-4 h-4 fill-current" />
                                            <span class="ml-1 text-neutral-900 dark:text-neutral-200">{{ number_format($post->views) }}</span>
                                        </button>
                                        <livewire:like-post :$post />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="relative my-10 sm:my-12 aspect-w-16 aspect-h-12 md:aspect-h-9 lg:aspect-h-6">
            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="absolute inset-0 object-cover w-full h-full rounded-3xl" />
        </div>

        <div class="container mt-10">
            <div class="relative">
                <div class="space-y-10">
                    <div class="prose lg:prose-lg !max-w-screen-md mx-auto dark:prose-invert">
                        {!! $post->content_html !!}
                    </div>
                    <div class="flex flex-wrap max-w-screen-md mx-auto">
                        @foreach($post->tags as $tag)
                        <a class="inline-block bg-white hover:bg-neutral-50 text-sm text-neutral-600 dark:text-neutral-300 py-2 px-3 rounded-lg md:py-2.5 md:px-4 dark:bg-neutral-900 mr-2 mb-2">
                            {{ $tag->name }}
                        </a>
                        @endforeach
                    </div>
                    <div class="max-w-screen-md mx-auto border-t border-b border-neutral-100 dark:border-neutral-700"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative py-16 mt-16 bg-neutral-100 dark:bg-neutral-800 lg:py-28 lg:mt-28">
        <div class="px-6 mx-auto max-w-7xl sm:px-8">
            <div class="relative flex flex-col justify-between mb-10 sm:flex-row sm:items-end text-neutral-900 dark:text-neutral-50">
                <div class="max-w-2xl">
                    <h2 class="text-2xl font-semibold md:text-3xl lg:text-4xl">Bài viết liên quan</h2>
                </div>
            </div>

            <x-posts :posts="$relatedPosts" />
        </div>
    </div>
</x-layouts.app>
