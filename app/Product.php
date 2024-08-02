<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Elimina o comenta esta línea si no estás utilizando factories.
    // use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 
        'name', 
        'brand', 
        'quantity_ml_grs', 
        'barcode', 
        'purchase_cost', 
        'sale_cost', 
        'cost_per_ml_gr', 
        'description', 
        'cost', 
        'sale_price', 
        'category_id'
    ];

    // Definir la relación con el modelo Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Definir la relación con el modelo Inventory
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
