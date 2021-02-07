@extends('main')
@include('menu')

@section('content')
    <div>
  @if ($job->is_active == 1)
  
    <h4>We are looking for</h4>
    <h1>{{ $job->title }}</h1>
    <div>{!! $job->content !!}</div>
    <div>{{ $job->location }}</div>
  
    <form class="demoform dropzone" method="post" 
    action="{{ action('JobController@store') }}" 
    enctype="multipart/form-data" id="form">
      <h3>Application form</h3>
      @csrf
      <input type="hidden" name="job_position_id" value="{{ $job->id }}">
  
     <div class="form-group">
        <label for="first_name">first name</label>
        <input class="first_name form-control" type="text" name="first_name" value="{{ old('first_name') }}">
        @error('first_name')  
        <div>{{ $message }}</div>
        @enderror
     </div>
  
      <div class="form-group">
        <label for="last_name">last name</label>
        <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}">
              @error('last_name')  
        <div>{{ $message }}</div>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="email">email</label>
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
              @error('email')  
        <div>{{ $message }}</div>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="phone">phone</label>
        <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
              @error('phone')  
        <div>{{ $message }}</div>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="linkedin">linkedin</label>
        <input class="form-control" type="text" name="linkedin" value="{{ old('linkedin') }}">
      </div>
  
      <div class="form-group">
        <label for="why_you">why do you think you are the perfect match for Ataccama?</label>
        <input class="form-control" type="text" name="why_you" value="{{ old('why_you') }}">
      </div>
  
      <div class="form-group">
        <label for="location">select location you are applying for</label>
        <select class="form-control" name="location">
          <option value="Prague">Prague</option>
          <option value="Toronto">Toronto</option>
          <option value="Sophia">Sophia</option>
        </select>
      </div>
  
     <div class="form-group">
        <div class="dropzone dz-clickable">
          <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
            <label for="files" class="file-button">Select files</label>
            <input type="file" name="files[]" multiple="true" id="files" style="display:none" onchange="displayFileName()">
            <div id="file-name"></div>
              @error('files')  
              <div>{{ $message }}</div>
              @enderror
          </div>
          <div class="dropzone-previews"></div>
        </div>
     </div>
  
  
      <button type="submit">submit</button>
    
    </form>
  
    @else 
  
    We are sorry but this job is currently not available. 
  
    <h1>{{ $job->title }}</h1>
    <div>{!! $job->content !!}</div>
    <div>{{ $job->location }}</div>
  
    @endif
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





