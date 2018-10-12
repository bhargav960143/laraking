<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Password_Resets extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'password_resets';
    public $timestamps = false;
}
