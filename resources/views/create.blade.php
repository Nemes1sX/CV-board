@extends('layouts.layout')

@section('content')
<h1>Patalpinti savo CV </h1>
<div class="card uper">
  <div class="card-header">
    Patalpinti savo CV
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
      <form method="post" action="{{ route('store.cv') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="fullname">Vardas Pavardė</label>
              <input type="text" class="form-control" name="fullname"/>
          </div>
          <div class="form-group">
              <label for="email">El. paštas</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="job">Darbo sritis</label>
              <select name="job" class="form-control">
                <option value="backend">Back-end programuotojas</option>
                <option value="frontend">Front-end programuotojas</option>
                <option value="itengineer">IT inižinierius</option>
              </select> 
          </div>
          <div class="form-group">
              <label for="file">CV failas</label>
              <input type="file" name="cv" class="form-control"/>
          </div>
          <button type="submit" class="btn btn-primary">Įkelti</button>
      </form>
  </div>
</div>
@endsection
