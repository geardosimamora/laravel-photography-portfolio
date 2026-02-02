<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Testimonials';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Review Details')->schema([
                    Forms\Components\TextInput::make('client_name')
                        ->label('Nama Klien')
                        ->required()
                        ->maxLength(255),
                    
                    Forms\Components\TextInput::make('couple_names')
                        ->label('Nama Pengantin (Optional)')
                        ->placeholder('Contoh: Jessica & Mikael')
                        ->maxLength(255),
                    
                    Forms\Components\Textarea::make('review')
                        ->label('Review / Testimoni')
                        ->required()
                        ->rows(5)
                        ->columnSpanFull(),
                    
                    SpatieMediaLibraryFileUpload::make('customer_photo')
                        ->label('Foto Pelanggan')
                        ->collection('customer_photo')
                        ->image()
                        ->imageEditor()
                        ->columnSpanFull(),
                ])->columns(1),

                Forms\Components\Section::make('Metadata')->schema([
                    Forms\Components\Select::make('portfolio_id')
                        ->label('Portfolio (Optional)')
                        ->relationship('portfolio', 'title')
                        ->searchable()
                        ->preload(),
                    
                    Forms\Components\Toggle::make('is_featured')
                        ->label('Tampilkan di Homepage')
                        ->default(false),
                    
                    Forms\Components\TextInput::make('order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')
                    ->label('Nama Klien')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('couple_names')
                    ->label('Pasangan')
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Only'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
