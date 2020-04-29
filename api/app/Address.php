<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are not mass assignable.
     * 
     * @var Array
     */
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    /**
     * Get the owning addressable Model.
     * 
     * @return MorphTo
     */
    public function addressable()
    {
        return $this->morphTo();
    }
}
