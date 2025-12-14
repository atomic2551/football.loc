<?php

namespace common\models\students;

class SchoolStudent extends Student
{
    public function study(): array
    {
        return [
            'type' => 'school',
            'name' => $this->name,
            'activity' => 'Maktabda dars qilyapti',
        ];
    }
}
