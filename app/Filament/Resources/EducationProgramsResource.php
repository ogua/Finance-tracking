<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationProgramsResource\Pages;
use App\Filament\Resources\EducationProgramsResource\RelationManagers;
use App\Models\EducationPrograms;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationProgramsResource extends Resource
{
    protected static ?string $model = EducationPrograms::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $slug = 'settings/education';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Education';
    protected static ?string $modelLabel = 'Education';
    protected static ?int $navigationSort = 2;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([
                Forms\Components\TextInput::make('school_name')
                ->required()
                ->maxLength(255),
                Forms\Components\Textarea::make('description')
                ->required()
                ->columnSpanFull(),
                ])
                ->columns(2),
            ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('school_name')
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
                            //
                        ];
                    }
                    
                    public static function getPages(): array
                    {
                        return [
                            'index' => Pages\ListEducationPrograms::route('/'),
                            'create' => Pages\CreateEducationPrograms::route('/create'),
                            'view' => Pages\ViewEducationPrograms::route('/{record}'),
                            'edit' => Pages\EditEducationPrograms::route('/{record}/edit'),
                        ];
                    }
                }
                