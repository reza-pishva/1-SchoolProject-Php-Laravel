<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToClass extends Model
{
    use HasFactory;
    protected $table='user_to_classes';
    protected $guarded=[];
}
