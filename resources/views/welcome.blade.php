@extends('layouts.app')
@section('content')

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/assest/images/eidp.jpg" class="d-block w-100" alt="...">
            <a href="#section1" class="btn btn-lg d-grid gap-2 mb-5" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); background-color: rgb(186, 207, 238); padding: 20px 40px; font-size: 1.5rem;"> <h6 class='card-text'>تسوق الان </h6></a>
        </div>
    </div>
</div>


<div class="container" id="section1">
        </div>
        </div>
        <div class="row text-center d-flex justify-content-center mt-5">
             <div class="col-sm-3">
             <div class="card card-style">
                <img src="https://q8-press.com/wp-content/uploads/2023/12/23-12-29_19-47-23-850x478-1-780x470.webp" class="card-img-top" alt="non">
                <div class="card-body">
                <a href="{{route('ShowListitemsPhone')}}"  class="btn btn-lg d-grid gap-2" style="background-color: rgb(186, 207, 238);">  <h6 class='card-text'>الاجهزة الذكية </h6></a>
                </div>
            </div>
              </a>
             </div>
            
            
         
             <div class="col-sm-3">
             <div class="card card-style">
                <img src="https://assets.annahar.com/ContentFilesArchive/766323Image1-1180x677_d.jpg?version=5841411" class="card-img-top" alt="non">
                <div class="card-body">
                <a href=""   class="btn btn-lg d-grid gap-2" style="background-color: rgb(186, 207, 238);">   <h6 class='card-text'> ادوات منزليه - قريبا </h6></a>
                </div>
            </div>
             </div>
             
        </div>

        <div class="row text-center d-flex justify-content-center mt-5">
        <div class="col-sm-3">
             <div class="card card-style">
                <img src="https://modo3.com/thumbs/fit630x300/109145/1595289131/أدوات_كهربائية_منزلية.jpg" class="card-img-top" alt="non" height="180">
                <div class="card-body">
                <a href=""   class="btn btn-lg d-grid gap-2" style="background-color: rgb(186, 207, 238);">  <h6 class='card-text'>ادوات كهربائيه -قريبا</h6></a>
                </div>
            </div>
             </div>

             <div class="col-sm-3">
             <div class="card card-style">
                <img src="https://www.albayan.ae/polopoly_fs/1.3546085.1556394686!/image/image.jpg" class="card-img-top" alt="non" >
                <div class="card-body">
                <a href=""   class="btn btn-lg d-grid gap-2" style="background-color: rgb(186, 207, 238);"> <h6 class='card-text'>ادوات النظافة -قريبا</h6></a>
                </div>
            </div>
             </div>

      
            
       </div>
    </div>
    <br/> <br/> <br/>


@endsection
