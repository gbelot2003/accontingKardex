<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    protected $fillable = ['code_id', 'detail', 'debit', 'credit', 'user_id'];

    /**
     * relacion a cuentas, se redirige por campo code_id
     *
     * @return void
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'code_id', 'code_id');
    }

    /**
     * relacion a usuarios
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
