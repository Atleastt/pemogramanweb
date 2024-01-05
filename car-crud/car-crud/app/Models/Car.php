<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['model', 'year', 'vclass', 'user_id'];

    public function carModels() {
        return $this->hasMany(CarModel::class);
    }
}
