<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Normalisasi</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tbody>
                    <tr>
                            <td>{{$item->nama }}</td>
                            <td>{{$item->c1 / $c1max['produks']}}</td>
                            <td>{{$item->c2 / $c2max['produks']}}</td>
                            <td>{{$item->c3 / $c3max['produks']}}</td>
                            <td>{{$item->c4 / $c4max['produks']}}</td>
                            <td>{{$item->c5 / $c5max['produks']}}</td>
                     
                    </tr>
                </tbody>
                @endforeach
            </tbody>
        </table>
    </div>
</div>