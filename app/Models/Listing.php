<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'company', 'location', 'website', 'email', 'description', 'tags', 'logo'];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            // '%' means anything can be before or after the tag
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // search form filter and search in title, description, tags
        if($filters['search'] ?? false) {
            // '%' means anything can be before or after the tag
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship To User (a LIsting belongs to a User)
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
