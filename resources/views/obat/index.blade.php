@extends ('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>DAFTAR OBAT
						<a href="{{route('obat.pdf')}}" class="btn btn-success pull- right" style="margin-top: -8px">TAMBAH </a>
						<a href="{{route('obat.pdf')}}"class="btn btn-primary pull- right" style="margin-top: -8px">PRINT</a>
						<br>
						</h4>
					
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Jenis</th>
								<th>Jumlah</th>
								<th>Deskripsi</th>
                                <th>Aksi</th>
								</th>
						</thead>
						<tbody>
							@foreach ($obat as $data)
							<tr>
								<td>{{++$no}}</td>
								<td>{{$data->nama }}</td>
								<td>{{$data->jenis}}</td>
								<td>{{$data->jumlah}}</td>
								<td>{{$data->diskripsi}}</td>
								<td>
									<form method="POST" action="{{route ('obat.destroy',$data->id) }}">
										{{csrf_field()}} {{method_field('DELETE')}}
										<a href="{{route('obat.edit',$data->id)}}" class="btn btn-primary">edit</a>
										<button type="submit" class="btn btn-danger">hapus</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>

					</table>
					{{$obat->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection