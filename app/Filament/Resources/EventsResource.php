<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventsResource\Pages;
use App\Filament\Resources\EventsResource\RelationManagers;
use App\Models\Events;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsResource extends Resource
{
    protected static ?string $model = Events::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Events';
    protected static ?string $modelLabel = 'Event';
    protected static ?int $navigationSort = 5;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([
                
                Forms\Components\TextInput::make('event_name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('event_date')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('location')
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
                Tables\Columns\TextColumn::make('event_name')
                ->searchable(),
                Tables\Columns\TextColumn::make('event_date')
                ->searchable(),
                Tables\Columns\TextColumn::make('location')
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
                            'index' => Pages\ListEvents::route('/'),
                            'create' => Pages\CreateEvents::route('/create'),
                            'view' => Pages\ViewEvents::route('/{record}'),
                            'edit' => Pages\EditEvents::route('/{record}/edit'),
                        ];
                    }
                }
                