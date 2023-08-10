<x-layouts.app>
    <x-slot:title>{{ $category->name }}</x-slot:title>
<div class="px-6 mx-auto sm:px-8 max-w-7xl xl:max-w-screen-2xl">
    <div class="rounded-3xl md:rounded-[40px] relative aspect-w-16 aspect-h-9 lg:aspect-h-5 overflow-hidden z-0">
        <div class="absolute inset-0">
            <img
                src="{{ $category->image }}"
                alt="{{ $category->name }}"
                class="absolute inset-0 object-cover w-full h-full"
            />
        </div>
    </div>
    <div class="container relative -mt-20 lg:-mt-48">
        <div class="bg-white dark:bg-neutral-900 dark:border dark:border-neutral-700 p-5 lg:p-16 rounded-[40px] shadow-2xl flex items-center">
            <header class="flex flex-col items-center w-full max-w-3xl mx-auto text-center">
                <h2 class="text-2xl font-semibold sm:text-4xl">{{ $category->name }}</h2>
                <span class="block mt-4 text-xs sm:text-sm text-neutral-500 dark:text-neutral-300">
                    Tìm thấy <strong class="font-medium text-neutral-800 dark:text-neutral-100">{{ number_format($posts->count()) }}</strong> kết quả cho danh mục <strong class="font-medium text-neutral-800 dark:text-neutral-100">{{ $category->name }}</strong>
                </span>
                <form class="relative w-full mt-8 text-left sm:mt-11" method="get">
                    <label for="search-input" class="text-neutral-500 dark:text-neutral-300">
                        <span class="sr-only">Search all icons</span>
                        <input
                            type="search"
                            name="q"
                            class="block w-full py-5 pr-5 text-sm font-normal bg-white rounded-full border-neutral-200 focus:border-blue-300 focus:ring focus:ring-blue-200/50 dark:border-neutral-500 dark:focus:ring-blue-500/30 dark:bg-neutral-900 pl-14 md:pl-16"
                            id="search-input"
                            placeholder="Tìm kiếm bài viết..."
                            value="{{ request()->query('q') }}"
                        />
                        <button
                            class="flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-slate-900 hover:bg-slate-800 text-slate-50 absolute right-2.5 top-1/2 transform -translate-y-1/2 w-11 h-11 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:focus:ring-offset-0"
                            type="submit"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                            </svg>
                        </button>
                        <span class="absolute text-2xl transform -translate-y-1/2 left-5 top-1/2 md:left-6">
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M19.25 19.25L15.5 15.5M4.75 11C4.75 7.54822 7.54822 4.75 11 4.75C14.4518 4.75 17.25 7.54822 17.25 11C17.25 14.4518 14.4518 17.25 11 17.25C7.54822 17.25 4.75 14.4518 4.75 11Z"
                                ></path>
                            </svg>
                        </span>
                    </label>
                </form>
            </header>
        </div>
    </div>
</div>


    <div class="container px-6 pt-10 pb-16 space-y-16 sm:px-8 lg:pb-28 lg:pt-20 lg:space-y-28">
        <div class="flex flex-col sm:justify-end sm:flex-row">
            <div x-data="{ open: false }" class="relative inline-block w-28 text-start">
                <div>
                    <button type="button" @click="open = !open" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        {{ request()->query('sort_by', 'newest') === 'newest' ? 'Gần đây' : 'Nổi bật' }}
                        <svg class="w-5 h-5 -mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div x-cloak x-show="open" x-transition class="absolute right-0 z-20 w-40 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="p-1" role="none">
                        <a href="{{ url()->current() }}?sort_by=newest" class="block px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-100 hover:text-gray-900">
                            Gần đây
                        </a>
                        <a href="{{ url()->current() }}?sort_by=popular" class="block px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-100 hover:text-gray-900">
                            Nổi bật
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <x-posts :posts="$posts" />

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </div>
</x-layouts.app>
