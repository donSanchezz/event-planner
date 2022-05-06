@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@section('content')
{!! Toastr::message() !!}
<div class="flex justify-center">

    <div class="w-10/12 bg-white p-6 rounded-lg">

        <div class="flex justify-between">
            <h1 class="font-bold">Events</h1>

            
     @if(auth()->user())
            <a href="{{route('create')}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create Event</a>
       @endif
        </div>
  

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-900 dark:text-white">
    <thead class="text-base text-gray-900 dark:text-white uppercase bg-gray-100 dark:bg-gray-700 font-bold">
    <tr>
    <th scope="col" class="px-6 py-3">
    Name
    </th>
    </th>
    <th scope="col" class="px-6 py-3">
    Location
    </th>
    <th scope="col" class="px-6 py-3">
    Author
    </th>
    <th scope="col" class="px-6 py-3">
    Created
    </th>
    <th scope="col" class="px-6 py-3">
    Updated
    </th>
    <th scope="col" class="px-6 py-3">
    <span class="sr-only">Edit</span>
    </th>
    </tr>
    </thead>
    <tbody>
        @if($events->count())
            @foreach($events as $event)

    <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
    {{$event->name}}
    </th>
    <td class="px-6 py-4">
    {{$event->location->name}}
    </td>
    <td class="px-6 py-4">
        {{$event->user->name}}
    </td>
    <td class="px-6 py-4">
    {{$event->createdAt->diffForHumans()}}
    </td>
    <td class="px-6 py-4">
    {{$event->updatedAt->diffForHumans()}}
    </td>
    <td class="px-6 py-4 text-right">

     @if(auth()->user())

    <a href="{{ route('show', ['event' => $event]) }}"><i class="fa-solid fa-eye fa-lg text-green-500 mr-5"></i></i></a>
    <a href="{{ route('edit', ['event' => $event]) }}"><i class="fa-solid fa-pen-to-square fa-lg text-blue-500"></i></a>

    <form action="{{ route('delete', ['event' => $event]) }}" method="post" class="p-3 inline">
        @csrf
        @method('DELETE')
        <button type="submit"><i class="fa-solid fa-trash fa-lg text-red-500"></i></button>
    </form>
    @endif
    
    </td>
    </tr>
            @endforeach
         
         @else
         <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
            <p>There are no events</p>
            </th>
        @endif
    </tbody>
    </table>
    </div>
    <div class="mt-2 flex justify-end">
    {{$events->links()}}
</div>



</div>
@endsection