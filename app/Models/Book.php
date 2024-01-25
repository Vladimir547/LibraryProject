<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'Title',
        'genre',
        'description',
        'author_id'
    ];
    public function author ()
    {
        return $this->belongsTo(Author::class);
    }
}
