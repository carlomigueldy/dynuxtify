<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UuidTrait
{
    /**
     * On boot, auto generates a uuid.
     * 
     * @return Void
     */
    protected static function bootUuidTrait()
    {
        // parent::boot();
        
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Prevents the primary key in auto-incrementing.
     * 
     * @return Boolean
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * The primary key type return string type.
     * 
     * @return String
     */
    public function getKeyType()
    {
        return 'string';
    }
}