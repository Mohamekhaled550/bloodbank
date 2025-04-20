<?php

namespace App\Filament\Resources;

use App\Models\DonationRequest;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class DonationHistoryResource extends Resource
{
    protected static ?string $model = DonationRequest::class;
    protected static ?string $navigationLabel = 'سجل التبرعات';

    public static function table(Table $table): Table
    {
        return $table
            ->query(DonationRequest::query()->where('is_active', true)) // شرط العرض
            ->columns([
                TextColumn::make('patient_name')->label('اسم المريض'),
                TextColumn::make('bloodType.name')->label('فصيلة الدم'),
                TextColumn::make('hospital_name')->label('المستشفى'),
                TextColumn::make('city.name')->label('المدينة'),
                TextColumn::make('user.name')->label('أنشأ الطلب'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => DonationHistoryResource\Pages\ListDonationHistories::route('/'),
        ];
    }
}
