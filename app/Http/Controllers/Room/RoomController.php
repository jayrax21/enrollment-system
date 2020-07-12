<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;
class RoomController extends Controller
{
    public function index()
    {
        $room = Room::all();
        return view('room')->with('rooms',$room);
    }
    public function addRoom(Request $request)
    {
      $data = $request->validate(
          [
          'room' => 'required'
          ],
          [
            'room.required' => 'Please enter Room Name'
          ]
      );
      Room::create($data);
      return redirect()->back()->with('succ','Room added successfully.');
    }
    public function editRoom(Request $request, $id)
    {
       $room = Room::find($id);
       $room->room = $request->room;
       $room->save();
       return redirect()->back()->with('succ','Room updated successfully.');
    }
    public function deleteRoom($id)
    {
      $room = Room::find($id);
      $room->delete();
      return redirect()->back()->with('del','Deleted successfully.');
    }
}
