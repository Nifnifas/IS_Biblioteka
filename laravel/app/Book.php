<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	/* @var string; The table associated with the model. */
	protected $table = 'kurinys';
	/* @var bool; Indicates if the model should be timestamped. */
    public $timestamps = false;
	/* @var array; The attributes that are mass assignable. */
    protected $fillable = ['pavadinimas','autorius','isleidimo_metai','aprasymas'];
}
