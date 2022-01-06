<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'code', 'description'];

    /** Relacion con categorias */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }   
}
