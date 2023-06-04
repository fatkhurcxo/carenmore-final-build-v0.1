@extends('admin.layout.master')
@section('content')
    @include('admin.layout.session')
    <div class="card rounded">
        <div class="card-body">
            <div class="d-flex flex-row">
                <div class="rounded-circle">
                    <img class="rounded-circle" src="{{ asset('assets/images/Ojak Logo.png') }}" alt="" width="50"
                        height="50">
                </div>
                <div class="flex-grow-1 pl-2">
                    <div class="">
                        <div class="">
                            <h5>
                                {{ $detail->nama }}
                            </h5>
                        </div>
                        <div class="">
                            <a href=""> {{ $detail->user->email }} </a>
                        </div>
                    </div>
                </div>
                <div>
                    {{ 'Coin : ' . 'Rp' . number_format($detail->coin) }}
                </div>
            </div>
            <form action="{{ route('admin.post.update.customer', ['detail' => $detail->id]) }}" method="POST">
                @csrf
                <div class="provider-information mt-3">
                    <h6 class="card-subtitle mb-2 text-muted"> {{ strtoupper('Customer Information') }} </h6>
                    <hr>
                    <div class="row row-cols-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Customer</label>
                                <input name="nama" type="text" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $detail->nama }}">
                            </div>
                            @error('pemilik')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status">
                                    <option value="aktif" @selected($detail->status === 'aktif')>Aktif</option>
                                    <option value="nonaktif" @selected($detail->status === 'nonaktif')>Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Lokasi</label>
                                <input name="lokasi" type="text" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $detail->alamat->kabupaten }}">
                            </div>
                            @error('kontak')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.view.customer') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
