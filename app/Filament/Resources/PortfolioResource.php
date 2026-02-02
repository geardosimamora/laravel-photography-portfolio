<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use App\Enums\PortfolioCategory; // Jangan lupa import Enum ini
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationLabel = 'Portfolio Gallery';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    // KOLOM KIRI (Utama) - Mengambil 2 dari 3 bagian grid
                    Section::make('Project Content')->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            // Auto-generate Slug saat Title diketik
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated() // Tetap dikirim ke DB meski disabled
                            ->unique(Portfolio::class, 'slug', ignoreRecord: true),
                            
                        Forms\Components\Select::make('category')
                            ->options(PortfolioCategory::class) // Mengambil dari Enum
                            ->required(),

                        Forms\Components\RichEditor::make('description')
                            ->label('Storytelling / Description')
                            ->columnSpanFull(),
                    ])->columnSpan(2),

                    // KOLOM KANAN (Meta Data) - Mengambil 1 dari 3 bagian grid
                    Section::make('Meta Details')->schema([
                        Forms\Components\TextInput::make('client_name'),
                        Forms\Components\DatePicker::make('project_date')
                            ->required()
                            ->default(now()),
                        Forms\Components\TextInput::make('video_url')
                            ->label('Video URL (Youtube/Vimeo)')
                            ->url()
                            ->placeholder('https://youtube.com/...'),
                        Forms\Components\Textarea::make('google_maps_embed')
                            ->label('Google Maps Embed Code')
                            ->rows(5)
                            ->placeholder('<iframe src="..."></iframe>'),
                    ])->columnSpan(1),
                ]),

                // BAGIAN UPLOAD FOTO (Spatie Media Library)
                Section::make('Gallery Images')
                    ->description('Upload foto-foto terbaik di sini. Urutan bisa di-drag & drop, dan kamu bisa crop/resize setiap foto.')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->collection('default') // Collection default Spatie
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->imageEditor() // Fitur crop/rotate/resize
                            ->imageEditorAspectRatios([
                                null, // Free crop (bisa crop dengan ukuran apapun)
                                '16:9',
                                '4:3',
                                '1:1',
                                '9:16',
                            ])
                            // Jangan force aspect ratio, biarkan user bebas memilih
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan Thumbnail Gambar Pertama
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->getStateUsing(fn ($record) => $record->getFirstMediaUrl('default', 'thumb'))
                    ->square()
                    ->size(50),
                
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('category')
                    ->badge() // Tampil seperti badge warna
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('project_date')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                // Filter berdasarkan Kategori
                Tables\Filters\SelectFilter::make('category')
                    ->options(PortfolioCategory::class),
            ])
            ->actions([
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
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}