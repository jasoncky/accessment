<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sentence extends Model
{
    use SoftDeletes;

    public $table = 'sentences';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'style',
        'colour',
        'position',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
