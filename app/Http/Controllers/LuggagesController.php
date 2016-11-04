<?php

namespace App\Http\Controllers;
use Auth;
use App\Model\Luggage;
use App\Model\Item;
use Illuminate\Http\Request;

class LuggagesController extends Controller
{
    private $user_id;
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Luggages list page
     * @return type view
     */
    public function index() {
        $luggages = Luggage::where([
                        ['user_id', Auth::user()->id]
                ])->get();
        $user_id = $this->user_id = \Auth::user()->id; 
        return view('luggages.index', compact('luggages', 'user_id'));
    }    
    
    /**
     * Create a new luggage
     * @param Request $request
     * @return type
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'luggage_name' => 'required'
        ]);
        Luggage::create($request->all());
        \Session::flash('flash_message','Successfully saved.');
        return back();
    }
    
    /**
     * Update the current luggage
     * @param Request $request
     * @return type
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'luggage_name' => 'required'
        ]);
        $luggage = $request->all();
        Luggage::find($luggage['id'])->update($luggage);
        \Session::flash('flash_message','Successfully updated.');
        return back();
    }
    /**
     * Delete the selected luggage
     * @param type $id
     * @return type
     */
    public function delete($id)
    {
        Luggage::find($id)->delete();
        \Session::flash('flash_message','Successfully deleted.');
        return back();
    }
    /**
     * Manage items in a selected luggage
     * @param type $id
     * @return type
     */
    public function manageItemsToLuggage($id) {
        $luggage = Luggage::find($id);
        $luggage_items = $luggage->findAssignedItem($id);
        $item = new Item;
        $items = $item->findItemsByUser(\Auth::user()->id);
        return view('luggages.assign-items', compact('luggage', 'items', 'luggage_items'));
    }
    /**
     * Remove an item from the luggage
     * @param type $luggage_id
     * @param type $item_id
     * @return type
     */
    public function removeItemsFromLuggage($luggage_id, $item_id){
        $luggage = Luggage::find($luggage_id);
        $luggage->removeAssignedItem($luggage_id, $item_id);
        \Session::flash('flash_message','Successfully removed.');        
        return back();
    }
    /**
     * Assign an item to the luggage 
     * @param type $luggage_id
     * @param type $item_id
     * @return type
     */
    public function assignItemToLuggage($luggage_id, $item_id) {
        $luggage = Luggage::find($luggage_id);        
        $luggage->assignItemToLuggage($luggage_id, $item_id);
        \Session::flash('flash_message','Successfully assigned.');
        return back();
    }
}
