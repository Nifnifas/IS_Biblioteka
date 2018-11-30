<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
	/* @var string; The table associated with the model. */
	protected $table = 'egzempliorius';
	/* @var bool; Indicates if the model should be timestamped. */
    public $timestamps = false;
	/* @var array; The attributes that are mass assignable. */
    protected $fillable = ['kodas'];
}
