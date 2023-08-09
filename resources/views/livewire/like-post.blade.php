<button wire:click="like" class="relative min-w-[68px] flex items-center rounded-full leading-none group transition-colors px-4 h-9 text-sm text-neutral-700 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 hover:bg-rose-50 dark:hover:bg-rose-100 hover:text-rose-600 dark:hover:text-rose-500" title="Liked">
    <x-lineicons-heart class="w-4 h-4 fill-current" />
    <span class="ml-1 text-neutral-900 dark:text-neutral-200">{{ number_format($post->likes) }}</span>
</button>
