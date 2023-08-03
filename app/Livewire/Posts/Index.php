<?php

declare(strict_types=1);

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Set;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Post::query()->latest())
            ->columns([
                TextColumn::make('id'),
                ImageColumn::make('thumbnail')
                    ->label('Ảnh'),
                TextColumn::make('author.name')
                    ->label('Tác giả'),
                TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->url(fn (Post $post) => route('posts.show', $post))
                    ->limit(40),
                TextColumn::make('views')
                    ->label('Lượt xem'),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime(),
            ])
            ->actions([
                EditAction::make()
                    ->form([
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
                    ]),
                DeleteAction::make()
                    ->recordTitle('bài viết'),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public function render(): View
    {
        return view('livewire.posts.index');
    }
}
