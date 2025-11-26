<?php

namespace App\MoonShine\Resources\Supplier;

use App\Models\Supplier;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use App\MoonShine\Resources\Supplier\Pages\SupplierIndexPage;
use App\MoonShine\Resources\Supplier\Pages\SupplierFormPage;
use App\MoonShine\Resources\Supplier\Pages\SupplierDetailPage;

class SupplierResource extends ModelResource
{
    protected string $model = Supplier::class;
    protected string $title = 'Suppliers';

    protected function pages(): array
    {
        return [
            SupplierIndexPage::class,
            SupplierFormPage::class,
            SupplierDetailPage::class,
        ];
    }

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name')->required(),
            Text::make('Contact', 'contact'),
            Text::make('Email', 'email'),
        ];
    }
}
