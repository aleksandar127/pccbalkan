
<form>
    Naziv obuke:<input type="text"/>
    Tip obuke:<select>
        <option value="interna" selected>Interna</option>
        <option value="eksterna">Eksterna</option>
    </select>
    Broj zaposlenih:<select name="broj_zaposlenih">
   @foreach(range(1,20) as $num):
    <option>{{$num}}</option>
@endforeach
    </select>
    Planirani termin:<input type="datetime-local"/>
    Mesto obuke:<input type="text"/>
    Resursi:<input type="text"/>
    Realizovano broj zaposlenih:<select name="broj_zaposlenih_r">
   @foreach(range(1,20) as $num):
    <option>{{$num}}</option>
@endforeach
    </select>
    Ocena:<select name="ocena">
   @foreach(range(1,5) as $num):
    <option>{{$num}}</option>
@endforeach
    </select>

    @endcomponent
</form>
