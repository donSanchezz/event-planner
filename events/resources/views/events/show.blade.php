@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg flex justify-between">
        <div class="w-5/12">
            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" value="{{$event->name}}"   readonly class="bg-gray-100 border-2 w-full p-4 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="location">Location</label>
            
                <input type="text" value="{{$event->location->name}}" name="location" id="location" readonly class="bg-gray-100 border-2 w-full p-4 rounded-lg">
               
            </div>

            <div class="mb-4">
                <label for="location">Author</label>
            
                <input type="text" value="{{$event->user->name}}" name="author" id="author" readonly class="bg-gray-100 border-2 w-full p-4 rounded-lg">
               
            </div>

            <div class="mb-4">
                <label for="location">Created</label>
            
                <input type="text" value="{{$event->createdAt->diffForHumans()}}" name="created" id="created" readonly class="bg-gray-100 border-2 w-full p-4 rounded-lg">
               
            </div>

            <div class="mb-4">
                <label for="location">Updated</label>
            
                <input type="text" value="{{$event->updatedAt->diffForHumans()}}" name="updated" id="updated" readonly class="bg-gray-100 border-2 w-full p-4 rounded-lg">
               
            </div>
        </form>
    </div>

    <div style="width: 500px; height: 500px;">
	{!! Mapper::render() !!}
</div>

  
    </div>

    
</div>
@endsection