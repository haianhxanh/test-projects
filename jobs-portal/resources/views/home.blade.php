@extends('main')
@include('menu')
@section('title', 'Ataccama - Home')
@section('content')
  <div class="home-body">
    <p class="centered-text">We are a growing, international software company developing an AI-powered platform to help our customers process, manage, and monitor (big) data.</p>

    <div class="home-content">
      <a href="/about">
      <div class="home-content__img"><img src="{{ asset('images/workplace-2722098.jpg') }}" alt="workplace"></div>
      <h1 class="home-content__heading">Together at Ataccama</h1>
    </div>
    </a>
  </div>
@endsection