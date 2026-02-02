<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\Section;
use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Info')->schema([
                    Forms\Components\TextInput::make('site_name')
                        ->label('Nama Website')
                        ->required(),
                    
                    SpatieMediaLibraryFileUpload::make('logo')
                        ->label('Logo')
                        ->collection('logo')
                        ->image()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            '1:1',
                            'free',
                        ])
                        ->helperText('Upload logo website (disarankan 1:1 ratio)'),
                    
                    Forms\Components\Textarea::make('location_address')
                        ->label('Alamat Lokasi')
                        ->rows(3),
                ])->columns(1),

                Section::make('Owner Profile')->schema([
                    Forms\Components\TextInput::make('owner_name')
                        ->label('Nama Owner')
                        ->placeholder('Tilly Rose')
                        ->maxLength(255),
                    
                    Forms\Components\Textarea::make('owner_bio')
                        ->label('Biografi Owner')
                        ->rows(4)
                        ->placeholder('Ceritakan tentang owner...'),
                    
                    Forms\Components\TextInput::make('owner_instagram')
                        ->label('Instagram Owner')
                        ->prefix('https://instagram.com/')
                        ->placeholder('dunia_fotografi'),

                    SpatieMediaLibraryFileUpload::make('owner_image')
                        ->label('Foto Owner')
                        ->collection('owner_image')
                        ->image()
                        ->imageEditor()
                        ->columnSpanFull(),
                ])->columns(1),

                Section::make('Hero Section')->schema([
                    Forms\Components\TextInput::make('hero_title')
                        ->label('Hero Title')
                        ->placeholder('Nadi Memori')
                        ->helperText('Judul utama hero section'),
                    
                    Forms\Components\TextInput::make('hero_subtitle')
                        ->label('Hero Subtitle')
                        ->placeholder('Sebab Setiap Detik Memiliki Cerita yang Pantas Diingat')
                        ->helperText('Subtitle hero section'),
                    
                    SpatieMediaLibraryFileUpload::make('hero_image')
                        ->label('Hero Image')
                        ->collection('hero_image')
                        ->image()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                        ])
                        ->helperText('Upload foto untuk hero section di homepage')
                        ->columnSpanFull(),
                ])->columns(1),

                Section::make('Social Media')->schema([
                    Forms\Components\TextInput::make('whatsapp')
                        ->label('WhatsApp Number')
                        ->placeholder('+6200000000000')
                        ->numeric(),
                    
                    Forms\Components\TextInput::make('instagram')
                        ->label('Instagram URL')
                        ->url()
                        ->prefix('https://www.instagram.com/'),

                    Forms\Components\TextInput::make('facebook')
                        ->label('Facebook URL')
                        ->url()
                        ->prefix('https://www.facebook.com/'),

                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')->label('Website Name'),
                Tables\Columns\TextColumn::make('whatsapp'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
