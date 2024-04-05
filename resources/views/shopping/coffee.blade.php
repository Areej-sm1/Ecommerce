@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
       <div class="col">
        @foreach($data as $items)
           <div class="card">
               <div class="card-body">
                   <div class="row">
                       <div class="col-sm-3">
                        <img src="{{$items->image}}" width="300" height="250">
                       </div>
                       <div class="col-sm-6">
                           <h4 class="alert alert-warning">{{$items->title}}</h4>
                           <ul class="list-unstyled">
                               <li class="p-2" style="font-size: medium;">{{$items->description}}</li>
                           </ul>
                       </div>
                      
                       
                   </div>
               </div>
           </div>
           @endforeach
       </div>
    </div>
  </div>


@endsection

