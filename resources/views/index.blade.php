@extends('layouts.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  
  <a href="{{ route('create.cv') }}"><button class="btn btn-success" type="submit">Sukurti CV</button></a>
  <br/>
  <div class="filter-form">
    <form method="get" action="{{route('filter.cv')}}">
    @csrf
    @method('GET')
        <div class="form-group">
              <label for="job">Darbo sritis</label>
              <select name="job" class="form-control">
                <option value="backend">Back-end programuotojas</option>
                <option value="frontend">Front-end programuotojas</option>
                <option value="itengineer">IT inižinierius</option>
              </select> 
          </div>
          <div class="form-group">
              <label for="job">Rodyti įrašų po</label>
              <select name="paging" class="form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
              </select>
          </div>    
          <button type="submit" class="btn btn-primary">Filtruoti</button>
    </form>
  </div>  
  <br/>
  <div class="record-table">
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Vardas Pavardė</td>
          <td>El. paštas</td>
          <td>Darbo sritis</td>
          <td>Paskelbimo data</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cv as $record)
        <tr>
            <td><a href="{{ route('show.cv', $record->id) }}">{{$record->fullname}}</a></td>
            <td><a href="mailto:{{$record->email}}">{{$record->email}}</a></td>
            <td>@if($record->job == 'frontend')
                Front-end programuotojas
                @elseif ($record->job == 'backend')
                Back-end programuotojas
                @else
                IT inžinierius
                @endif  </td>
            <td>{{$record->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
<div>
{{ $cv->links('index', ['cv' => $cv]) }}
@endsection
