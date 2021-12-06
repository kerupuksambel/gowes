@extends('layouts.dashboard')

@section('content')
    @foreach ($group as $g)
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ $g->nama }}</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                @foreach ($g->members as $m)
                <div class="col-md-3">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple">
                            <img src="{{ $m->gambar }}" class="img-fluid w-100" />
                        </div>
                        <div class="card-body">
                            <h5>
                                <b>{{ $m->nama }}</b>
                            </h5>
                            <p>{{ $m->deskripsi }}</p>
                        </div>
                        <div class="card-footer">
                            <form method="POST" action="{{ route('katalog.add', ['id' => $m->id]) }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-success w-100" value="Tambahkan ke Keranjang">
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
@endsection
