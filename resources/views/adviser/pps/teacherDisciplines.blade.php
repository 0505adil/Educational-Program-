<div class="razmer">
    <h3>Disciplines: </h3>
    <table border="1" class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Title(kz)</td>
                <td>Title(ru)</td>
                <td>Title(en)</td>
                <td>Credits</td>
                <td>Semestr</td>
                <td>Lectures</td>
                <td>Practices</td>
                <td >Labs</td>
            </tr>


        </thead>

        <tbody>
                <input type="text" value="{{ $i = 0 }}" hidden>
        @foreach($disciplines as $discipline)
                        <input type="text" value="{{ $i++ }}" hidden>
            <tr>
                <td>{{$i}}</td>

                <td>{{$discipline->title_kz}}</td>

                <td>{{$discipline->title_ru}}</td>

                <td>{{$discipline->title_en}}</td>

                <td>{{$discipline->credits}}</td>

                <td>{{$discipline->semestr}}</td>

                <td>{{$discipline->lectures}}</td>

                <td>{{$discipline->practises}}</td>

                <td>{{$discipline->labs}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
