@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('cart.checkout') }}" method="POST" class="row">
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Keranjang</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Harga Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum = 0
                            @endphp
                            @foreach ($cart as $idx => $c)
                            <tr>
                                @php $sum += $c->jumlah * $c->harga @endphp
                                <td>{{ $c->nama }}</td>
                                <td>{{ $c->jumlah }}</td>
                                <td>{{ $c->harga }}</td>
                                <td>{{ $c->jumlah * $c->harga }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pesanan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="dirakit" id="dirakitCheck">
                            <label class="form-check-label" for="dirakitCheck">Dirakit</label>
                        </div>
                        <div class="row">
                            <div class="col-md-7">Harga Komponen</div><div class="col-md-5">{{ format_rupiah($sum) }}</div>
                            <div class="col-md-7">Harga Perakitan</div><div class="col-md-5" id="hargaRakit">{{ format_rupiah(100000) }}</div>
                            <div class="col-md-7">Harga Total</div><div class="col-md-5" id="hargaTotal"><b>{{ format_rupiah($sum + 100000) }}</b></div>
                            <input type="hidden" value="{{ 100000 }}" name="biaya_servis">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Checkout">
    </form>
@endsection

@section('js')
    <script>
        $("#dirakitCheck").change(function(){
            console.log(1)
            if(this.checked){
                $("[name=biaya_servis]").val(100000)
                $("#hargaRakit").text("{{format_rupiah(100000)}}")
                $("#hargaTotal b").text("{{format_rupiah($sum + 100000)}}")
            }else{
                $("[name=biaya_servis]").val(0)
                $("#hargaRakit").text("{{format_rupiah(0)}}")
                $("#hargaTotal b").text("{{format_rupiah($sum)}}")
            }
        })
    </script>
@endsection