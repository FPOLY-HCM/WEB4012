<div>
    <x-filament::card class="m-6">
        <form wire:submit.prevent="create">
            {{ $this->form }}
            <div class="text-end mt-8">
                <x-filament::button color="gray" tag="a" href="{{ route('posts.index') }}">Quay lại</x-filament::button>
                <x-filament::button type="submit">Thêm mới</x-filament::button>
            </div>
        </form>
    </x-filament::card>

    <x-filament-actions::modals />
</div>
