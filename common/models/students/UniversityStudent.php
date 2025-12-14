<?php

namespace common\models\students;

class UniversityStudent extends Student
{
    public function study(): array
    {
        return [
            'type' => 'university',
            'name' => $this->name,
            'activity' => 'Universitetda ilmiy tadqiqot olib boryapti',
        ];
    }
}
