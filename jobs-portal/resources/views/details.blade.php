<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

@include('menu')

@if ($job->is_active == 1)

  <h4>We are looking for</h4>
  <h1>{{ $job->title }}</h1>
  <div>{!! $job->content !!}</div>
  <div>{{ $job->location }}</div>

  <form class="form" method="post" 
  action="{{ action('JobController@store') }}" 
  >
    <h3>Application form</h3>
    @csrf
    <input type="hidden" name="job_position_id" value="{{ $job->id }}">

   <div>
      <label for="first_name">first name</label>
      <input class="first_name" type="text" name="first_name">
      @error('first_name')  
      {{ $message }}
      @enderror
   </div>

    <div>
      <label for="last_name">last name</label>
      <input type="text" name="last_name">
    </div>

    <div>
      <label for="email">email</label>
      <input type="email" name="email">
    </div>

    <div>
      <label for="phone">phone</label>
      <input type="text" name="phone">
    </div>

    <div>
      <label for="linkedin">linkedin</label>
      <input type="text" name="linkedin">
    </div>

    <div>
      <label for="why_you">why do you think you are the perfect match for Ataccama?</label>
      <input type="text" name="why_you">
    </div>

    <div>
      <label for="location">select location you are applying for</label>
      <select name="location">
        <option value="Prague">Prague</option>
        <option value="Toronto">Toronto</option>
        <option value="Sophia">Sophia</option>
      </select>
    </div>


    <button type="submit">submit</button>
  
  </form>

  @else 

  We are sorry but this job is currently not available. 

  <h1>{{ $job->title }}</h1>
  <div>{!! $job->content !!}</div>
  <div>{{ $job->location }}</div>

  @endif


</body>
</html>
