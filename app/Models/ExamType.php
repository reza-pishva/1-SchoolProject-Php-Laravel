<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exam;

class ExamType extends Model
{
    use HasFactory;

    protected $table='exam_types';
    protected $guarded=[];

    public function exams(){
        return $this->hasMany(Exam::class);
    }

}
