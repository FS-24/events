<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(5);
        return view('dashboard.events.eventlist', ['events'=>$events]) ;
    } 
    
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.events.eventform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'event_date'=>'required|date',
            'photo'=>'mimes:png,jpg,svg,gif'
        ]);

        if ($request->hasFile('photo')) {
           $path = 'storage/'.$request->file('photo')->store('public/img','public');
        }else{
            $path = null;
        }
        $event = $request->all();
        $event['author_id'] = Auth::user()->id;
        $event['photo'] = $path;
         Event::create($event);
        return redirect()->route('event.list')
        ->with(['status'=>'Event created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { //
        $event = Event::find($id);
        return view('dashboard.events.editform', ['event'=>$event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $request->validate([
            'title'=>'required|string',
            'event_date'=>'required|date',
            'photo'=>'mimes:png,jpg,svg,gif'
        ]);

        if ($request->hasFile('photo')) {
           $path = 'storage/'.$request->file('photo')->store('public/img','public');
        }else{
            $path = null;
        }
        
        $event->title = $request['title'];
        $event->content = $request['content'];
        $event->event_date = $request['event_date'];
        $event->photo = $path;
        $event->save();
        return redirect()->route('event.list')
        ->with(['status'=>'Event updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Event::destroy($id);
        return redirect()->route('event.list')
        ->with(['status'=>'Event deleted successfully']);

    }

    public function search($search){
        $events = Event::where('title', 'like', '%'.$search.'%')->paginate(3);
        return redirect()->route('event.search')->with('events', $events);
    }
}