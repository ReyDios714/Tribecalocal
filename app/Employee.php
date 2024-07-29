<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id', 'address', 'phone', 'rfc', 'curp', 'birthday',
        'employee_type', 'position', 'date_of_joining', 'monthly_salary',
        'service_commission', 'product_commission'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
