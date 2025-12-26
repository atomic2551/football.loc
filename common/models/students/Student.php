<?php

namespace common\models\students;

abstract class Student
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function study(): array;
}
