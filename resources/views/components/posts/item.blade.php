@props(['post'])

<div class="relative flex flex-col group rounded-3xl overflow-hidden bg-white dark:bg-neutral-900 h-full">
    <div class="block flex-shrink-0 relative w-full rounded-t-3xl overflow-hidden z-10 aspect-w-4 aspect-h-3">
        <div>
            <div class="nc-PostFeaturedMedia relative w-full h-full">
                <img
                    src="{{ $post->thumbnail }}"
                    class="object-cover absolute inset-0 w-full h-full"
                    alt="{{ $post->title }}"
                />
                <a class="block absolute inset-0 bg-black/20 transition-opacity opacity-0 group-hover:opacity-100" href="{{ route('posts.show', $post) }}"></a>
            </div>
        </div>
    </div>
    <a class="absolute inset-0" href="{{ route('posts.show', $post) }}"></a>
    <span class="absolute top-3 inset-x-3 z-10">
        <div class="flex flex-wrap space-x-2">
            <a
                style="--bg-color: {{ $post->category->color }}"
                class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative text-white bg-opacity-5 bg-[var(--bg-color)]"
                href="{{ route('categories.show', $post->category) }}"
            >
                {{ $post->category->name }}
            </a>
        </div>
    </span>
    <div class="p-4 flex flex-col space-y-3">
        <div class="inline-flex items-center flex-wrap text-neutral-800 dark:text-neutral-200 leading-none text-xs">
            <a class="relative flex items-center space-x-2" href="/author/the-demo-author-slug">
                <div
                    class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden text-neutral-100 uppercase font-semibold shadow-inner rounded-full h-7 w-7 text-sm ring-1 ring-white dark:ring-neutral-900"
                >
                    <img
                        sizes="100px" src="{{ $post->author->avatar_url }}"
                        class="absolute inset-0 w-full h-full object-cover"
                        alt="{{ $post->author->name }}"
                    />
                </div>
                <span class="block text-neutral-700 hover:text-black dark:text-neutral-300 dark:hover:text-white font-medium">{{ $post->author->name }}</span>
            </a>
            <span class="text-neutral-500 dark:text-neutral-400 mx-[6px] font-medium">·</span><span class="text-neutral-500 dark:text-neutral-400 font-normal">{{ $post->created_at->format('M, d Y') }}</span>
        </div>
        <h3 class="block text-base font-semibold text-neutral-900 dark:text-neutral-100">
            <span class="line-clamp-2" title="{{ $post->title }}">{{ $post->title }}</span>
        </h3>
        <div class="flex items-end justify-between mt-auto">
            <div class="flex items-center space-x-2 relative">
                <button
                    class="relative min-w-[68px] flex items-center rounded-full leading-none group transition-colors px-3 h-8 text-xs text-neutral-700 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 hover:bg-rose-50 dark:hover:bg-rose-100 hover:text-rose-600 dark:hover:text-rose-500"
                    title="{{ __('Liked') }}"
                >
                    <x-lineicons-heart class="w-4 h-4 fill-current" />
                    <span class="ml-1 text-neutral-900 dark:text-neutral-200">34</span>
                </button>
            </div>
            <div class="nc-PostCardSaveAction flex items-center space-x-2 text-xs text-neutral-700 dark:text-neutral-300 relative">
                <button class="nc-NcBookmark relative rounded-full flex items-center justify-center h-8 w-8 bg-neutral-50 hover:bg-neutral-100 dark:bg-neutral-800 dark:hover:bg-neutral-700" title="Save to reading list">
                    <x-lineicons-bookmark class="w-4 h-4 fill-current" />
                </button>
            </div>
        </div>
    </div>
</div>
