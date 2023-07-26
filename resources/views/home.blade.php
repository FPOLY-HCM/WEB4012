<x-layouts.app>
    <div class="mx-auto max-w-7xl px-6 sm:px-8 mt-8">
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 sm:grid-rows-5 gap-5">
                @foreach($popularPosts->take(2) as $post)
                    <div class="relative flex flex-col group rounded-xl overflow-hidden sm:row-span-3 col-span-1">
                        <div class="absolute inset-x-0 top-0 p-3 flex items-center justify-between transition-all opacity-0 z-[-1] group-hover:opacity-100 group-hover:z-10 duration-300">
                            <div class="flex items-center space-x-2 relative">
                                <button class="relative min-w-[68px] flex items-center rounded-full leading-none group transition-colors px-3 h-8 text-xs text-neutral-700 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 hover:bg-rose-50 dark:hover:bg-rose-100 hover:text-rose-600 dark:hover:text-rose-500" title="Liked">
                                    <x-lineicons-heart class="w-4 h-4 fill-current" />
                                    <span class="ml-1 text-neutral-900 dark:text-neutral-200">{{ number_format($post->likes) }}</span>
                                </button>
                            </div>
                            <div class="flex items-center space-x-2 text-xs text-neutral-700 dark:text-neutral-300 relative">
                                <button class="relative rounded-full flex items-center justify-center h-8 w-8 bg-neutral-50 hover:bg-neutral-100 dark:bg-neutral-800 dark:hover:bg-neutral-700" title="Save to reading list">
                                    <x-lineicons-bookmark class="w-4 h-4 fill-current" />
                                </button>
                            </div>
                        </div>
                        <div class="flex items-start relative w-full aspect-w-4 sm:aspect-w-3 aspect-h-3"></div>
                        <a href="{{ route('posts.show', $post) }}">
                            <img src="{{ $post->thumbnail }}" class="object-cover w-full h-full rounded-xl absolute inset-0" alt="{{ $post->title }}" />
                            <span class="absolute inset-0 bg-black bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                        </a>
                        <a class="absolute bottom-0 inset-x-0 h-1/2 bg-gradient-to-t from-black opacity-80" href="{{ route('posts.show', $post) }}"></a>
                        <div class="absolute bottom-0 inset-x-0 p-6 flex flex-col flex-grow">
                            <a class="absolute inset-0" href="{{ route('posts.show', $post) }}"></a>
                            <div class="inline-flex items-center text-xs text-neutral-300">
                                <h2 class="block font-semibold text-white text-lg">{{ $post->title }}</h2>
                            </div>
                        </div>
                    </div>
                @endforeach

                @php($post = $posts->skip(2)->first())
                    <div class="relative flex flex-col group rounded-xl overflow-hidden sm:col-span-2 sm:row-span-2">
                        <div class="absolute inset-x-0 top-0 p-3 flex items-center justify-between transition-all opacity-0 z-[-1] group-hover:opacity-100 group-hover:z-10 duration-300">
                            <div class="flex items-center space-x-2 relative">
                                <button class="relative min-w-[68px] flex items-center rounded-full leading-none group transition-colors px-3 h-8 text-xs text-neutral-700 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 hover:bg-rose-50 dark:hover:bg-rose-100 hover:text-rose-600 dark:hover:text-rose-500" title="Liked">
                                    <x-lineicons-heart class="w-4 h-4 fill-current" />
                                    <span class="ml-1 text-neutral-900 dark:text-neutral-200">{{ number_format($post->likes) }}</span>
                                </button>
                            </div>
                            <div class="flex items-center space-x-2 text-xs text-neutral-700 dark:text-neutral-300 relative">
                                <button class="relative rounded-full flex items-center justify-center h-8 w-8 bg-neutral-50 hover:bg-neutral-100 dark:bg-neutral-800 dark:hover:bg-neutral-700" title="Save to reading list">
                                    <x-lineicons-bookmark class="w-4 h-4 fill-current" />
                                </button>
                            </div>
                        </div>
                        <div class="flex items-start relative w-full aspect-w-4 aspect-h-3 sm:aspect-h-1 sm:aspect-w-16"></div>
                        <a href="{{ route('posts.show', $post) }}">
                            <img src="{{ $post->thumbnail }}" class="object-cover w-full h-full rounded-xl absolute inset-0" alt="{{ $post->title }}" />
                            <span class="absolute inset-0 bg-black bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                        </a>
                        <a class="absolute bottom-0 inset-x-0 h-1/2 bg-gradient-to-t from-black opacity-80" href="{{ route('posts.show', $post) }}"></a>
                        <div class="absolute bottom-0 inset-x-0 p-5 sm:p-10 flex flex-col flex-grow">
                            <a class="absolute inset-0" href="{{ route('posts.show', $post) }}"></a>
                            <div class="inline-flex items-center text-xs text-neutral-300">
                                <h2 class="block font-semibold text-white text-xl sm:text-2xl xl:text-2xl">{{ $post->title }}</h2>
                            </div>
                        </div>
                    </div>
            </div>

            @php($post = $popularPosts->last())
            <div class="relative flex flex-col group rounded-xl overflow-hidden">
                <div class="absolute inset-x-0 top-0 p-3 flex items-center justify-between transition-all opacity-0 z-[-1] group-hover:opacity-100 group-hover:z-10 duration-300">
                    <div class="flex items-center space-x-2 relative">
                        <button class="relative min-w-[68px] flex items-center rounded-full leading-none group transition-colors px-3 h-8 text-xs text-neutral-700 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 hover:bg-rose-50 dark:hover:bg-rose-100 hover:text-rose-600 dark:hover:text-rose-500" title="Liked">
                            <x-lineicons-heart class="w-4 h-4 fill-current" />
                            <span class="ml-1 text-neutral-900 dark:text-neutral-200">{{ number_format($post->likes) }}</span>
                        </button>
                    </div>
                    <div class="flex items-center space-x-2 text-xs text-neutral-700 dark:text-neutral-300 relative">
                        <button class="relative rounded-full flex items-center justify-center h-8 w-8 bg-neutral-50 hover:bg-neutral-100 dark:bg-neutral-800 dark:hover:bg-neutral-700" title="Save to reading list">
                            <x-lineicons-bookmark class="w-4 h-4 fill-current" />
                        </button>
                    </div>
                </div>
                <div class="flex items-start relative w-full aspect-w-4 sm:aspect-w-3 aspect-h-3"></div>
                <a href="{{ route('posts.show', $post) }}">
                    <img src="{{ $post->thumbnail }}" class="object-cover w-full h-full rounded-xl absolute inset-0" alt="{{ $post->title }}" />
                    <span class="absolute inset-0 bg-black bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                </a>
                <a class="absolute bottom-0 inset-x-0 h-1/2 bg-gradient-to-t from-black opacity-80" href="{{ route('posts.show', $post) }}"></a>
                <div class="absolute bottom-0 inset-x-0 p-5 sm:p-10 flex flex-col flex-grow">
                    <a class="absolute inset-0" href="{{ route('posts.show', $post) }}"></a>
                    <div class="mb-3">
                        <div class="flex flex-wrap space-x-2">
                            <a
                                style="--bg-color: {{ $post->category->color }}"
                                class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative text-white bg-opacity-5 bg-[var(--bg-color)]"
                                href="{{ route('categories.show', $post->category) }}"
                            >
                                {{ $post->category->name }}
                            </a>
                        </div>
                    </div>
                    <div class="inline-flex items-center text-xs text-neutral-300">
                        <h2 class="block font-semibold text-white text-xl sm:text-2xl xl:text-3xl">{{ $post->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 sm:px-8 py-10">
        <div class="Heading relative flex flex-col sm:flex-row sm:items-end justify-between mb-10 md:mb-12 text-neutral-900 dark:text-neutral-50">
            <div class="max-w-2xl">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold">Danh mục nổi bật</h2>
                <span class="mt-2 md:mt-3 font-normal block text-base sm:text-xl text-neutral-500 dark:text-neutral-400">Các danh mục nổi bật nhất</span>
            </div>
        </div>

        <div class="relative flow-root">
            <div class="flow-root overflow-hidden rounded-xl">
                <div class="swiper">
                    <ul class="swiper-wrapper relative whitespace-nowrap -mx-2 xl:-mx-4">
                        @foreach($categories as $category)
                            <li class="swiper-slide relative inline-block px-2 xl:px-4 whitespace-normal w-1/5 translate-x-0">
                                <a class="flex flex-col" href="{{ route('categories.show', $category) }}">
                                    <div class="flex-shrink-0 relative w-full aspect-w-7 aspect-h-5 h-0 rounded-3xl overflow-hidden group">
                                        <img src="{{ $category->image }}" class="object-cover w-full h-full rounded-2xl absolute inset-0" alt="{{ $category->name }}" />
                                        <span class="opacity-0 group-hover:opacity-100 absolute inset-0 bg-black bg-opacity-10 transition-opacity"></span>
                                    </div>
                                    <div class="flex items-center mt-5">
                                        <div style="--bg-color: {{ $category->color }}" class="w-9 h-9 bg-[--bg-color] rounded-full"></div>
                                        <div class="ml-4">
                                            <h2 class="text-base text-neutral-900 dark:text-neutral-100 font-medium">
                                                {{ $category->name }}
                                            </h2>
                                            <span class="block text-sm text-neutral-500 dark:text-neutral-400">{{ __(':count Bài viết', ['count' => number_format($category->posts_count)]) }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 sm:px-8 flex flex-col py-10 lg:flex-row">
        <div class="w-full lg:w-3/5 xl:w-2/3 xl:pr-20">
            <x-posts :posts="$recentPosts" :per-row="3" />
        </div>
        <div class="w-full mt-12 lg:mt-0 lg:w-2/5 lg:pl-10 xl:pl-0 xl:w-1/3">
            <div class="space-y-6">
                <div class="rounded-3xl overflow-hidden bg-neutral-100 dark:bg-neutral-800">
                    <div class="flex items-center justify-between p-4 xl:p-5 border-b border-neutral-200 dark:border-neutral-700">
                        <h2 class="text-lg text-neutral-900 dark:text-neutral-100 font-semibold flex-grow">💡 Thẻ</h2>
                        <a class="flex-shrink-0 block text-primary-700 dark:text-primary-500 font-semibold text-sm" rel="noopener noreferrer" href="/">Xem tất cả</a>
                    </div>
                    <div class="flex flex-wrap p-4 xl:p-5">
                        @foreach($tags as $tag)
                            <a class="inline-block bg-white hover:bg-neutral-50 text-sm text-neutral-600 dark:text-neutral-300 py-2 px-3 rounded-lg md:py-2.5 md:px-4 dark:bg-neutral-900 mr-2 mb-2" href="/archive/the-demo-archive-slug">
                                {{ $tag->name }}
                                <span class="text-xs font-normal">({{ $tag->posts_count }})</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden bg-neutral-100 dark:bg-neutral-800">
                    <div class="flex items-center justify-between p-4 xl:p-5 border-b border-neutral-200 dark:border-neutral-700">
                        <h2 class="text-lg text-neutral-900 dark:text-neutral-100 font-semibold flex-grow">✨ Danh mục nổi bật</h2>
                        <a class="flex-shrink-0 block text-primary-700 dark:text-primary-500 font-semibold text-sm" rel="noopener noreferrer" href="/">Xem tất cả</a>
                    </div>
                    <div class="flow-root">
                        <div class="flex flex-col divide-y divide-neutral-200 dark:divide-neutral-700">
                            @foreach($categories as $category)
                                <a class="flex items-center p-4 xl:p-5 hover:bg-neutral-200 dark:hover:bg-neutral-700" href="{{ route('categories.show', $category) }}">
                                    <div class="relative flex-shrink-0 w-12 h-12 rounded-lg mr-4 overflow-hidden">
                                        <img
                                            src="{{ $category->image }}"
                                            alt="{{ $category->name }}"
                                            class="object-cover absolute inset-0 w-full h-full"
                                        />
                                    </div>
                                    <div>
                                        <h2 class="text-base nc-card-title text-neutral-900 dark:text-neutral-100 font-medium sm:font-semibold">{{ $category->name }}</h2>
                                        <span class="text-xs block mt-0.5 text-neutral-500 dark:text-neutral-400">{{ $category->posts_count }} Bài viết</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
