<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\book as book;
class priceChange extends Model
{
    protected $fillable=[
      'id_barang', 'modal','price','disc','afterDisc'
    ];
}
