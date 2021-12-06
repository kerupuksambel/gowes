@extends('layouts.dashboard')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th></th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Harga Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $idx => $c)
            <tr>
                {{-- <td>{{ ++$idx }}</td> --}}
                <td width="120px">
                    <img src="{{ $c->gambar }}" width="100px">
                </td>
                <td>{{ $c->nama }}</td>
                <td>{{ $c->jumlah }}</td>
                <td>{{ format_rupiah($c->harga) }}</td>
                <td>{{ format_rupiah($c->jumlah * $c->harga) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ml-auto">
        <a href="{{ route('cart.confirmation') }}" class="btn btn-primary">Checkout</a>
    </div>
@endsection
