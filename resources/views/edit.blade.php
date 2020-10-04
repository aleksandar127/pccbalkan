@extends('welcome')
@section('content')
<div class="row">
    <div class="col-3">
        <form id="forma_obuka" action="{{ route('update',['id'=>$obuka->id]) }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            Naziv obuke: <input type="text" name="naziv_obuke" id="naziv_obuke" value="{{$obuka->naziv_obuke}}" />
    </div>
    <div class="col-3">
        Tip obuke: <select name="vrsta_obuke" id="vrsta_obuke" value="{{$obuka->vrsta_obuke}}">
            <option value="interna" {{$obuka->vrsta_obuke=="interna"?'selected':''}}>Interna</option>
            <option value="eksterna" {{$obuka->vrsta_obuke=="eksterna"?'selected':''}}>Eksterna</option>
        </select>
    </div>
    <div class="col-3">
        Broj zaposlenih: <select name="broj_zaposlenih" id="broj_zaposlenih">
            <option>
            </option>
            @foreach(range(1,50) as $num):
            <option {{$obuka->broj_zaposlenih==$num ?'selected':''}}>{{$num}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-3">
        Planirani termin: <input type="datetime-local" name="termin" id="termin" value="{{ date('Y-m-d\TH:i', strtotime($obuka->termin)) }}">
    </div>
</div>
<div class="row">
    <div class="col-3">
        Mesto obuke: <input type="text" name="mesto_odrzavanja_obuke" id="mesto_odrzavanja_obuke" value="{{$obuka->mesto_odrzavanja_obuke}}" />
    </div>
    <div class="col-3">
        Resursi: <input type="text" name="potrebni_resursi" id="potrebni_resursi" value="{{$obuka->potrebni_resursi}}" />
    </div>
    <div class="col-2">
        Realizovano broj zaposlenih: <select name="realizovano_broj_zaposlenih" id="realizovano_broj_zaposlenih">
            <option>
            </option>
            @foreach(range(1,50) as $num):
            <option {{$obuka->realizovano_broj_zaposlenih==$num ?'selected':''}}>{{$num}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        Ocena: <select name="ocena" id="ocena">
            <option>
            </option>
            @foreach(range(1,5) as $num):
            <option {{$obuka->ocena==$num ?'selected':''}}>{{$num}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        <button type="submit">Potvrdi</button>
        </form>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection