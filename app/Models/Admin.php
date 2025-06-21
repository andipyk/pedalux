<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'position',
    ];

    /**
     * Relasi ke model User (one-to-one/belongsTo).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model BlogArticle (one-to-many).
     * Seorang admin bisa menulis banyak artikel.
     */
    public function blogArticles()
    {
        return $this->hasMany(BlogArticle::class);
    }
}
