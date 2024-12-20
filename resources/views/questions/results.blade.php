@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
  </div>
</nav>   
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto text-center" style="font-size:40px;">
                You are An {{$getData->name}}
            </div>
            <div id="quiz-container1" style="font-size:25px">
                {{$getData->description}}
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto text-center" style="font-size:40px;">
                <h3>Watch The Full Video Below</h3>
                <h3>To Know More About Who You Are?</h3>
            </div>
            <div id="quiz-container1" style="font-size:25px">
                <div class="d-flex justify-content-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/YOUR_VIDEO_ID" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-6 mx-auto text-center" style="font-size:40px;">
                <a class="btn btn-primary" href="{{ url('reports/know_more') }}">Know More!!</a>
            </div>
        </div>
    </div>
</section>
@endsection
