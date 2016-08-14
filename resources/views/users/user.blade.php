@extends('layouts.master')
@section('title')
{{ $user->username }} | MonogaTest
@endsection

@section('content')
    @include('partials.app-nav')
    <div class="container section">
      <section class="col-md-9">

        <h1>{{$user->first_name}} {{$user->last_name}} <small>({{$user->username}})</small></h1>
        <section class="user-info-container">
            <img src="" alt="">
            <article class="bio">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta voluptatum cupiditate non minima, sed dolorum illum eveniet aliquam, maiores incidunt porro, quasi veniam earum saepe! Exercitationem, a quasi vitae placeat.
            </article>
            <a href="" class="pull-right btn btn-info"><i class="fa fa-edit"></i> Edit</a>
        </section>
        <section class="test-by-user">
            <h1>Tests By {{ $user->username }}</h1>
            <div class="row tests-container">
                <div class="col-md-3">
                    <div class="monogatest-card-small">
                        <img src="" alt="">
                        <h3 class="title"></h3>
                        <span class="test-author"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="monogatest-card-small">
                        <img src="" alt="">
                        <h3 class="title"></h3>
                        <span class="test-author"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="monogatest-card-small">
                        <img src="" alt="">
                        <h3 class="title"></h3>
                        <span class="test-author"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="monogatest-card-small">
                        <img src="" alt="">
                        <h3 class="title"></h3>
                        <span class="test-author"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12"><a href="" class="btn btn-monogatest"></a></div>
        </section>

        <section class="test-by-user">
            <h1>Recently {{$user->username}} took the following tests</h1>
            <div class="row tests-container">
                <div class="col-md-3">
                    <div class="monogatest-card-small">
                        <img src="" alt="">
                        <h3 class="title"></h3>
                        <span class="test-author"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="monogatest-card-small">
                        <img src="" alt="">
                        <h3 class="title"></h3>
                        <span class="test-author"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="monogatest-card-small">
                        <img src="" alt="">
                        <h3 class="title"></h3>
                        <span class="test-author"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="monogatest-card-small">
                        <img src="" alt="">
                        <h3 class="title"></h3>
                        <span class="test-author"></span>
                    </div>
                </div>
            </div>
        </section>

      </section>
      @include('partials.sidebar')
    </div>
     @include('partials.home-footer')
@endsection