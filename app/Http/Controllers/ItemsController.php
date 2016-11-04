<?php

namespace App\Http\Controllers;
use Auth;
use App\Model\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller {

    const NEED_PURCHASED = 1;
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * User's item page
     * @return type view
     */
    public function index() {
        $items = Item::where([
                        ['user_id', Auth::user()->id]
                ])->get();
        $user_id = Auth::user()->id; 
        return view('items.index', compact('items', 'user_id'));
    }
    /**
     * Create a new item
     * @param Request $request
     * @return type
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item_name' => 'required',
            'price' => 'numeric',
            
        ]);
        $item = $request->all();
        $item['price'] = empty($item['price']) ? 0 : $item['price'];
        $item['need_purchased'] = !isset($item['need_purchased']) ? 0 : 1;
        Item::create($item);
        \Session::flash('flash_message','Successfully created.');
        return back();
    }
    /**
     * Update the current item
     * @param Request $request
     * @return type
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'item_name' => 'required',
            'price' => 'numeric'
        ]);
        $item = $request->all();
        $item['price'] = empty($item['price']) ? 0 : $item['price'];
        $item['need_purchased'] = !isset($item['need_purchased']) ? 0 : 1;        
        Item::find($item['id'])->update($item);
        \Session::flash('flash_message','Successfully updated.');
        return back();
    }
   /**
    * Delete the current item
    * @param type $id : item id
    * @return type
    */
    public function delete($id)
    {
        Item::find($id)->delete();
        \Session::flash('flash_message','successfully deleted.');
        return back();
    }
    /**
     * Shopping list
     * @return type view
     */
    public function needPurchasedList()
    {
        $items = Item::where([
                        ['user_id', Auth::user()->id],
                        ['need_purchased', self::NEED_PURCHASED],
                ])->get();
        return view('items.need-purchased', compact('items'));
    }
    /**
     * Update the selected item purchase status
     * @param type $id item id
     * @return type
     */
    public function updatePurchaseStatus($id){
        $item = Item::find($id);
        $item->need_purchased = 0;
        $item->save();
        \Session::flash('flash_message','Purchase Status successfully updated.');
        return back();
    }
}
