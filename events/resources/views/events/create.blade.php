@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg flex justify-between">
        <div class="w-5/12">
        <form action="{{ route('create')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Event name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location">Location</label>
            
                <select type="text" name="location" id="location" placeholder="Location" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('location') border-red-500 @enderror" value="{{ old('location') }}">
                @foreach($locations as $location)
                <option value="{{ $location->id }}">{{$location->name}}</option>
                @endforeach
                </select>
                
                @error('location')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email">Latitude</label>
                <input  name="latitude" id="latitude" readonly placeholder="Place a marker on the map" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('latitude') border-red-500 @enderror" value="{{ old('latitude') }}">

                @error('latitude')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="longitude">Longitude</label>
                <input  name="longitude" id="longitude" readonly placeholder="Place a marker on the map" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('longitude') border-red-500 @enderror" value="">

                @error('longitude')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add</button>
            </div>
        </form>
    </div>

    <div style="width: 500px; height: 500px;">
	{!! Mapper::render() !!}
</div>

  
    </div>

    
</div>
@endsection