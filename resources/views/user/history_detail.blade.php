@extends('layouts.dashboard')

@section('content')
    <div class="row">
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
                            @foreach ($order->components as $idx => $c)
                            <tr>
                                @php $sum += $c->jumlah * $c->harga_satuan @endphp
                                <td>{{ $c->component->nama }}</td>
                                <td>{{ $c->jumlah }}</td>
                                <td>{{ $c->harga_satuan }}</td>
                                <td>{{ $c->jumlah * $c->harga_satuan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-7">Harga Komponen</div><div class="col-md-5">{{ format_rupiah($sum) }}</div>
                        <div class="col-md-7">Harga Perakitan</div><div class="col-md-5" id="hargaRakit">{{ format_rupiah(100000) }}</div>
                        <div class="col-md-7">Harga Total</div><div class="col-md-5" id="hargaTotal"><b>{{ format_rupiah($sum + 100000) }}</b></div>
                        <input type="hidden" value="{{ 100000 }}" name="biaya_servis">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Bukti Transfer</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form action="{{ route('cart.upload', compact('id')) }}" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="bukti">Bukti Transfer</label>
                                <input class="form-control" name="bukti" type="file">
                            </div>
                            <input type="submit" value="Upload" class="btn btn-primary">
                        </form>
                    </div>
                    @if ($order->bukti_transfer)
                        <img class="img-fluid" src="{{ $order->bukti_transfer }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
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
