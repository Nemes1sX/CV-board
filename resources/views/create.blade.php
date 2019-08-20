@extends('layout.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cv.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">Vardas Pavardė</label>
              <input type="text" class="form-control" name="fullname"/>
          </div>
          <div class="form-group">
              <label for="price">El. paštas</label>
              <input type="text" class="form-control" name="region"/>
          </div>
          <div class="form-group">
              <label for="job">Darbo sritis</label>
              <select name="job" class="form-control">
                <option value="back-end">Back-end programuotojas</option>
                <option value="front-end">Front-end programuotojas</option>
                <option value="itengineer">IT inižinierius</option>
              </select> 
          </div>
          <div class="form-group">
              <label for="price">CV failas</label>
              <input type="file" name="cv" class="form-control"/>
          </div>
          <button type="submit" class="btn btn-primary">Įkelti</button>
      </form>
  </div>
</div>
@endsection
