<?php

declare(strict_types=1);

namespace App\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfile extends Component implements HasForms
{
    use InteractsWithForms;

    public array $data = [];

    public function mount(): void
    {
        $this->data = Auth::user()->toArray();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Họ tên'),
                TextInput::make('email')
                    ->label('Email'),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $this->validate([
            'data.name' => ['required', 'string'],
            'data.email' => ['required', 'email', 'unique:users,email,' . Auth::id()],
        ]);

        Auth::user()->update($this->data);

        Notification::make()
            ->success()
            ->title('Cập nhật thông tin thành công')
            ->send();
    }

    public function render(): View
    {
        return view('livewire.edit-profile')
            ->layout('components.layouts.user')
            ->layoutData([
                'title' => 'Chỉnh sửa thông tin cá nhân',
                'description' => 'Chỉnh sửa thông tin cá nhân của bạn',
            ]);
    }
}
