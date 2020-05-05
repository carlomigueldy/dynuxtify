<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
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
    public function fileable()
    {
        return $this->morphTo();
    }
}
