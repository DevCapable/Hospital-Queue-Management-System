<?php

namespace App\Http\Controllers\Admin;

use App\Queue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QueueController extends Controller
{

    public function index()
    {
        $queues = Queue::all();
        return view('admin.queue.index',compact('queues'));
    }

    public function status($id){
        $queue = Queue::find($id);
        $queue->status = true;
        $queue->user_id=auth()->id();
        $queue->save();
       return redirect()->route('queue.index')->with('successMsg','Request Successfully confirmed');
    }

     public function destroy($id){
         // Find the queue item by ID
         $queue = Queue::findOrFail($id);

         // Delete the queue item
         $queue->delete();

         // Redirect back with a success message
         return redirect()->route('queue.index')->with('successMsg', 'Queue item deleted successfully.');
     }

}
