<?php

require_once 'Game.php';

class Chess extends Game
{
    public function __construct()
    {
        parent::__construct('Chess', 2);
    }

    protected function play(): string
    {
        return "Oq donalar yurishni boshladi ♟️";
    }
}
