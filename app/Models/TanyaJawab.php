<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanyaJawab extends Model
{
    use HasFactory;
    protected $table = 'tanyajawab';

    protected $fillable = ['user_id', 'tim', 'nama_penanya', 'pertanyaan', 'jawaban'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
