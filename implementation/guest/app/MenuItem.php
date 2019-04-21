<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
            protected $table = "MenuItems";

    protected $fillable = ['id', 'items', 'unitCost', 'itemType'];
}
