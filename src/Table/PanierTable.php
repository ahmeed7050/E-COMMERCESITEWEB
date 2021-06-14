<?php

namespace App\Table;

use App\Modele\Panier;
use App\Table\Table;


final class PanierTable extends Table
{
    protected $table = "panier";
    protected $class = Panier::class;

    public function add(Panier $panier): void
    {
        $this->create([
            'client_id' => $panier->getClientId(),
            'name_post' => $panier->getNamePost(),
            'content' => $panier->getcontent(),
            'created_at' => $panier->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
    }
}
