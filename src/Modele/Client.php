<?php

namespace APP\Modele;

class Client
{
    public $pseudo;
    public $mail;
    public $date;
    public $mdp;

    public function __construct(string $pseudo, string $mail, string $date, string $mdp)
    {
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->date = $date;
        $this->mdp = $mdp;
    }
}
