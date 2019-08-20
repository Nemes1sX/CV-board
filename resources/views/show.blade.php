<div class="card">
  <div class="card-header">
    {{$cv->fullname}}
  </div>
  <div class="card-body">
    <h5 class="card-title">Vardas Pavardė: {{ $cv->fullname}}</h5>
    <p class="card-text">El. paštas: {{$cv->email}}</p>
    <p class="card-text">Darbo sritis: @if($record->job == 'frontend')
                Front-end programuotojas
                @elseif ($record->job == 'backend')
                Back-end programuotojas
                @else
                IT inžinierius
                @endif </p>
    <p class="card-text">Paskelbimo data: {{$cv->created_at}}</p>
    <a href="{{url ('/')}}" class="btn btn-primary">Grįžti</a>
  </div>
</div>
@endsect