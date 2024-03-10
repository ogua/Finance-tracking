<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdoptionsResource\Pages;
use App\Filament\Resources\AdoptionsResource\RelationManagers;
use App\Models\Adoptions;
use App\Models\Orphans;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdoptionsResource extends Resource
{
    protected static ?string $model = Adoptions::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Adoptions';
    protected static ?string $modelLabel = 'Adoption';
    protected static ?int $navigationSort = 10;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([
                Forms\Components\Select::make('orphan_id')
                ->label('Orphan')
                ->required()
                ->options(Orphans::all()->pluck('full_name','id')),
                Forms\Components\TextInput::make('adopter_name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('adopter_contact')
                ->required()
                ->maxLength(255),
                Forms\Components\DatePicker::make('adoption_date')
                ->required(),
                Forms\Components\Select::make('status')
                ->required()
                ->options([
                    'Taken' => 'Taken',
                    'Returned' => 'Returned',
                    'Processing' => 'Processing'
                ]),
                ])
                ->columns(2),
            ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('orphan.full_name')
                ->label('Orphan')
                ->sortable(),
                Tables\Columns\TextColumn::make('adopter_name')
                ->searchable(),
                Tables\Columns\TextColumn::make('adopter_contact')
                ->searchable(),
                Tables\Columns\TextColumn::make('adoption_date')
                ->date()
                ->sortable(),
                Tables\Columns\TextColumn::make('status')
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
                            'index' => Pages\ListAdoptions::route('/'),
                            'create' => Pages\CreateAdoptions::route('/create'),
                            'view' => Pages\ViewAdoptions::route('/{record}'),
                            'edit' => Pages\EditAdoptions::route('/{record}/edit'),
                        ];
                    }
                }
                