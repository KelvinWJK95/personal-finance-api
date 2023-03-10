<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'amount', 'date', 'type', 'deleted_at'
    ];

}
