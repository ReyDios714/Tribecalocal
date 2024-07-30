<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Elimina o comenta esta línea si no estás utilizando factories.
    // use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    // Si tienes una relación inversa desde Category a Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}