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
                        <img src="/assest/images/{{$items->images}}" width="300" height="250">
                       </div>
                       <div class="col-sm-6">
                           <h4 class="alert alert-light">{{$items->productname}}</h4>
                           <ul class="list-unstyled">
                               <li class="badge bg-danger p-2" style="font-size: medium;">{{$items->description}}</li>
                               <li class="p-2"> <h4>Color: {{$items->color}}</h4> </li>
                           </ul>
                       </div>
                       <div class="col-sm-3">
                           <ul class="list-unstyled p-2">
                               <li class="badge bg-success " style="font-size: medium;"> {{$items->price}} SAR</li>
                               <br/><br/>
                               <li class=""> <span>Tax : {{$items->tax}} %</span> </li>
                               <li class=""> <span>Descount : {{$items->desc}} SAR</span> </li>
                               <li class=""> <small>Total: {{$items->total}} SAR</small> </li>
                               <br/>
                               <li class=""> Net:{{$items->net}} </li>
                           </ul>
                           <div class="row">
                               <div class="col">
                                   <a href="{{route('details', ['id'=>$items->id])}}" class="btn btn-outline-secondary">Show Details</a>
                               </div>
                           </div>
                       </div>
                       
                   </div>
               </div>
           </div>
           @endforeach
       </div>
    </div>
  </div>

</div>

@endsection

