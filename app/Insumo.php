<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    // Elimina o comenta esta línea si no estás utilizando factories.
    // use HasFactory;

    protected $fillable = [
        'description', 
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}