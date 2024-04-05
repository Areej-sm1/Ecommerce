@extends('layouts.base')

@section('content')

<div class="container">
    <div class="row mt-5">
    <div class="col">
        <!-- Button trigger modal  {{Session::get('data')}}-->
       
        <br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add new Product Details
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
                <form action="{{ route('create-det') }}" method="post">
                    @csrf
                    <div class="row m-2">
                        <select class="form-select" name="product" id="product">
                            @foreach($products as $items)
                            <option value="{{ $items->id }}">{{ $items->productname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>color</label>
                            <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color">
                            @error('color')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label>price</label>
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">
                            @error('price')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>quantity</label>
                            <input type="text" class="form-control" name="qty">
                        </div>
                        <div class="col">
                            <label>description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

    </div>
    </div>

    <div class="row mt-5 ">
        <div class="col-6">
            <form action="" method="post" class="d-flex">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="name"> <!-- Adjust the max-width value as needed -->
                    <button class="btn btn-primary" disabled>Search</button>
                </div>
            </div>
            <div class="col-3">
                <a href="{{ route('productdet') }}" class="btn btn-primary"> <small>Show All</small> </a>
            </div>
            </form>
        </div>
   
    <div class="row mt-5 text-dark">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>product name</th>
                                    <th>color</th>
                                    <th>price</th>
                                    <th>quantity</th>
                                    <th>description</th>
                                    <th>image</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $items)
                                <tr>
                                    <td>{{$items->id}}</td>
                                    <td>{{$items->productname}}</td>
                                    <td>{{$items->color}}</td>
                                    <td>{{$items->price}} SAR</td>
                                    <td>{{$items->qty}}</td>
                                    <td>{{$items->description}}</td>
                                    <td>
                                        <a class="link-opacity-100" data-bs-toggle="modal" data-bs-target="#exampleModal2-{{$items->id}}">
                                            Image
                                        </a>
                                        <!-- Modal 2 -->
                                        <div class="modal fade" id="exampleModal2-{{$items->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2-{{$items->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel2-{{$items->id}}">image of {{$items->productname}}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="/assest/images/{{$items->images}}" alt="non" width="300" height="300">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="{{route('delDetails',['id'=>$items->id])}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                                    <td><a href="{{route('edit',['id'=>$items->id])}}"><i class="fa fa-edit text-success" aria-hidden="true"></i></a></td>
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

@endsection

