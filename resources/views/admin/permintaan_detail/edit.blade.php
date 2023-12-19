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
                            <form method="POST" action="{{ route('permintaan-detail.update', $per->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Obat</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="id_obat">
                                            <option selected>-- Pilih Obat --</option>
                                            @foreach($rel_obat as $ob)
                                            @php
                                            $sel2 = (old('id_obat') == $ob->id)? 'selected':'';
                                            @endphp
                                            <option value="{{ $ob->id }}" {{ $sel2 }}>{{ $ob->nama_obat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="jenis" class="col-sm-2 col-form-label">Persediaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="persediaan" value="{{ $per->persediaan }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="jenis" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="status">
                                            <option selected>-- Pilih Status --</option>
                                           
                                            <option value="terima">terima</option>
                                            <option value="tolak">tolak</option>
                                        </select>
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