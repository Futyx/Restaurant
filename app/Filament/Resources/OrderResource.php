<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\RelationManagers\CategoriesRelationManager;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Menu;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                TextInput::make('user_id')
                    ->label('user'),
                Select::make('menu_id')
                    ->multiple()
                    ->label('product')
                    ->options(Menu::all()->pluck('name')),
                Select::make('status')
                    ->options([
                        'new' => 'new',
                        'process' => 'process',
                        'delivered' => 'delivered',
                        'cancel' => 'cancel',
                    ]),
                Select::make('payment_status')
                    ->options([
                        'paid' => 'paid',
                        'unpaid' => 'unpaid',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title'),
                TextColumn::make('user_id')->label('user'),
                TextColumn::make('status'),
                TextColumn::make('menu_id')->label('items'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CategoriesRelationManager::class,

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
