<?php

namespace App;

use App\Traits\UuidTrait;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes, SoftCascadeTrait, UuidTrait;

    /**
     * The related models gets deleted when
     * this model gets softly deleted.
     * 
     * @var Array
     */
    protected $softCascade = [
        'addresses'
    ];
    
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
    public function contactable()
    {
        return $this->morphTo();
    }

    /**
     * A contact may have many addresses.
     * 
     * @return MorphMany
     */
    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }
}
