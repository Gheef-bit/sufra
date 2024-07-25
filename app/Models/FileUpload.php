<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;
    protected $table = 'file_uploads';

    protected $fillable = ['user_id', 'tim', 'file_name', 'file_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
