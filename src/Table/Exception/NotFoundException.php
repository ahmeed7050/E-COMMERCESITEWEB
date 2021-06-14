<?php

namespace App\Table\Exception;

class NotFoundException extends \Exception
{
    public function __construct(string $table, $id)
    {
        $this->message = "Aucunn enregistrement ne correspond à l'id #$id dans la table '$table'";
    }
}
