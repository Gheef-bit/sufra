<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;
    protected $table = 'indikator';

    protected $fillable = ['user_id', 'tim', 'judul', 'keterangan', 'sasaran'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
