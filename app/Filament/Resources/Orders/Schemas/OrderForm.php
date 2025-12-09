<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->readOnly()
                    ->disabled()
                    ->numeric(),
                TextInput::make('name')
                    ->readOnly()
                    ->disabled()
                    ->required(),
                TextInput::make('phone')
                    ->readOnly()
                    ->disabled()
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->readOnly()
                    ->disabled()
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('address')
                    ->readOnly()
                    ->disabled()
                    ->required(),
                TextInput::make('city')
                    ->readOnly()
                    ->disabled()
                    ->required(),
                TextInput::make('state')
                    ->readOnly()
                    ->disabled()
                    ->required(),
                TextInput::make('pincode')
                    ->readOnly()
                    ->disabled()
                    ->required(),
                TextInput::make('total_amount')
                    ->readOnly()
                    ->disabled()
                    ->required()
                    ->numeric(),
                Select::make('payment_method')
                    ->label('Payment Method')
                    ->options([
                        'cod' => 'Cash On Delivery',
                        'prepaid' => 'Prepaid (Online Payment)',
                    ])
                    ->disabled() // user cannot change this
                    ->required(),
                    
                Select::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'pending' => 'Pending',
                        'unpaid' => 'Unpaid',
                        'paid' => 'Paid',
                        'failed' => 'Failed',
                    ])
                    ->required(),

                Select::make('status')
                    ->label('Order Status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
