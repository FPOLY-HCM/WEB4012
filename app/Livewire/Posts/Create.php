<?php

namespace App\Livewire\Posts;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component implements HasForms
{
    use InteractsWithForms;

    public array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function create(): void
    {
        Post::query()->create([
            ...$this->form->getState(),
            'status' => PostStatus::Published,
        ]);

        Notification::make()
            ->success()
            ->title('Tạo bài viết thành công!')
            ->send();

        $this->redirect(route('posts.index'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('author_id')
                    ->options(User::query()->pluck('name', 'id')->all())
                    ->searchable()
                    ->label('Danh mục'),
                Select::make('category_id')
                    ->options(Category::query()->pluck('name', 'id')->all())
                    ->searchable()
                    ->label('Danh mục'),
                TextInput::make('title')
                    ->label('Tiêu đề')
                    ->reactive()
                    ->afterStateUpdated(fn ($state, Set $set) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->unique(Post::class, 'slug', ignoreRecord: true)
                    ->readOnly(),
                MarkdownEditor::make('content')
                    ->label('Nội dung')
                    ->columnSpanFull(),
                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('posts')
                    ->label('Ảnh')
                    ->columnSpanFull(),
            ])
            ->statePath('data')
            ->columns();
    }

    public function render(): View
    {
        return view('livewire.posts.create');
    }
}
