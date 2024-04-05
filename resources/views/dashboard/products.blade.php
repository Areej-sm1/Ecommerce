@extends('layouts.base')

@section('content')
<div class="container"> 
<div class="row mt-5">
    <div class="col">
        <!-- Button trigger modal         {{Session::get('data')}}-->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add new product
    </button>
    
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-success" id="exampleModalLabel"> Add new product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('createproduct')}}" method="post">
                @csrf
            <label>product name</label>
            <input type="text" class="form-control" name="productname">
            <button type="submit" class="btn btn-primary mt-3">Save</button>
            <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cansel</button>
        </form>
        </div>
       
      </div>
    </div>
  </div>
    </div>
    </div>
    <div class="row mt-5 ">
        <div class="col-6">
            <form action="{{ route('search') }}" method="post" class="d-flex">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="name"> <!-- Adjust the max-width value as needed -->
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
            <div class="col-3">
                <a href="{{ route('products') }}" class="btn btn-primary"> <small>Show All</small> </a>
            </div>
            </form>
        </div>
   
    
    <div class="row mt-4 text-dark">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $items)
                                <tr>
                                    <td>{{$items->id}}</td>
                                    <td>{{$items->productname}}</td>
                                    <td><a href="{{route('del',['id'=>$items['id']])}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                                    <td><a href="{{route('edit',['id'=>$items['id']])}}"><i class="fa fa-edit text-success" aria-hidden="true"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    function setvalue(id,name){
        alert(name);
    }
</script>
@endsection