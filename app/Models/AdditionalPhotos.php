<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalPhotos extends Model
{
    use HasFactory;

    //protected $guarded = [];
    protected $fillable = ['post_id', 'filename'];
}
