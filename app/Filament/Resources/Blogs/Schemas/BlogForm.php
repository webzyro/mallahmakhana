<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Blog Information')
                    ->components([
                        TextInput::make('title')
                            ->label('Blog Title')
                            ->required(),
                        TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->label('Blog Slug')
                            ->required(),
                        RichEditor::make('description')
                            ->label('Blog Description')
                            ->required()
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->image()
                            ->disk('uploads')
                            ->directory('blogs')
                            ->imageEditor()
                            ->preserveFilenames()
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->required()
                            ->label('Is Active')
                            ->default(true),
                        TextInput::make('author')
                            ->default(null)
                            ->label('Author'),
                        TextInput::make('category')
                            ->default(null)
                            ->label('Category'),
                    ]),
                Section::make('SEO')
                    ->components([
                        TextInput::make('meta_title')
                            ->default(null)
                            ->label('Meta Title'),
                        TextInput::make('meta_description')
                            ->default(null)
                            ->label('Meta Description'),
                        TextInput::make('meta_keywords')
                            ->default(null)
                            ->label('Meta Keywords'),
                    ])
                    ->collapsible(),
            ]);
    }
}
