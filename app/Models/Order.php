<?php

namespace App\Models;

use App\Traits\Statable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, Statable;
    protected $guarded = ['id'];
    const HISTORY_MODEL = [
        'name' => 'App\OrderState' // the related model to store the history
    ];
    const SM_CONFIG = 'order'; // the SM graph to use

    protected $casts = [
        'update_at' => 'datetime',
    ];

    public static $Status = [
        'new',
        'pending',
        'preparing',
        'delivering',
        'done'
    ];
    //

}
