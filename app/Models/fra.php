<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fra extends Model
{
    use HasFactory;
    protected $table = 'fra';

    protected $fillable = [
        'user_id',
        'pimpinan_rapat',
        'tim',
        'tanggal_rapat',
        'tempat_rapat',
        'peserta_rapat',
        'agenda',
        'kesimpulan',
        'tanggal_pengisian', 
        'notulis',
        'pjwenang',
        // 'foto_ttd_notulis',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
