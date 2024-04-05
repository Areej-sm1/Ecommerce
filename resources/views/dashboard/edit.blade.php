@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="card mt-5">
        <div class="card-body bg-white">
            <form action="{{route('update')}}" method="post">
                @csrf
                <div class="row mt-3 text-center">
                <input type="hidden" name="id" value="{{$products['id']}}">  
                <div class="col">
                    <label for="productname" class="text-center mx-5" >Product Name </label>
                    <input type="text" name="productname" class="form-control p-1 mt-3" value="{{$products['productname']}}">
                </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-center">
                        <button class="btn btn-success mb-5">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>   


</div>
@endsection
