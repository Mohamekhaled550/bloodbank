<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Models\City;
use App\Models\Governorate;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class CityResource extends Resource
{
    protected static ?string $model = City::class;
    protected static ?string $navigationLabel = 'المدن';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->label('الاسم')->required(),
            Select::make('governorate_id')
                ->label('المحافظة')
                ->relationship('governorate', 'name')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->label('الاسم')->searchable(),
            TextColumn::make('governorate.name')->label('المحافظة'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCities::route('/'),
            'create' => Pages\CreateCity::route('/create'),
            'edit' => Pages\EditCity::route('/{record}/edit'),
        ];
    }
}
