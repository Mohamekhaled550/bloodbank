<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BloodTypeResource\Pages;
use App\Models\BloodType;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class BloodTypeResource extends Resource
{
    protected static ?string $model = BloodType::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static ?string $navigationLabel = 'فصائل الدم';
    protected static ?string $pluralLabel = 'فصائل الدم';
    protected static ?string $modelLabel = 'فصيلة دم';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->maxLength(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->label('الاسم')->searchable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBloodTypes::route('/'),
            'create' => Pages\CreateBloodType::route('/create'),
            'edit' => Pages\EditBloodType::route('/{record}/edit'),
        ];
    }
}
