<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class UserHasPermissions extends Model
{
    /*
     *  Table Name
     */
    protected $table = "model_has_permissions";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id', 'model_type', 'model_id'
    ];

    /*
     * Timestemp
     */
    public $timestamps = false;
}
