@extends('layouts.dashboard')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pembelian</th>
                <th>Nilai Pembelian</th>
                <th>Dirakit</th>
                <th>Biaya Perakitan</th>
                <th>Biaya Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $idx => $o)
            <tr>
                <td>{{ ++$idx }}</td>
                <td>{{ $o->created_at }}</td>
                <td>{{ format_rupiah($o->subtotal) }}</td>
                <td>{{ $o->is_dirakit }}</td>
                <td>{{ format_rupiah($o->biaya_rakit) }}</td>
                <td>{{ format_rupiah($o->biaya_rakit + $o->subtotal) }}</td>
                <td>{{ $o->status }}</td>
                <td>
                    <a href="{{ route('cart.historyDetail', ['id' => $o->id]) }}" class="btn btn-primary">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ml-auto">
        <a href="{{ route('cart.confirmation') }}" class="btn btn-primary">Checkout</a>
    </div>
@endsection
