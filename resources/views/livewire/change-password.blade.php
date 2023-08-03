<form wire:submit.prevent="submit">
    {{ $this->form }}

    <div class="text-end mt-4">
        <x-filament::button type="submit">
            Đổi mật khẩu
        </x-filament::button>
    </div>
</form>
