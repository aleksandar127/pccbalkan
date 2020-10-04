@extends('welcome')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success">

    {{Session::get('message')}}

</div>
@endif
<div class="row">
    <div class="col-3">
        <form id="forma_obuka" action="{{ route('store') }}" method="POST">
            {{ csrf_field() }}

            Naziv obuke: <input type="text" name="naziv_obuke" id="naziv_obuke" value="{{old('naziv_obuke')}}" required />
    </div>
    <div class="col-3">
        Tip obuke: <select name="vrsta_obuke" id="vrsta_obuke" required>
            <option>{{old('vrsta_obuke')}}</option>
            <option value="interna">Interna</option>
            <option value="eksterna">Eksterna</option>
        </select>
    </div>


    <div class="col-3">
        Broj zaposlenih: <select name="broj_zaposlenih" id="broj_zaposlenih" required>
            <option>{{old('broj_zaposlenih')}}
            </option>
            @foreach(range(1,50) as $num)
            <option>{{$num}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-3">
        Planirani termin: <input type="datetime-local" name="termin" id="termin" value="{{old('termin')}}" required />
    </div>
</div>
<div class="row">
    <div class="col-3">
        Mesto obuke: <input type="text" name="mesto_odrzavanja_obuke" id="mesto_odrzavanja_obuke" value="{{old('mesto_odrzavanja_obuke')}}" required />
    </div>


    <div class="col-3">
        Resursi: <input type="text" name="potrebni_resursi" id="potrebni_resursi" value="{{old('potrebni_resursi')}}" required />
    </div>
    <div class="col-2">
        Realizovano broj zaposlenih: <select name="realizovano_broj_zaposlenih" id="realizovano_broj_zaposlenih" value="{{old('realizovano_broj_zaposlenih')}}">
            <option>{{old('realizovano_broj_zaposlenih')}}
            </option>
            @foreach(range(1,50) as $num):
            <option>{{$num}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        Ocena: <select name="ocena" id="ocena">
            <option>{{old('ocena')}}
            </option>
            @foreach(range(1,5) as $num):
            <option>{{$num}}</option>
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

<div id="tabela">
    <div class="row">
        <div class="col-2">
            <form id="forma_godina">
                {{ csrf_field() }}
                <select name="godina" id="godina">
                    <option>Izaberi godinu</option>
                    @foreach(range(2015, strftime("%Y", time())+1) as $year) :
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <table id="table">
        <thead>
            <th colspan="6">Obuka</th>

            <th colspan="2">Realizovano</th>
            <th colspan="2">Akcije</th>
            <tr>
                <th>Naziv</th>
                <th>Vrsta</th>
                <th>Broj zaposlenih</th>
                <th>Termin</th>
                <th>Mesto</th>
                <th>Resursi</th>
                <th>broj zaposlenih re</th>
                <th>ocena</th>
                <th>Izmeni</th>
                <th>Obrisi</th>
            </tr>
        </thead>
        <tbody>

            @foreach($lista as $obuka)
            <tr>
                <td>{{$obuka->naziv_obuke}}</td>
                <td>{{$obuka->vrsta_obuke}}</td>
                <td>{{$obuka->broj_zaposlenih}}</td>
                <td>{{$obuka->termin}}</td>
                <td>{{$obuka->mesto_odrzavanja_obuke}}</td>
                <td>{{$obuka->potrebni_resursi}}</td>
                <td>{{$obuka->realizovano_broj_zaposlenih ?? 'nerealizovano'}}</td>
                <td>{{$obuka->ocena ?? 'nerealizovano'}}</td>
                <td>
                    <form action="{{ route('edit', ['id'=>$obuka->id]) }}" method="get">


                        <button type="submit">Izmeni</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('delete', ['id'=>$obuka->id]) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit">Izbrisi</button>
                    </form>
                </td>
            <tr>
                @endforeach
        </tbody>
    </table>
</div>


<script>
    const godina = document.getElementById("godina");
    godina.addEventListener("change", getMessage);

    function getMessage() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        const url = "<?php echo route('ajax'); ?>";
        $.ajax({
            type: "GET",
            url: url + "?date=" + godina.value,

            success: function(data) {
                const tableBody = document.querySelector("table tbody");
                tableBody.innerHTML = "";
                const list = JSON.parse(data);
                for (obj in list) {
                    let tr = document.createElement("tr");

                    let td = document.createElement("td");
                    td.textContent = list[obj]["naziv_obuke"];
                    tr.append(td);
                    let td1 = document.createElement("td");
                    td1.textContent = list[obj]["vrsta_obuke"];
                    tr.append(td1);
                    let td2 = document.createElement("td");
                    td2.textContent = list[obj]["broj_zaposlenih"];
                    tr.append(td2);
                    let td3 = document.createElement("td");
                    td3.textContent = list[obj]["termin"];
                    tr.append(td3);
                    let td4 = document.createElement("td");
                    td4.textContent = list[obj]["mesto_odrzavanja_obuke"];
                    tr.append(td4);
                    let td5 = document.createElement("td");
                    td5.textContent = list[obj]["potrebni_resursi"];
                    tr.append(td5);
                    let td6 = document.createElement("td");
                    td6.textContent = list[obj]["realizovano_broj_zaposlenih"] ?
                        list[obj]["realizovano_broj_zaposlenih"] :
                        "nerealizovano";
                    tr.append(td6);
                    let td7 = document.createElement("td");
                    td7.textContent = list[obj]["ocena"] ?
                        list[obj]["ocena"] :
                        "nerealizovano";
                    tr.append(td7);
                    let td8 = document.createElement("td");
                    td8.innerHTML = `
                <form action="{{ route('edit', ['id'=>$obuka->id??' ']) }}" method="get">
                <button type="submit">Izmeni</button><?php echo csrf_field() ?>
                </form>`;
                    tr.append(td8);
                    let td9 = document.createElement("td");
                    td9.innerHTML = `
                <form action="<?php echo route('delete', ['id' => $obuka->id ?? ' ']) ?>" method="POST">
                <?php echo  method_field('DELETE') ?>
                <?php echo csrf_field() ?>
                <button type="submit">Izbrisi</button>
            </form>`;
                    tr.append(td9);
                    tableBody.append(tr);
                }
            },
        });
    }
</script>



@endsection