<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
        protected $fillable = [
        'user_id', 'usertoken', 'checkin', 'checkout', 'numberofperson', 'roomtype', 'roomnumber', 'roomprice', 'utilities', 'utilitiescharge', 'totalprice', 'name', 'email', 'phone', 'status',
    ];
}
