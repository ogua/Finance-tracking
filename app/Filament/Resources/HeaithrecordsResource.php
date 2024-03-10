<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeaithrecordsResource\Pages;
use App\Filament\Resources\HeaithrecordsResource\RelationManagers;
use App\Models\Heaithrecords;
use App\Models\Orphans;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeaithrecordsResource extends Resource
{
    protected static ?string $model = Heaithrecords::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $slug = 'health-records';
    protected static ?string $navigationLabel = 'Health Records';
    protected static ?string $modelLabel = 'Health Record';
    protected static ?int $navigationSort = 2;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([
                
                Forms\Components\select::make('orphan_id')
                ->label('Orphan')
                ->required()
                ->options(Orphans::get()->pluck('full_name','id')),
                Forms\Components\DatePicker::make('record_date')
                ->required(),
                Forms\Components\Textarea::make('medical_condition')
                ->required()
                ->columnSpanFull(),
                Forms\Components\Textarea::make('vaccinations')
                ->required()
                ->columnSpanFull(),
                Forms\Components\Textarea::make('notes')
                ->columnSpanFull(),
                
                ])
                ->columns(2),
            ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('orphan.full_name')
                ->numeric()
                ->sortable(),
                Tables\Columns\TextColumn::make('record_date')
                ->date()
                ->sortable(),
                Tables\Columns\TextColumn::make('medical_condition'),
                Tables\Columns\TextColumn::make('vaccinations'),
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
                            'index' => Pages\ListHeaithrecords::route('/'),
                            'create' => Pages\CreateHeaithrecords::route('/create'),
                            'view' => Pages\ViewHeaithrecords::route('/{record}'),
                            'edit' => Pages\EditHeaithrecords::route('/{record}/edit'),
                        ];
                    }
                }
                