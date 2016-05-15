<?php

namespace A2Design\ExtendedCrud\Commands;

use Appzcoder\CrudGenerator\Commands\CrudViewCommand as OriginalCrudViewCommand;
use Illuminate\Console\Command;

class CrudViewCommand extends OriginalCrudViewCommand
{
    protected $description = "Create views for the Crud";

    protected function getPartialStub($partialName)
    {
        return config('crudgenerator.custom_template')
        ? config('crudgenerator.path') . "_partials/{$partialName}.stub"
        : __DIR__ . "/../stubs/_partials/{$partialName}.stub";
    }


    /**
     * Form field wrapper.
     *
     * @param  string $item
     * @param  string $field
     *
     * @return void
     */
    protected function wrapField($item, $field)
    {

        $createFile = $this->getPartialStub('input');
        $stub = $this->files->get($createFile);
        $labelText = "'" . ucwords(strtolower(str_replace('_', ' ', $item['name']))) . "'";
        if ($this->option('localize') == 'yes') {
            $labelText = 'trans(\'' . $this->crudName . '.' . $item['name'] . '\')';
        }

        $str = str_replace('{{inputName}}', $inputName, $str);
        $str = str_replace('{{labelText}}', $labelText, $str);
        $str = str_replace('{{inputField}}', $field, $str);
        return $str;
    }
}
