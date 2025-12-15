<?php

require_once 'Game.php';

class Football extends Game
{
    public function __construct()
    {
        parent::__construct('Football', 22);
    }

    protected function play(): string
    {
        return "Hakam hushtak chaldi, futbol boshlandi ⚽";
    }
}
