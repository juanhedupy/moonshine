<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Customer;

use App\Models\Customer;
use App\MoonShine\Resources\Customer\Pages\CustomerIndexPage;
use App\MoonShine\Resources\Customer\Pages\CustomerFormPage;
use App\MoonShine\Resources\Customer\Pages\CustomerDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;

class CustomerResource extends ModelResource
{
    protected string $model = Customer::class;

    protected string $title = 'Clientes';

    protected function pages(): array
    {
        return [
            CustomerIndexPage::class,
            CustomerFormPage::class,
            CustomerDetailPage::class,
        ];
    }

    public function fields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Nombre', 'name')->required(),

            Text::make('Email', 'email')->required(),

            Text::make('Teléfono', 'phone')->hideOnIndex(),
        ];
    }
}
