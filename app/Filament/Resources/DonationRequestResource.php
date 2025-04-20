<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationRequestResource\Pages;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ViewColumn;

class DonationRequestResource extends Resource
{
    protected static ?string $model = DonationRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';

    protected static ?string $navigationLabel = 'طلبات التبرع';

    protected static ?string $pluralLabel = 'طلبات التبرع';

    protected static ?string $modelLabel = 'طلب تبرع';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('patient_name')->required()->label('اسم المريض'),
                TextInput::make('patient_age')->numeric()->required()->label('عمر المريض'),
                Select::make('bloodtype_id')
                    ->label('فصيلة الدم')
                    ->relationship('bloodType', 'name')
                    ->required(),
                TextInput::make('bags_num')->numeric()->required()->label('عدد الأكياس'),
                TextInput::make('hospital_name')->required()->label('اسم المستشفى'),
                TextInput::make('hospital_address')->required()->label('عنوان المستشفى'),
                Select::make('city_id')
                    ->label('المدينة')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->required(),
                TextInput::make('phone')->required()->label('رقم الهاتف'),
                Textarea::make('notes')->label('ملاحظات')->nullable(),
                TextInput::make('latitude')->required()->label('Latitude'),
                TextInput::make('longitude')->required()->label('Longitude'),
                Select::make('user_id')
                    ->label('المستخدم')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient_name')->label('اسم المريض')->searchable(),
                TextColumn::make('bloodType.name')->label('فصيلة الدم'),
                TextColumn::make('bags_num')->label('عدد الأكياس'),
                TextColumn::make('city.name')->label('المدينة'),
                TextColumn::make('city.governorate.name')->label('المحافظة'),
                TextColumn::make('user.name')->label('تم الإنشاء بواسطة'),
                TextColumn::make('created_at')->dateTime()->label('تاريخ الإنشاء'),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonationRequests::route('/'),
            'create' => Pages\CreateDonationRequest::route('/create'),
            'edit' => Pages\EditDonationRequest::route('/{record}/edit'),
        ];
    }
}
