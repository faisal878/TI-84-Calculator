<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * Table name (optional, Laravel automatically uses 'settings')
     */
    protected $fillable = [
        'type',
        'data',
        'title',
        'meta_title',
        'meta_description',
    ];
}
