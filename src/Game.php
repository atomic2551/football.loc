<?php

abstract class Game
{
    protected string $name;
    protected int $playersCount;

    public function __construct(string $name, int $playersCount)
    {
        $this->name = $name;
        $this->playersCount = $playersCount;
    }

    final public function startGame(): string
    {
        return "O‘yin: {$this->name}, O‘yinchilar: {$this->playersCount}\n"
            . $this->play();
    }

    abstract protected function play(): string;
}
