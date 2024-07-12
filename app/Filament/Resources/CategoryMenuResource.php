<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryMenuResource\Pages;
use App\Filament\Resources\CategoryMenuResource\RelationManagers;
use App\Models\Category;
use App\Models\CategoryMenu;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryMenuResource extends Resource
{
    protected static ?string $model = CategoryMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('category_id')
                ->label('category') 
                ->options(Category::all()->pluck('title', 'id'))
                ->searchable(),
            Select::make('menu_id')
                ->label('menu') 
                ->options(Menu::all()->pluck('name', 'id'))
                ->searchable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategoryMenus::route('/'),
            'create' => Pages\CreateCategoryMenu::route('/create'),
            'edit' => Pages\EditCategoryMenu::route('/{record}/edit'),
        ];
    }
}
