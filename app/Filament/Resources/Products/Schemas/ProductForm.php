<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Info')
                    ->components([
                        TextInput::make('name')
                            ->label("Product Name")
                            ->required()
                            ->maxLength(255),
                        
                        FileUpload::make('image')
                            ->image()
                            ->disk('uploads')
                            ->directory('products')
                            ->imageEditor()
                            ->preserveFilenames()
                            ->columnSpanFull(),
                        
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required(),

                        Toggle::make('is_active')
                            ->default(true),

                        Toggle::make('is_featured')
                            ->default(false),

                        RichEditor::make('description')
                            ->columnSpanFull(),
                    ])->columns(2),
                    
                Section::make('SEO')
                    ->components([
                        TextInput::make('title')
                        ->required()
                        ->maxLength(255),

                        TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('meta_title'),
                        Textarea::make('meta_desc'),
                        TextInput::make('meta_keywords'),
                    ])
                    ->collapsible(),
                
                Section::make('Variants')
                    ->components([
                        Repeater::make('variants')
                            ->relationship('variants')
                            ->components([
                                TextInput::make('flavor')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('weight')
                                ->required()
                                ->maxLength(50),

                            TextInput::make('original_price')
                                ->numeric()
                                ->required(),

                            TextInput::make('discounted_price')
                                ->numeric()
                                ->nullable(),

                            TextInput::make('stock')
                                ->numeric()
                                ->default(0),

                            Toggle::make('is_default')
                                ->label('Default Variant')
                                ->default(false),
                            ])
                            ->columns(3)
                            ->columnSpanFull()
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
