<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_indikator extends Model
{
    use HasFactory;
    protected $table = 'user_indikator';

    protected $fillable = ['user_id', 'tim', 'kendala', 'solusi', 'rencana_tindak_lanjut'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
