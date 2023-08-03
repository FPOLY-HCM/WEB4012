<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Mail\PasswordWasChanged;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ChangePassword extends Component implements HasForms
{
    use InteractsWithForms;

    public ?string $old_password = null;

    public ?string $password = null;

    public ?string $password_confirmation = null;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('old_password')
                    ->label('Mật khẩu cũ')
                    ->password(),
                TextInput::make('password')
                    ->label('Mật khẩu mới')
                    ->password(),
                TextInput::make('password_confirmation')
                    ->label('Nhập lại mật khẩu mới')
                    ->password(),
            ]);
    }

    public function submit(): void
    {
        $this->validate([
            'old_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        Auth::user()->update([
            'password' => $this->password,
        ]);

        Mail::to(Auth::user())->send(new PasswordWasChanged(Auth::user()));

        $this->reset();

        Notification::make()
            ->success()
            ->title('Đổi mật khẩu thành công')
            ->send();
    }

    public function render(): View
    {
        return view('livewire.change-password')
            ->layout('components.layouts.user')
            ->layoutData([
                'title' => 'Đổi mật khẩu',
                'description' => 'Đổi mật khẩu của bạn',
            ]);
    }
}
