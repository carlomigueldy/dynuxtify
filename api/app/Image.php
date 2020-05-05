<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    
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
     * Get the owning contactable Model.
     * 
     * @return MorphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
