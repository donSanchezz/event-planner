@extends('layouts.app')

@section('content')
{!! Toastr::message() !!}
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg flex justify-between">
        <div class="w-5/12">
        <form action="{{ route('update', ['event' => $event])}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{$event->name}}" placeholder="Event name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location_id">Location</label>
            
                <select type="text" name="location_id" id="location_id" placeholder="Location" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('location_id') border-red-500 @enderror" value="{{ old('location_id') }}">
                @foreach($locations as $location)
                @if($event->location->id == $location->id)
                    <option value="{{ $location->id }}" selected>{{$location->name}}</option>
                
                @else
                    <option value="{{ $location->id }}">{{$location->name}}</option>
                @endif
                @endforeach
                </select>
                
                @error('location')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="lat">Latitude</label>
                <input  name="lat" id="lat" readonly value="{{$event->lat}}" placeholder="Place a marker on the map" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('lat') border-red-500 @enderror" value="{{ old('lat') }}">

                @error('lat')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="lng">Longitude</label>
                <input  name="lng" id="lng" readonly value="{{$event->lng}}" placeholder="Place a marker on the map" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('lng') border-red-500 @enderror" value="">

                @error('lng')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Edit</button>
            </div>
        </form>
    </div>

    <div style="width: 500px; height: 500px;">
	{!! Mapper::render() !!}
</div>

  
    </div>

    
</div>
@endsection