<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    protected $fillable = ['code_id', 'detail', 'debit', 'credit'];

    /**
     * relacion a cuentas, se redirige por campo code_id
     *
     * @return void
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'code_id', 'code_id');
    }
}
