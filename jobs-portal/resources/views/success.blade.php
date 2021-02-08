@extends('main')
@section('content')
  @if(Session::has('successful_application'))
  <div class="success-body">
    <div class="success-content__msg">{{ Session::get('successful_application') }}</div>
    
    <div>
      Back to <a href="/"><b>Home</b></a>
    </div>
  </div>

@endif
@endsection
