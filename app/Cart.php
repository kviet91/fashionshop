<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){


		if($item->discount == 0){
			$giohang = ['qty'=>0, 'price' => $item->price, 'item' => $item];
		}
		else{
			$giohang = ['qty'=>0, 'price' => (($item->price)- ($item->price *$item->discount)), 'item' => $item];
		}
		if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
                $this->totalQty--;
            }
        }

		$giohang['qty']++;
		if($item->discount == 0){
			$giohang['price'] = $item->price * $giohang['qty'];
		}
		else{
			$giohang['price'] = (($item->price)- ($item->price *$item->discount)) * $giohang['qty'];
		}
		$this->items[$id] = $giohang;

		$this->totalQty++;
		if($item->discount == 0){
			$this->totalPrice += $item->price;
		}
		else{
			$this->totalPrice += ($item->price)- ($item->price *$item->discount);
		}
		
	}

	//
    public function addDetail($item, $id, $q){


        if($item->discount == 0){
            $giohang = ['qty'=>$q, 'price' => $item->price, 'item' => $item];
        }
        else{
            $giohang = ['qty'=>$q, 'price' => (($item->price)- ($item->price *$item->discount)) , 'item' => $item];
        }

        if($this->items){
            if(array_key_exists($id, $this->items)){
                //$giohang = $this->items[$id];
                $this->totalQty--;
                $this->totalPrice -= $this->items[$id]['price'];
            }
        }

        //$giohang['qty']++;
        if($item->discount == 0){
            $giohang['price'] = $item->price * $giohang['qty'];
        }
        else{
            $giohang['price'] = (($item->price)- ($item->price *$item->discount)) * $giohang['qty'];
        }
        $this->items[$id] = $giohang;
        $this->totalQty++;
        if($item->discount == 0){
            $this->totalPrice += $this->items[$id]['price'];
        }
        else{
            $this->totalPrice += $this->items[$id]['price'];
        }

    }

	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->items[$id]['qty'] = 0;
        $this->totalQty--;
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
