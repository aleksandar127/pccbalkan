
<form>
    <select name="godina" id="godina">
  <option>Izaberi godinu</option>
  @foreach(range(1900, strftime("%Y", time())) as $year) :
    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
  @endforeach
</select><br>
    Naziv obuke:<input type="text"/>
    Tip obuke:<select name="tip_obuke">
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
    Resursi:<input type="text"/><br>
    Realizovano broj zaposlenih:<select name="broj_zaposlenih_realizovan">
   @foreach(range(1,20) as $num):
    <option>{{$num}}</option>
@endforeach
    </select>
    Ocena:<select name="ocena">
   @foreach(range(1,5) as $num):
    <option>{{$num}}</option>
@endforeach
    </select>
<table>
    <thead>
        <td>Naziv</td>
        <td>Vrsta</td>
        <td>Broj zaposlenih</td>
        <td>Termin</td>
        <td>Mesto</td>
        <td>Resursi</td>
         <td>Realizovano
             <ul>
                 <li>Broj zaposlenih : 5</li>
                 <li>Ocena: 4</li>

             </ul>
         </td>

    </thead>
</table>

</form>

<script>
    const godina=document.getElementById('godina');
    godina.addEventListener('keyup', ajax);


  function ajax(){
    const xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
      // document.getElementById("demo").innerHTML = xhttp.responseText;
      alert(xhttp.responseText);
    }
};
xhttp.open("GET", {{ route('lista', ['date' => 5]) }}, true);
xhttp.send();
  }
</script>
