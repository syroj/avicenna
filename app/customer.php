<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable=[
      'customer_id','name','phone','email','address','poin'
    ];
}
