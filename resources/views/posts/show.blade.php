<x-layout>
    <div class="max-w-7xl mx-auto px-6 sm:px-8 pt-8 lg:pt-16">
        <header class="container rounded-xl">
            <div class="max-w-screen-md mx-auto">
                <div class="">
                    <div class="space-y-5">
                        <div class="flex flex-wrap space-x-2">
                            <a class="transition-colors hover:text-white duration-300 nc-Badge inline-flex py-1 rounded-full font-medium text-xs px-3 text-red-800 bg-red-100 hover:bg-red-800" href="{{ route('categories.show', $post->category) }}">
                                {{ $post->category->name }}
                            </a>
                        </div>
                        <h1 class="text-neutral-900 font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100 max-w-4xl" title="{{ $post->name }}">
                            {{ $post->title }}
                        </h1>
                        <div class="w-full border-b border-neutral-200 dark:border-neutral-700"></div>
                        <div class="flex flex-col sm:flex-row justify-between sm:items-end space-y-5 sm:space-y-0 sm:space-x-5">
                            <div class="flex items-center flex-wrap text-neutral-700 text-left dark:text-neutral-200 text-sm leading-none flex-shrink-0">
                                <a class="flex items-center space-x-2" href="{{ route('posts.show', $post) }}">
                                    <div
                                        class="wil-avatar relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden text-neutral-100 uppercase font-semibold shadow-inner rounded-ful h-10 w-10 sm:h-11 sm:w-11 text-xl ring-1 ring-white dark:ring-neutral-900"
                                    >
                                        <img
                                            src="{{ $post->author->avatar_url }}"
                                            class="absolute inset-0 w-full h-full object-cover"
                                            alt="{{ $post->author->name }}"
                                        />
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
                                        <button
                                            class="relative min-w-[68px] flex items-center rounded-full leading-none group transition-colors px-4 h-9 text-sm text-neutral-700 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 hover:bg-rose-50 dark:hover:bg-rose-100 hover:text-rose-600 dark:hover:text-rose-500"
                                            title="Liked"
                                        >
                                            <x-lineicons-heart class="w-4 h-4 fill-current" />
                                            <span class="ml-1 text-neutral-900 dark:text-neutral-200">34</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="my-10 sm:my-12 relative aspect-w-16 aspect-h-12 md:aspect-h-9 lg:aspect-h-6">
            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="absolute inset-0 object-cover w-full h-full rounded-3xl" />
        </div>

        <div class="container mt-10">
            <div class="relative">
                <div class="space-y-10">
                    <div class="prose lg:prose-lg !max-w-screen-md mx-auto dark:prose-invert">
                        {!! $post->content_html !!}
                    </div>
                    <div class="max-w-screen-md mx-auto flex flex-wrap">
                        @foreach($post->tags as $tag)
                            <a class="inline-block bg-white hover:bg-neutral-50 text-sm text-neutral-600 dark:text-neutral-300 py-2 px-3 rounded-lg md:py-2.5 md:px-4 dark:bg-neutral-900 mr-2 mb-2">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                    <div class="max-w-screen-md mx-auto border-b border-t border-neutral-100 dark:border-neutral-700"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative bg-neutral-100 dark:bg-neutral-800 py-16 lg:py-28 mt-16 lg:mt-28">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <div class="relative flex flex-col sm:flex-row sm:items-end justify-between mb-10 text-neutral-900 dark:text-neutral-50">
                <div class="max-w-2xl">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold">Bài viết liên quan</h2>
                </div>
            </div>

            <x-posts :posts="$relatedPosts" />
        </div>
    </div>
</x-layout>
