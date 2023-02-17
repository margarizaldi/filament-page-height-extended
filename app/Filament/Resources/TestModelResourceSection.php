<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestModelResourceSection\Pages;
use App\Filament\Resources\TestModelResourceSection\RelationManagers;
use App\Models\TestModel;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class TestModelResourceSection extends Resource
{
    protected static ?string $model = TestModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Using Sections';

    protected static ?string $slug = 'using-sections';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Section::make('Section 1')
                    ->collapsed()
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\Select::make('product_id')->options([1,2,3]),
                                Forms\Components\TextInput::make('product_title')->columnSpan(2),
                                Forms\Components\Grid::make(3)->schema([
                                    Forms\Components\Fieldset::make('Cash on Delivery')
                                        ->schema([
                                            Forms\Components\Toggle::make('accept_cod')
                                                ->default(false)
                                                ->reactive(),
                                            Forms\Components\Radio::make('cod_fee_by_seller')
                                                ->hidden(fn (\Closure $get) => $get('accept_cod') === false)
                                                ->options([
                                                    1 => 'Seller',
                                                    0 => 'Buyer',
                                                ])
                                                ->default(1),
                                        ])
                                        ->columns(1)
                                        ->columnSpan(1),
                                    Forms\Components\Fieldset::make('Promo')
                                        ->schema([
                                            Forms\Components\TextInput::make('promo_name'),
                                            Forms\Components\TextInput::make('promo_cycle'),
                                        ])
                                        ->columns(1)
                                        ->columnSpan(1),
                                    Forms\Components\Fieldset::make('View')
                                        ->schema([
                                            Forms\Components\TextInput::make('rating'),
                                            Forms\Components\Select::make('sold_view')->options([1,2,3]),
                                        ])
                                        ->columns(1)
                                        ->columnSpan(1),
                                    ])
                                    ->columns(3),

                                Forms\Components\Grid::make(1)
                                    ->columnSpan(2)
                                    ->schema([
                                        Forms\Components\Fieldset::make('Confirmation')
                                            ->columns(1)
                                            ->columnSpan(2)
                                            ->schema([
                                                Forms\Components\Toggle::make('should_confirm'),
                                                Forms\Components\Textarea::make('whatsapp_template'),
                                            ]),
                                        Forms\Components\Fieldset::make('Event Tracker')
                                            ->schema([
                                                Forms\Components\Repeater::make('event_tracker')
                                                    ->disableLabel()
                                                    ->defaultItems(0)
                                                    ->columns(2)
                                                    ->schema([
                                                        Forms\Components\Select::make('type')->options([1,2,3]),
                                                        Forms\Components\TextInput::make('value'),
                                                    ]),
                                            ])
                                            ->columns(1)
                                            ->columnSpan(2),
                                    ]),
                                Forms\Components\Fieldset::make('Notifications')
                                    ->schema([
                                        Forms\Components\Toggle::make('in_app'),
                                        Forms\Components\Toggle::make('email'),
                                        Forms\Components\Toggle::make('slack'),
                                    ])
                                    ->columns(1)
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(2)
                            ->columns(3),
                    ]),
                Forms\Components\Section::make('Section 2')
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('discount')
                            ->minItems(0)
                            ->defaultItems(0)
                            ->columns(2)
                            ->columnSpan(2)
                            ->inset()
                            ->schema([
                                Forms\Components\TextInput::make('discount_name'),
                            ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTestModels::route('/'),
            'create' => Pages\CreateTestModel::route('/create'),
            'edit' => Pages\EditTestModel::route('/{record}/edit'),
        ];
    }
}
