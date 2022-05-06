<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Location;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

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

       return view('events.index', [
           'events' => $events
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Mapper::map(18.0159216,-76.7909943, [
            
            'eventBeforeLoad' => 'var marker = new google.maps.Marker();',
            
            'eventAfterLoad' => "

        google.maps.event.addListener(maps[0].map, 'click', function(event) {
            marker.setPosition(event.latLng);
            marker.setMap(map);


            var latitude = document.getElementById('latitude');
            latitude.value = event.latLng.lat();

            var longitude = document.getElementById('longitude');
            longitude.value = event.latLng.lng();
          });"]);
        $locations = Location::get();
        return view('events.create', [
            'locations' => $locations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);



        $request->user()->events()->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'location_id' => $request->location,
            'createdAt' => now(),
            'updatedAt' => now(),
            'lat' => $request->latitude,
            'lng' => $request->longitude
        ]);
 
        Toastr::success('Event added','Success');
        return redirect()->route('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        Mapper::map($event->lat,$event->lng, [ 'zoom'=> 15]);
        Mapper::marker($event->lat, $event->lng, ['animation' => 'DROP', 
        'label'=> [
            'text' => $event->name,
            'color' => 'black',
            'fontFamily' => 'Arial',
            'fontSize' => '35px',
            'fontWeight' => 'bold',], 
            'title' => $event->name, 'draggable' => false, 'clickable' => true]);
        
        return view('events.show', [
            'event' => $event 
        ]);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        //Mapper::map($event->lat,$event->lng, [ 'zoom'=> 15]);
        
        Mapper::map($event->lat,$event->lng, [
            
            'eventBeforeLoad' => "var marker = new google.maps.Marker();" 
           ,
            
            'eventAfterLoad' => "
            var latLng = new google.maps.LatLng($event->lat,$event->lng);
            marker.setPosition(latLng);
            marker.setMap(maps[0].map);


        google.maps.event.addListener(maps[0].map, 'click', function(event) {
            marker.setPosition(event.latLng);
            marker.setMap(map);


            var latitude = document.getElementById('lat');
            latitude.value = event.latLng.lat();

            var longitude = document.getElementById('lng');
            longitude.value = event.latLng.lng();
          });"]);
        $locations = Location::get();

        return view('events.edit', [
            'event' => $event, 
            'locations' => $locations
        ]);
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
        
         $this->validate($request, [
            'name' => 'required',
            'location_id' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);


       $event = Event::find($id);
       
       $event ->update($request->all());
       Toastr::success('Event updated','Success');
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        Toastr::success('Event deleted','Success');
        return redirect()->route('events');
    }
}
