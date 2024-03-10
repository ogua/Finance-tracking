<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationProgramsOrphanResource\Pages;
use App\Filament\Resources\EducationProgramsOrphanResource\RelationManagers;
use App\Models\EducationPrograms;
use App\Models\EducationProgramsOrphan;
use App\Models\Orphans;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationProgramsOrphanResource extends Resource
{
    protected static ?string $model = EducationProgramsOrphan::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Education Programs';
    protected static ?string $modelLabel = 'Education Program';
    protected static ?int $navigationSort = 9;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('orphan_id')
            ->label('Orphan')
            ->required()
            ->options(Orphans::all()->pluck('full_name','id')),
            Forms\Components\Select::make('education_program_id')
            ->label('Institution name')
            ->required()
            ->options(EducationPrograms::pluck('school_name','id')),
            Forms\Components\DatePicker::make('enrollment_date')
            ->required(),
            Forms\Components\TextInput::make('class_grade')
            ->required()
            ->maxLength(255),
            Forms\Components\DatePicker::make('completion_date')
            ->required(),
        ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('orphan.full_name')
            ->label('Orphan')
            ->sortable(),
            Tables\Columns\TextColumn::make('education.school_name')
            ->label('Institution name')
            ->sortable(),
            Tables\Columns\TextColumn::make('enrollment_date')
            ->date()
            ->sortable(),
            Tables\Columns\TextColumn::make('class_grade')
            ->searchable(),
            Tables\Columns\TextColumn::make('completion_date')
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
                        'index' => Pages\ListEducationProgramsOrphans::route('/'),
                        'create' => Pages\CreateEducationProgramsOrphan::route('/create'),
                        'view' => Pages\ViewEducationProgramsOrphan::route('/{record}'),
                        'edit' => Pages\EditEducationProgramsOrphan::route('/{record}/edit'),
                    ];
                }
            }
            