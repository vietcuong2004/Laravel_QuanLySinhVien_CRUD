<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = [
            ['ClassroomID' => 4, 'ClassroomName' => '64HTTT4'],
            ['ClassroomID' => 5, 'ClassroomName' => '64HTTT5'],
            ['ClassroomID' => 6, 'ClassroomName' => '64HTTT6'],
            ['ClassroomID' => 7, 'ClassroomName' => '64HTTT7'],
            ['ClassroomID' => 8, 'ClassroomName' => '64HTTT8'],
        ];

        foreach ($classrooms as $classroom) {
            DB::table('Classrooms')->insert($classroom);
        }
    }
} 