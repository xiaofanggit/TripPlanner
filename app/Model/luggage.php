<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class luggage extends Model
{
    public $fillable = ['user_id','luggage_name','luggage_description'];
    public function users()
    {
        return $this->belongTo('App\Model\User');
    }
    public function items(){
        return $this->hasMany('App\Model\Item');
    }
    public function findAssignedItem($id)
    {
         return DB::table('luggages_items')->where('luggage_id',  $id)->get()->keyBy('item_id')->toArray();
    }
    public function removeAssignedItem($luggage_id, $item_id)
    {
        return DB::table('luggages_items')->where([['luggage_id',  $luggage_id], ['item_id', $item_id]])->delete();
    }
    public function assignItemToLuggage($luggage_id, $item_id)
    {        
        $luggage_item = DB::table('luggages_items')->where([['luggage_id',  $luggage_id], ['item_id', $item_id]])->first();
        if ($luggage_item === null) {
           return DB::table('luggages_items')->insert([
                ['luggage_id' => $luggage_id, 'item_id' => $item_id]
            ]);
        }
        return false;
    }
}
