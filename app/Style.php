<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'background','color','position_horizontal','position_vertical','size','is_visible','text_id',
    ];
}
