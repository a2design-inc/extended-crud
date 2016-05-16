# Extednded Crud Generator
Extends templates compiling for [appzcoder/crud-generator](https://github.com/appzcoder/crud-generator)

### Requirements
    Laravel >=5.1
    PHP >= 5.5.9


## Installation

1. Run
    ```
    composer require a2design/extended-crud
    ```

2. Add service provider to **/config/app.php** file.
    ```php
    'providers' => [
        ...

        A2Design\ExtendedCrud\ExtendedCrudServiceProvider::class,
    ],
    ```
3. Install **laravelcollective/html** package for form & html.
    * Run

    ```
    composer require laravelcollective/html
    // For laravel 5.1
    composer require laravelcollective/html "5.1.*"
    ```

    * Add service provider & aliases to **/config/app.php** file.
    ```php
    'providers' => [
        ...

        Collective\Html\HtmlServiceProvider::class,
    ],

    // Use the lines below for "laravelcollective/html" package otherwise remove it.
    'aliases' => [
        ...

        'Form'      => Collective\Html\FormFacade::class,
        'HTML'      => Collective\Html\HtmlFacade::class,
    ],
    ```
4. Run **composer dump-autoload**

5. Publish config file & generator template files.
    ```
    php artisan vendor:publish
    ```

Note: You should have configured database for this operation.


### Commands

See docs of original [generator](https://github.com/appzcoder/crud-generator) 