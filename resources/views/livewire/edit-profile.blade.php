<form wire:submit.prevent="submit">
    {{ $this->form }}

    <div class="text-end mt-4">
        <x-filament::button type="submit">
            Cập nhật
        </x-filament::button>
    </div>
</form>
