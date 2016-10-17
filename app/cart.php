<?php

namespace App;

class cart
{

    public $items =null;
    public $totalQty=0;
    public $totalPrice=0;

    public function __construct($oldCart){
      if($oldCart){

        $this->items=$oldCart->items;
        $this->totalQty=$oldCart->totalQty;
        $this->totalPrice=$oldCart->totalPrice;
      }
    }
    public function add($item, $id){

      $storedItem=[
        'Qty'=>0,
        'price'=>$item->afterDisc,
        'item'=>$item
      ];
      if($this->items){
        if(array_key_exists($id, $this->items)){
          $storedItem=$this->items[$id];
        }
      }
      $storedItem['Qty']++;
      $storedItem['price']=$item->afterDisc * $storedItem['Qty'];
      $this->items[$id] = $storedItem;
      $this->totalQty++;
      $this->totalPrice += $item->afterDisc;
    }
    public function addOne($id){
      $totalSementara=$this->items[$id]['Qty'];
      $stock=$this->items[$id]['item']['stock'];
      if ($totalSementara < $stock) {
        $this->items[$id]['Qty']++;
        $this->items[$id]['price']+=$this->items[$id]['item']['afterDisc'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['afterDisc'];
      }
    }
    public function minOne($id){
      $this->items[$id]['Qty']--;
      $this->items[$id]['price']-=$this->items[$id]['item']['afterDisc'];
      $this->totalQty--;
      $this->totalPrice -= $this->items[$id]['item']['afterDisc'];
      if ($this->items[$id]['Qty']<=0) {
        unset($this->items[$id]);
      }
    }
    public function removeItem($id){
      $this->totalQty-=$this->items[$id]['Qty'];
      $this->totalPrice -= $this->items[$id]['price'];
      unset($this->items[$id]);
    }
}
