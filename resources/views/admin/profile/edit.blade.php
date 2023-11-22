@extends('admin.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('profile') }}">profile</a></li>
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
                            <form method="POST" action="{{ route('profile.update', $us->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="jenis">Nama</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter jenis"
                                        name="name" value="{{ Auth::user()->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="jenis">Nip</label>
                                    <input type="text" class="form-control" id="nip" placeholder="Enter NIP"
                                        name="nip" value="{{ Auth::user()->nip }}">
                                </div>

                                <div class="form-group">
                                    <label for="jenis">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter Email"
                                        name="email" value="{{ Auth::user()->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-label" id="exampleInputFile"
                                                name="foto">
                                            

                                        </div>
                                    </div>
                                    @if (!empty($pro->foto))
                                        </br><img src="{{ url('assets/profile/img') }}/{{ Auth::user()->foto }}"
                                            width="20%" class="img-thumbnail">
                                        </br>{{ $pro->foto }}
                                    @endif
                                </div>

                                <div class="row mt-3">
                                    
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