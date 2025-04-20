<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GovernorateResource\Pages;
use App\Models\Governorate;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class GovernorateResource extends Resource
{
    protected static ?string $model = Governorate::class;
    protected static ?string $navigationLabel = 'المحافظات';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->label('الاسم')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->label('الاسم')->searchable(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGovernorates::route('/'),
            'create' => Pages\CreateGovernorate::route('/create'),
            'edit' => Pages\EditGovernorate::route('/{record}/edit'),
        ];
    }
}
