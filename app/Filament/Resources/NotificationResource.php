<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Notifications\DatabaseNotification;
use App\Filament\Resources\NotificationResource\Pages;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class NotificationResource extends Resource
{
    protected static ?string $model = DatabaseNotification::class;
    protected static ?string $navigationLabel = 'سجل الإشعارات';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')->label('نوع الإشعار'),
                TextColumn::make('notifiable_type')->label('المرسل إليه'),
                TextColumn::make('notifiable_id')->label('ID المستخدم'),
                TextColumn::make('created_at')->label('تاريخ الإرسال')->dateTime(),
                IconColumn::make('read_at')->label('تمت القراءة')->boolean(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotifications::route('/'),
        ];
    }

    public static function form(\Filament\Resources\Form $form): \Filament\Resources\Form
    {
        return $form->schema([]); // مش محتاج إنشاء/تعديل
    }
}
