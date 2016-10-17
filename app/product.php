<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\price as price;
class product extends Model
{
    protected $fillabe =[
      'title','category','modal','price','disc','afterDisc','photo','stock','point'
    ];
}
