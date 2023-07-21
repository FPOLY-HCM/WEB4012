<x-layout>
    <div class="w-full px-6 sm:px-8 xl:max-w-screen-2xl mx-auto">
        <div class="relative aspect-w-16 aspect-h-13 sm:aspect-h-9 lg:aspect-h-8 xl:aspect-h-5 rounded-3xl md:rounded-[40px] overflow-hidden z-0">
            <img
                src="{{ $category->image }}"
                class="object-cover w-full h-full rounded-3xl md:rounded-4xl absolute inset-0"
                alt="archive"
            />
            <div class="absolute inset-0 bg-black text-white bg-opacity-30 flex flex-col items-center justify-center">
                <h2 class="inline-block align-middle text-5xl font-semibold md:text-7xl">{{ $category->name }}</h2>
                <span class="block mt-4 text-neutral-300">{{ $category->posts_count }} Bài viết</span>
            </div>
        </div>
    </div>

    <div class="container px-6 sm:px-8 pt-10 pb-16 lg:pb-28 lg:pt-20 space-y-16 lg:space-y-28">
        <div>
            <div class="flex flex-col sm:justify-between sm:flex-row">
                <div class="flex justify-end">
                    <div class="nc-ArchiveFilterListBox flex-shrink-0">
                        <div class="relative">
                            <div>
                                <button
                                    class="flex-shrink-0 relative h-auto inline-flex items-center justify-center rounded-full transition-colors border-transparent bg-white dark:bg-neutral-900 ring-1 ring-neutral-300 hover:ring-neutral-400 dark:ring-neutral-700 dark:hover:ring-neutral-500 text-sm font-medium py-3 px-4 sm:py-3.5 sm:px-6"
                                >
                                    Gần đây
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4 ml-2 -mr-1">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-posts :posts="$posts" />

            <div class="mt-10">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-layout>
