<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];


    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function scopeSearch($query, $search)

    {
        $query->where('title', 'LIKE', '%' . $search . '%')

        ->orWhere('body', 'LIKE', '%' . $search . '%');
    }


}
