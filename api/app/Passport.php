<?php 

namespace App;

use App\Traits\UuidTrait;
use Laravel\Passport\Client as OAuthClient; 

class Passport extends OAuthClient
{ 
    use UuidTrait;
    
    /** 
     * Indicates if the IDs are auto-incrementing. 
     * 
     * @var bool 
     */ 
    public $incrementing = false; 
    
    protected $primaryKey = 'id';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string'
    ];
}