@extends('main')
@include('menu')
@section('title', 'Jobs at Ataccama')
@section('content')
    <div class="jobs-details-body">
<div class="jobs-details-content">
    @if ($job->is_active == 1)
    
      <h4>We are looking for</h4>
      <h1>{{ $job->title }}</h1>
      <div><p>{!! $job->content !!}</></div>
      <div><h2>Location</h2>{{ $job->location }}</div>
        
          
      <h3>Application form</h3>
      <form class="form" method="post" 
      action="{{ action('JobController@store') }}" 
      enctype="multipart/form-data" id="form">
    
        @csrf
        <input type="hidden" name="job_position_id" value="{{ $job->id }}">
    
       <div class="form-group">
          <label for="first_name">first name</label>
          <input class="first_name form-control" type="text" name="first_name" value="{{ old('first_name') }}">
          @error('first_name')  
          <div class="error-msg">{{ $message }}</div>
          @enderror
       </div>
    
        <div class="form-group">
          <label for="last_name">last name</label>
          <input class="last_name form-control" type="text" name="last_name" value="{{ old('last_name') }}">
                @error('last_name')  
          <div class="error-msg">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="form-group">
          <label for="email">email</label>
          <input class="email form-control" type="email" name="email" value="{{ old('email') }}">
                @error('email')  
          <div class="error-msg">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="form-group">
          <label for="phone">phone</label>
          <input class="phone form-control" type="text" name="phone" value="{{ old('phone') }}">
                @error('phone')  
          <div class="error-msg">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="form-group">
          <label for="linkedin">linkedin</label>
          <input class="linkedin form-control" type="text" name="linkedin" value="{{ old('linkedin') }}">
        </div>
    
        <div class="form-group">
          <label for="why_you">why do you think you are the perfect match for Ataccama?</label>
          <textarea rows="5" class="why_you form-control" type="textarea" name="why_you" value="{{ old('why_you') }}"></textarea>
        </div>
    
        <div class="form-group">
          <label for="location">select location you are applying for</label>
          <select class="location form-control" name="location">
            <option value="Prague">Prague</option>
            <option value="Toronto">Toronto</option>
            <option value="Sophia">Sophia</option>
          </select>
        </div>
    
       <div class="form-group">
          <div class="dropzone dz-clickable">
            <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
              <p>send us your resume and cover letter</p>
              <label for="files" class="file-button form-control">Select files</label>
              <input type="file" name="files[]" multiple="true" id="files" style="display:none" onchange="displayFileName()">
                @error('files')  
                <div class="error-msg">{{ $message }}</div>
                @enderror
              <div id="file-name"></div>
            </div>
          </div>
       </div>
    
        <div class="submit-btn"><button type="submit">submit</button></div>
      
      </form>
    
      @else 
    
      We are sorry but this job is currently not available. 
    
      <h1>{{ $job->title }}</h1>
      <div>{!! $job->content !!}</div>
      <div>{{ $job->location }}</div>
    
      @endif
</div>
</div>
  <script>
  //   let files = document.querySelectorAll("#files");
  //   files.onchange = function(){
  //     for(i=0; i<files.length; i++) {
  //           document.querySelector("#file-name").textContent = this.files[i].name;
  //     }
  // }

  displayFileName = function() {
    let input = document.getElementById('files');
    let output = document.getElementById('file-name');
    let children = "";
    for(let i = 0; i < input.files.length; ++i) {
      children += '<li>' + input.files.item(i).name + '</li>'
    }
    output.innerHTML = '<ul>' + children + '</ul>'
  }
  </script>
@endsection





