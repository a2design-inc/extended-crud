<?php

namespace A2Design\ExtendedCrud;

use Appzcoder\CrudGenerator\CrudGeneratorServiceProvider as OriginalCrudGeneratorServiceProvider;
use Illuminate\Support\ServiceProvider;

class ExtendedCrudServiceProvider extends OriginalCrudGeneratorServiceProvider
{

    public function boot()
    {
        parent::boot();
        $this->publishes([
            __DIR__ . '/stubs/_partials' => base_path('resources/crud-generator/_partials'),
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Appzcoder\CrudGenerator\Commands\CrudCommand',
            'Appzcoder\CrudGenerator\Commands\CrudControllerCommand',
            'Appzcoder\CrudGenerator\Commands\CrudModelCommand',
            'Appzcoder\CrudGenerator\Commands\CrudMigrationCommand',
            'A2Design\ExtendedCrud\Commands\CrudViewCommand',
            'Appzcoder\CrudGenerator\Commands\CrudLangCommand'
        );
    }
}
