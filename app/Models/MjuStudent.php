<?php

namespace App\Models;

use App\Http\Controllers\MjuStudentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class MjuStudent extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_code';

    protected $fillable = [
        'major_id' ,
        'student_code',
        'first_name',
        'last_name',
        'last_name_en',
        'first_name_en',
        'idcard',
        'gender',
        'birthdate',
        'address',
        'phone' ,
        'email',
    ];



}

