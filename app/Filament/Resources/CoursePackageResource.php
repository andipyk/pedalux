<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoursePackageResource\Pages;
use App\Filament\Resources\CoursePackageResource\RelationManagers;
use App\Models\CoursePackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoursePackageResource extends Resource
{
    protected static ?string $model = CoursePackage::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('package_name')
                    ->required()
                    ->maxLength(255)
                    ->live(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->live(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->live(),
                Forms\Components\TextInput::make('total_hours')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->suffix('hours')
                    ->live(),
                Forms\Components\TextInput::make('number_of_sessions')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->suffix('sessions')
                    ->live(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('package_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->formatStateUsing(fn (string $state): string => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_hours')
                    ->suffix(' hours')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('number_of_sessions')
                    ->suffix(' sessions')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCoursePackages::route('/'),
            'create' => Pages\CreateCoursePackage::route('/create'),
            'edit' => Pages\EditCoursePackage::route('/{record}/edit'),
        ];
    }
}
