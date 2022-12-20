<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cars';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class, 'id', 'manufacturer_fk');
    }

    public function color()
    {
        return $this->hasOne(CarColor::class , 'id', 'color_fk');
    }

    public function car_type()
    {
        return $this->hasOne(CarType::class, 'id', 'type_fk');
    }
}
