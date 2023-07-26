<x-layouts.app>
    <x-slot:title>{{ $category->name }}</x-slot:title>
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
        <div class="flex flex-col sm:justify-end sm:flex-row">
            <div x-data="{ open: false }" class="w-28 relative inline-block text-start">
                <div>
                    <button type="button" @click="open = !open" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        {{ request()->query('sort_by', 'newest') === 'newest' ? 'Gần đây' : 'Nổi bật' }}
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div x-cloak x-show="open" x-transition class="absolute right-0 z-20 mt-2 w-40 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="p-1" role="none">
                        <a href="{{ url()->current() }}?sort_by=newest" class="rounded-lg text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                            Gần đây
                        </a>
                        <a href="{{ url()->current() }}?sort_by=popular" class="rounded-lg text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
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
