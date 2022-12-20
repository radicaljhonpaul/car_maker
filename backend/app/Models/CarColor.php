<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarColor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'car_colors';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
}
