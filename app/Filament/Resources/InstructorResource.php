<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstructorResource\Pages;
use App\Filament\Resources\InstructorResource\RelationManagers;
use App\Models\Instructor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstructorResource extends Resource
{
    protected static ?string $model = Instructor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user.name')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(function (string $operation, $state) {
                        if ($operation !== 'create') {
                            return;
                        }
                    }),
                Forms\Components\TextInput::make('user.email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(function (string $operation, $state) {
                        if ($operation !== 'create') {
                            return;
                        }
                    }),
                Forms\Components\TextInput::make('user.phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(function (string $operation, $state) {
                        if ($operation !== 'create') {
                            return;
                        }
                    }),
                Forms\Components\TextInput::make('user.password')
                    ->password()
                    ->required(fn (string $context): bool => $context === 'create')
                    ->maxLength(255)
                    ->hiddenOn('edit'),
                Forms\Components\Hidden::make('user.role')
                    ->default(\App\Models\User::ROLE_INSTRUCTOR)
                    ->dehydrated(),
                Forms\Components\TextInput::make('qualification')
                    ->required()
                    ->maxLength(255)
                    ->live(),
                Forms\Components\TextInput::make('specialization')
                    ->required()
                    ->maxLength(255)
                    ->live(),
                Forms\Components\TextInput::make('average_rating')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(5)
                    ->step(0.1)
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('qualification')
                    ->searchable(),
                Tables\Columns\TextColumn::make('specialization')
                    ->searchable(),
                Tables\Columns\TextColumn::make('average_rating')
                    ->label('Avg rate')
                    ->numeric(2)
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
                Tables\Actions\DeleteAction::make(),
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
            RelationManagers\SchedulesRelationManager::class,
            RelationManagers\TestimonialsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInstructors::route('/'),
            'create' => Pages\CreateInstructor::route('/create'),
            'edit' => Pages\EditInstructor::route('/{record}/edit'),
        ];
    }
}
