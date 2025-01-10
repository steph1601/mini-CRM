<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companies extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'companies';

    protected $fillable = [ 
        'company_name', 
        'email', 
        'logo', 
        'website',
    ];

    public function employees()
    {
        return $this->hasMany(Employees::class, 'company_id');
    }

}
