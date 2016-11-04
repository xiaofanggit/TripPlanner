<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Item extends Model
{
    public $fillable = ['user_id','item_name','item_description','need_purchased','price'];
    public function users(){
        return $this->belongTo('App\Model\User');
    }
    public function luggages(){
        return $this->belongTo('App\Model\Luggage');
    }
    public function findItemsByUser($id) {
        return DB::table('items')->where('user_id',  $id)->get()->keyBy('id')->toArray();        
    }
}
