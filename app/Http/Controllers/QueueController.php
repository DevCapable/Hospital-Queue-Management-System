<?php

namespace App\Http\Controllers;

use App\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
     public function reserve(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'service' => 'required',

      ]);

        $queue = new Queue();
        $queue->name = $request->name;
        $queue->service = $request->service;
        $queue->status = false;
        $queue->save();
      return redirect()->route('welcome')->with('successMsg','Request Successfully Sent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the queue item by ID
        $queue = Queue::findOrFail($id);

        // Delete the queue item
        $queue->delete();

        // Redirect back with a success message
        return redirect()->route('queue.index')->with('success', 'Queue item deleted successfully.');
    }
}
