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
                            <form method="POST" action="{{ route('obat.update', $ob->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            
                                

                                <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_kategori">
                                                <option selected>-- Pilih Kategori --</option>
                                                @foreach($rel_kategori as $kategori)
                                                    @php
                                                        $sel2 = (old('id_kategori') == $kategori->id)? 'selected':'';
                                                    @endphp
                                                    <option value="{{ $kategori->id }}" {{ $sel2 }}>{{ $kategori->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Nama Obat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_obat" value="{{ $ob->nama_obat }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Kode Obat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kode_obat" value="{{ $ob->kode_obat }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="satuan" value="{{ $ob->satuan }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Stok Awal</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="stok_awal" value="{{ $ob->stok_awal }}"class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Sisa Stok</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sisa_stok" value="{{ $ob->sisa_stok }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Penerimaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="penerimaan" value="{{ $ob->penerimaan }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Persediaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="persediaan" value="{{ $ob->persediaan }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Pemakaian</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="pemakaian" value="{{ $ob->pemakaian }}" class="form-control">
                                    </div>
                                </div>
                                

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Permintaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="permintaan" value="{{ $ob->permintaan }}" class="form-control">
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