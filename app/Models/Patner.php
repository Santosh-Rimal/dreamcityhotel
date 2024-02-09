<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patner extends Model
{
    use HasFactory;
    protected $fillable=['name',
'image',
'description',
'short_description',
'slug',];
}