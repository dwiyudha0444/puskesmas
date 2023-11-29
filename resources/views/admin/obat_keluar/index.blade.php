@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">admin</a></li>
                    <li class="breadcrumb-item active">obat-keluar</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <h5 class="card-title">Obat Keluar</span></h5>
                    <a href="{{ route('obat-keluar.create') }}"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" title="Tambah Data Film" class="bi bi-bookmark-plus"
                            viewBox="0 0 16 16">
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
                        </svg></a>
                    <table class="table table-borderless datatable ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Keterangan Keluar</th>
                                <th scope="col">Username</th>
                                @if (auth()->user()->role == 'apoteker' || auth()->user()->role == 'kepala apoteker')
                                    <th scope="col">Action</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($obat_keluar as $obke)
                                <tr>
                                    <th scope="row"><a href="#">{{ $no++ }}</a></th>
                                    <td>{{ $obke->tgl_keluar }}</td>
                                    <td>{{ $obke->keterangan_keluar }}</td>
                                    <td>{{ $obke->user->name }}</td>
                                    @if (auth()->user()->role == 'apoteker' || auth()->user()->role == 'kepala apoteker')
                                        <td>

                                            <form method="POST" action="{{ route('obat-keluar.destroy', $obke->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="custom-btn custom-btn-merah">Hapus</button>

                                                {{-- <a class="custom-btn custom-btn-hijau"
                                        href="{{ route('obat-keluar.show',$obke->id) }}">Detail</a> --}}
                                                <a class="custom-btn"
                                                    href="{{ url('obat-keluar-edit', $obke->id) }}">Edit</a>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div><!-- End Recent Sales -->
    </main>
@endsection
