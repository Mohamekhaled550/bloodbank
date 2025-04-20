<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotificationSettingResource\Pages;
use App\Models\NotificationSetting;
use App\Models\User;
use App\Models\Bloodtype;
use App\Models\Governorate;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;

class NotificationSettingResource extends Resource
{
    protected static ?string $model = NotificationSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    protected static ?string $navigationGroup = 'الإعدادات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('المستخدم')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('bloodtype_id')
                    ->label('فصيلة الدم')
                    ->relationship('bloodtype', 'name')
                    ->required(),

                Forms\Components\Select::make('governorate_id')
                    ->label('المحافظة')
                    ->relationship('governorate', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('المستخدم'),
                Tables\Columns\TextColumn::make('bloodtype.name')->label('فصيلة الدم'),
                Tables\Columns\TextColumn::make('governorate.name')->label('المحافظة'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('تاريخ الإضافة'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotificationSettings::route('/'),
            'create' => Pages\CreateNotificationSetting::route('/create'),
            'edit' => Pages\EditNotificationSetting::route('/{record}/edit'),
        ];
    }
}
