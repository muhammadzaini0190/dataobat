@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>DATA OBAT</h1>
                <p>lorem120</p>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="" action="{{ route('obat.store') }}" method="post">
                            {{ csrf_field() }}

                            @if ($errors->any())
                            <div class="alert alert-danger"><ul>
                            @foreach ($errors->all() as $error )
                            <li> {{$error}}</li>
                            @endforeach
                            </ul></div>
                            @endif

                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="nama obat">
                            </div>

                            <div class="form-group">
                                <label for="">Jenis</label>
                                <input type="text" class="form-control" name="jenis" placeholder="jenis obat">
                            </div>

                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="text" class="form-control" name="jumlah" placeholder="jumlah obat">
                            </div>

                            <div class="form-group">
                                <label for="">Diskripsi</label>
                                <textarea name="diskripsi" rows="5" class="form-control" placeholder="diskripsi obat"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection