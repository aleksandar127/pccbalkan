<form id="forma_godina">
    <select name="godina" id="godina">
        <option>Izaberi godinu</option>
        @foreach(range(1900, strftime("%Y", time())) as $year) :
        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
        @endforeach
    </select></form><br>
<form id="forma_obuka">
    Naziv obuke:<input type="text" />
    Tip obuke:<select name="tip_obuke">
        <option value="interna" selected>Interna</option>
        <option value="eksterna">Eksterna</option>
    </select>
    Broj zaposlenih:<select name="broj_zaposlenih">
        @foreach(range(1,20) as $num):
        <option>{{$num}}</option>
        @endforeach
    </select>
    Planirani termin:<input type="datetime-local" />
    Mesto obuke:<input type="text" />
    Resursi:<input type="text" /><br>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    const godina = document.getElementById('godina');
    godina.addEventListener('change', getMessage);


    function getMessage() {
        $.ajax({
            type: 'GET',
            url: '<?php echo route('lista', ['date' => 1]) ?>',

            success: function(data) {
                // $("#msg").html(data.msg);
                alert(data);
            }
        });
    }
</script>