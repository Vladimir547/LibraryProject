<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'firstName',
        'lastName',
        'genre',
        'description',
        'author_id'
    ];
    public function books() {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
