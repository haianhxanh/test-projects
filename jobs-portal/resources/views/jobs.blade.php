@extends('main')
@include('menu')
@section('title', 'Career at Ataccama')
@section('content')

<div class="career-body">
  <div class="career-content">
    <div class="career-content__img">
      <img src="{{ asset('images/work-4653983.jpg') }}" alt="work with us">
      <div class="career-content__heading"><h1>Join our team</h1>
      <h4><a href="https://www.facebook.com/Ataccama/">#NotYourAverageJob</a></h4>
      </div>
    </div>
  </div>

      
    <div class="career-posting">
      @foreach($jobs as $j)
    
      @if ($j->is_active == 1)
      <a href={{ action('JobController@show', $j->id) }}>
        <div class="career-posting-wrapper"><h2 class="job-title">{{ $j->title }}</h2></div>
      </a>
    
      @else
       <a href={{ action('JobController@show', $j->id) }}>
         <div class="career-posting-wrapper">
            <h2 class="job-title">{{ $j->title }}</h2>
            <p>This job is currently unavailable</p>
         </div>
       </a>
        
      @endif
    
      @endforeach
    </div>
</div>

@endsection

