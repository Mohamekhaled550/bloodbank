<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use App\Models\BloodType;
use App\Models\City;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'المستخدمين';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->label('الاسم')->required(),
            TextInput::make('email')->email()->label('البريد الإلكتروني')->required(),
            TextInput::make('phone')->label('رقم الهاتف')->required(),
            Select::make('city_id')->relationship('city', 'name')->label('المدينة')->required(),
            Select::make('bloodtype_id')->relationship('bloodType', 'name')->label('فصيلة الدم')->required(),
            DatePicker::make('birth_date')->label('تاريخ الميلاد'),
            DatePicker::make('d_l_d')->label('تاريخ التوظيف'),
            TextInput::make('device_token')->label('Device Token')->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id'),
            TextColumn::make('name'),
            TextColumn::make('email'),
            TextColumn::make('phone'),
            TextColumn::make('bloodType.name')->label('فصيلة الدم'),
            TextColumn::make('city.name')->label('المدينة'),
            BooleanColumn::make('is_active')->label('نشط؟'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
