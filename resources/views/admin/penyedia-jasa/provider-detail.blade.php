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
                                {{ $detail->provider }}
                            </h5>
                        </div>
                        <div class="">
                            <a href=""> {{ $detail->user->email }} </a>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.post.provider', ['ubah' => $detail->id]) }}" method="POST">
                @csrf
                <div class="provider-information mt-3">
                    <h6 class="card-subtitle mb-2 text-muted"> {{ strtoupper('Provider Information') }} </h6>
                    <hr>
                    <div class="row row-cols-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Pemilik Layanan</label>
                                <input name="pemilik" type="text" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $detail->pemilik }}">
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
                                <label for="exampleInputUsername1">Kontak</label>
                                <input name="kontak" type="text" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $detail->kontak }}">
                            </div>
                            @error('kontak')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $detail->deskripsi }}</textarea>
                            </div>
                            @error('deskripsi')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="alamat-provider mb-2">
                    <h6 class="card-subtitle mb-2 text-muted"> {{ strtoupper('Address Information') }} </h6>
                    <hr>
                    <div class="row row-cols-3">
                        <div class="col col-5">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Jalan</label>
                                <input name="jalan" type="text" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $detail->alamat->jalan }}">
                            </div>
                            @error('jalan')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col col-2">
                            <div class="form-group">
                                <label for="exampleInputUsername1">RT dan RW</label>
                                <input name="rtrw" type="text" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="Bug">
                            </div>
                            @error('rtrw')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col col-5">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Kelurahan atau Desa</label>
                                <input name="desa" type="text" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $detail->alamat->desa }}">
                            </div>
                            @error('desa')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col col-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Kecamatan</label>
                                <input name="kecamatan" type="text" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $detail->alamat->kecamatan }}">
                            </div>
                            @error('kecamatan')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col col-8">
                            <div class="row row-cols-3">
                                <div class="col col-5">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Kabupaten</label>
                                        <input name="kabupaten" type="text" class="form-control"
                                            id="exampleInputUsername1" autocomplete="off"
                                            value="{{ $detail->alamat->kabupaten }}">
                                    </div>
                                    @error('kabupaten')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="col col-5">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Provinsi</label>
                                        <input name="provinsi" type="text" class="form-control"
                                            id="exampleInputUsername1" autocomplete="off"
                                            value="{{ $detail->alamat->provinsi }}">
                                    </div>
                                    @error('provinsi')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="col col-2">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Kodepos</label>
                                        <input name="kodepos" type="text" class="form-control"
                                            id="exampleInputUsername1" autocomplete="off"
                                            value="{{ $detail->alamat->kodepos }}">
                                    </div>
                                    @error('kodepos')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.view.provider') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
