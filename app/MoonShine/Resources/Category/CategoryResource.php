<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Category;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\MoonShine\Resources\Category\Pages\CategoryIndexPage;
use App\MoonShine\Resources\Category\Pages\CategoryFormPage;
use App\MoonShine\Resources\Category\Pages\CategoryDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Category, CategoryIndexPage, CategoryFormPage, CategoryDetailPage>
 */
class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $title = 'Categories';
    
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            CategoryIndexPage::class,
            CategoryFormPage::class,
            CategoryDetailPage::class,
        ];
    }

   public function fields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Nombre', 'name')->required(),

            Textarea::make('Descripción', 'description')->hideOnIndex(),

            // Relación con productos
            HasMany::make('Productos', 'products', ProductResource::class),
        ];
    }

    public function titleField(): string
    {
        return 'name'; // <- Esto indica a MoonShine que el "name" es el título
    }

 
}  
