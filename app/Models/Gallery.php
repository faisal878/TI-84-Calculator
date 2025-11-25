<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'type',
        'file_path',
        'uploaded_by',
        'w',
        'h',
    ];

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }
}
