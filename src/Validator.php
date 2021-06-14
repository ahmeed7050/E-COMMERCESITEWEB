<?php

namespace App;

use Valitron\Validator as valitronValidator;

class Validator extends valitronValidator
{
    protected static $_lang = "fr";
    protected function checkAndSetLabel($field, $message, $params)
    {
        return str_replace('{field} ', '', $message);
    }
}
