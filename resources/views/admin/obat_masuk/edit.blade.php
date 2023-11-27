@extends('admin.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('user') }}">user</a></li>
                    <li class="breadcrumb-item active">edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form</h5>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- General Form Elements -->
                            <form method="POST" action="{{ route('obat-masuk.update', $obmas->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            
                                <div class="row mb-3">
                                    <label for="jenis" class="col-sm-2 col-form-label">Tanggal Obat Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="tgl_masuk" value="{{ $obmas->tgl_masuk }}" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan Obat Masuk</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="keterangan_masuk" style="height: 100px">{{ $obmas->keterangan_masuk }}</textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Simpan</label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection