<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        h2{
            text-align: center;
            display: block;
        }
        small{
            text-align: center;
            display: block;
        }
	</style>

    <div>
        <h2>Laporan pengaduan</h2>
        <small>{{Date::now()->isoFormat('dddd, D MMMM Y H:MM')}}</small>
    </div>


	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
				<th>Isi laporan</th>
				<th>Nama pelapor</th>
				<th>Status</th>
				<th>Tanggal dibuat</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($pengaduan as $item)
			<tr>
                @if($item->tanggapan)
                    <td rowspan="2">{{ $i++ }}</td>
                @else
                    <td>{{ $i++ }}</td>
                @endif
				<td>{{$item->isi_laporan}}</td>
				<td>{{$item->user->nama}}</td>
				<td>{{$item->status}}</td>
				<td>{{$item->created_at->isoFormat('dddd, D MMMM Y H:MM')}}</td>
			</tr>

                @isset($item->tanggapan)
                <tr>
                    <td >Tanggapan :</td>
                    <td colspan="3">{{$item->tanggapan->tanggapan}}</td>
                </tr>
                @endisset
			@endforeach
		</tbody>
	</table>

</body>
</html>
