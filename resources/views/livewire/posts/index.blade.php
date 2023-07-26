<div>
    <x-filament::card>
        <div class="text-end mb-4">
            <x-filament::button tag="a" href="{{ route('posts.create') }}">
                Thêm mới
            </x-filament::button>
        </div>
        {{ $this->table }}
    </x-filament::card>
</div>
