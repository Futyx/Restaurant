<?php

namespace App\Filament\Resources\MenuResource\RelationManagers;

use App\Models\Category;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoriesRelationManager extends RelationManager
{

    protected static string $relationship = 'categories';

    public function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\Select::make('categories')
                    ->label('category')
                    ->options(Category::get()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                       

                        return $data;
                    })

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
