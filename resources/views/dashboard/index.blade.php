@extends('layouts.base')

@section('content')

<h1>Hello from Dashboard</h1>
{{Session::get('data')}}

<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">  <i class="bi bi-receipt text-success"></i></h1>
                    <h3 class="text-center">Invoice</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">  <i class="bi bi-people-fill"></i></h1>
                    <h3 class="text-center">Customer</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">  <i class="bi bi-receipt text-success"></i></h1>
                    <h3 class="text-center">Customer</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">  <i class="bi bi-receipt text-success"></i></h1>
                    <h3 class="text-center">Customer</h3>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>


@endsection