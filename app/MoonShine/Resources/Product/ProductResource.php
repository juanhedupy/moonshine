<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Product;

use App\Models\Product;
use App\MoonShine\Resources\Product\Pages\ProductIndexPage;
use App\MoonShine\Resources\Product\Pages\ProductFormPage;
use App\MoonShine\Resources\Product\Pages\ProductDetailPage;
use App\MoonShine\Resources\Category\CategoryResource;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\BelongsTo;

/**
 * @extends ModelResource<Product, ProductIndexPage, ProductFormPage, ProductDetailPage>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Productos';
    
    protected function pages(): array
    {
        return [
            ProductIndexPage::class,
            ProductFormPage::class,
            ProductDetailPage::class,
        ];
    }

    // Eliminamos la línea public string $column = 'name'; porque no es necesaria.

    public function fields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Nombre', 'name')->required(),

            Textarea::make('Descripción', 'description')->hideOnIndex(),

            // Relación con categoría - Corregido: sin espacios y en minúscula
            BelongsTo::make('Categoría', 'category', 'name')
                ->required()
                ->searchable(), // Añadimos searchable para mejor experiencia
        ];
    }
}