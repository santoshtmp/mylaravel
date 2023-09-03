<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title', 
        'subject',
        'description',
        'location',
        'logo',
        'tags',
        'email',
        'website'
    ];

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        if ($filters['tags'] ?? false) {
            $query->where('tags', 'like', '%' . request('tags') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('description', 'like', '%' . request('search') . '%')
                ->orwhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
