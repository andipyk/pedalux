<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

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
                    ->default(\App\Models\User::ROLE_STUDENT)
                    ->dehydrated(),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->live(),
                Forms\Components\Select::make('learning_progress')
                    ->options(Student::getLearningProgresses())
                    ->required()
                    ->live(),
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
                Tables\Columns\TextColumn::make('address')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('learning_progress')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        Student::PROGRESS_BEGINNER => 'info',
                        Student::PROGRESS_INTERMEDIATE => 'warning',
                        Student::PROGRESS_ADVANCED => 'success',
                        Student::PROGRESS_COMPLETED => 'primary',
                    })
                    ->searchable(),
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
            RelationManagers\BookingsRelationManager::class,
            RelationManagers\TestimonialsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
