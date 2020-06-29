<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    //
    protected $fillable = [
        'id', 'first_name', 'last_name', 'email', 'phone_number', 'adress', 'address_2', 'gouvernorat', 'city', 'zip'
    ];
}
