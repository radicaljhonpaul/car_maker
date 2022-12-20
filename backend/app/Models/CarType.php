<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CarType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'car_types';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

}
