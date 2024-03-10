<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpensesResource\Pages;
use App\Filament\Resources\ExpensesResource\RelationManagers;
use App\Models\Expenses;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExpensesResource extends Resource
{
    protected static ?string $model = Expenses::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Expenses';
    protected static ?string $modelLabel = 'Expense';
    protected static ?int $navigationSort = 8;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([
                Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                ->required()
                ->maxLength(255),
                Forms\Components\DatePicker::make('expense_date')
                ->required(),
                Forms\Components\Textarea::make('note')
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
                Tables\Columns\TextColumn::make('title')
                ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                ->searchable()
                ->state(function (Expenses $record): string {
                    return "Ghc".number_format($record->amount,2);
                }),
                Tables\Columns\TextColumn::make('expense_date')
                ->date()
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
                            //
                        ];
                    }
                    
                    public static function getPages(): array
                    {
                        return [
                            'index' => Pages\ListExpenses::route('/'),
                            'create' => Pages\CreateExpenses::route('/create'),
                            'view' => Pages\ViewExpenses::route('/{record}'),
                            'edit' => Pages\EditExpenses::route('/{record}/edit'),
                        ];
                    }
                }
                