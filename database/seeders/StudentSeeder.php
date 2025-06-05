<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            // Sinh viên 1
            [
                'StudentID' => 1010,
                'StudentName' => 'Nguyễn Văn An',
                'StudentEmail' => 'an.nguyen@gmail.com',
                'StudentGender' => '0',
                'FK_ClassroomID' => 4
            ],

            //Sinh viên 2
            [
                'StudentID' => 1011,
                'StudentName' => 'Trần Thị Bình',
                'StudentEmail' => 'binh.tran@gmail.com',
                'StudentGender' => '1',
                'FK_ClassroomID' => 5
            ],

            // Sinh viên 3
            [
                'StudentID' => 1012,
                'StudentName' => 'Lê Văn Cường',
                'StudentEmail' => 'cuong.le@gmail.com',
                'StudentGender' => '0',
                'FK_ClassroomID' => 6
            ],

            //Sinh viên 4
            [
                'StudentID' => 1013,
                'StudentName' => 'Phạm Thị Dung',
                'StudentEmail' => 'dung.pham@gmail.com',
                'StudentGender' => '1',
                'FK_ClassroomID' => 7
            ],

            //Sinh viên 5
            [
                'StudentID' => 1014,
                'StudentName' => 'Hoàng Văn Em',
                'StudentEmail' => 'em.hoang@gmail.com',
                'StudentGender' => '0',
                'FK_ClassroomID' => 8
            ]
        ];

        foreach ($students as $student) {
            DB::table('Students')->insert($student);
        }
    }
} 
