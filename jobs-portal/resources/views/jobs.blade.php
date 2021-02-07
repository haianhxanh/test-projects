@extends('main')
@include('menu')
@section('content')
    
  @foreach($jobs as $j)

  @if ($j->is_active == 1)
    <h2 class="job-title"><a href={{ action('JobController@show', $j->id) }}>{{ $j->title }}</a></h2>

  @else
    <h2 class="job-title"><a href={{ action('JobController@show', $j->id) }}>{{ $j->title }}</a></h2>
    <p>This job is currently unavailable</p>
    
  @endif

  @endforeach
@endsection

