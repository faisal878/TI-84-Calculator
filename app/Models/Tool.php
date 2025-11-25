<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Table name (optional, Laravel automatically uses 'tools')
     */
    protected $table = 'tools';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'data',
        'slug',
        'home',
        'title',
        'index',
        'status',
        'tool_id',
        'language',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'data' => 'array', // JSON data ko automatically array me convert karega
        'status' => 'boolean',
    ];

    
    /**
     * Soft deletes handled automatically
     */
    protected $dates = ['deleted_at'];

    /**
     * Optional: Parent tool relationship
     */
    public function parentTool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }

    /**
     * Optional: Child tools relationship
     */
    public function childTools()
    {
        return $this->hasMany(Tool::class, 'tool_id');
    }
}
