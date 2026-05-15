<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'admin_id',
        'title',
        'content',
        'is_published',
        'featured_image', //Added featured_image to fillable
    ];

    public function author()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
