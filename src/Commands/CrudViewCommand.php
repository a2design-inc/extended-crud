<?php

namespace A2Design\ExtendedCrud\Commands;

use Appzcoder\CrudGenerator\Commands\CrudViewCommand as OriginalCrudViewCommand;
use Illuminate\Console\Command;

class CrudViewCommand extends OriginalCrudViewCommand
{


    protected $description = "Create views for the Crud";
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
        $formGroup =
            <<<EOD
<li>\n
    <span class="first {{ \$errors->has('%1\$s') ? 'has-error' : ''}}">
        {!! Form::label('%1\$s', %2\$s, ['class' => 'col-sm-3 control-label']) !!}
    </span>\n
    <span class="last">
        %3\$s
    </span>\n
    @if (\$errors->has('%1\$s'))
            <span class="error-msg">{{ \$errors->first('%1\$s') }}</span>\n
    @endif
</li>\n
EOD;
        $labelText = "'" . ucwords(strtolower(str_replace('_', ' ', $item['name']))) . "'";
        if ($this->option('localize') == 'yes') {
            $labelText = 'trans(\'' . $this->crudName . '.' . $item['name'] . '\')';
        }
        return sprintf($formGroup, $item['name'], $labelText, $field);
    }
}
