@if(Session::has('successful_application'))
  <div>
    {{ Session::get('successful_application') }}
    <a href="/jobs">Home</a>
  </div>
@endif