<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;


class AboutMe extends Model
{
    use HasFactory;
    use SoftDeletes;

    Protected $table = 'about_me';
}
