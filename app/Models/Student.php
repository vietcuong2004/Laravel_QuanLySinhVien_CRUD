<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'StudentID';

    public function Classroom(){
        return $this->belongsTo(Classroom::class, 'FK_ClassroomID', 'ClassroomID');
    }

    protected $fillable = [
        'StudentID',
        'StudentName',
        'StudentEmail',
        'StudentGender',
        'FK_ClassroomID',
    ];
}
