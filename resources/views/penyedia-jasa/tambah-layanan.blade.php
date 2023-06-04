@extends('penyedia-jasa.layout.master')

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@section('content')
    @if (Session::has('fail'))
        <div class="alert alert-danger" role="alert">
            <span>
                {{ session('fail') }}
            </span>
        </div>
    @endif
    @include('penyedia-jasa.layout.emptyprovider')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-1">Detail Layanan</h5>
            <p class="mb-3">Untuk mendaftarkan layanan jasa cuci motor, anda diwajibkan menyediakan 2 jenis
                pencucian
                yakni
                Reguler dan Deepclean. Untuk informasi lengkap <a role="button" href="" data-toggle="modal"
                    data-target=".bd-example-modal-lg">klik disini.</a>
            </p>
            {{-- Modal --}}
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content rounded-0 p-3">
                        <div class="alert alert-info" role="alert">
                            <h5>Persyaratan</h5>
                        </div>
                        <p class="mb-3">
                            Anda diwajibkan untuk menyediakan minimum dua jenis layanan cuci kendaraan yakni Regular dan
                            Deepclean sebagai syarat agar layanan anda dapat kami verifikasi. Berikut merupakan penjelasan
                            dari jenis layanan tersebut.
                        </p>
                        <div class="alert alert-warning" role="alert">
                            <strong>Regular</strong> merupakan jenis layanan cuci kendaraan yang membersihkan kendaraan
                            secara keseluruhan
                            namun
                            tidak mendalam.
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <strong>Deepclean</strong> merupakan jenis layanan cuci kendaraan yang membersihkan kendaraan
                            secara keseluruhan
                            dan mendalam, juga disertai dengan treatment tambahan agar kendaraan lebih tampak mengkilap.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {{-- FORM --}}
                    {{-- {{ dd($route) }} --}}
                    <form class="cmxform" id="layananForm" method="POST"
                        action="
                        @if ($route === 'provider.post.update') {{ route($route, ['update' => $layanan->id]) }}
                        @else
                        {{ route($route) }} @endif">
                        @csrf
                        <fieldset>
                            <div class="row row-cols-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Nama Layanan</label>
                                        <input id="name" class="form-control" name="nama_layanan" type="text"
                                            placeholder="Nama layanan anda"
                                            value="{{ $value = $layanan->nama ?? old('nama_layanan') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Jenis Kendaraan</label>
                                        <select class="form-control" name="jenis_kendaraan" id="exampleFormControlSelect1">
                                            <option selected disabled>Pilih jenis kendaraan</option>
                                            <option value="Mobil"
                                                {{ (old('jenis_kendaraan') == 'Mobil' ? 'selected' : isset($layanan->kendaraan) == 'Mobil') ? 'selected' : '' }}>
                                                Mobil</option>
                                            <option value="Motor"
                                                {{ (old('jenis_kendaraan') == 'Motor' ? 'selected' : isset($layanan->kendaraan) == 'Motor') ? 'selected' : '' }}>
                                                Motor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Jenis Layanan</label>
                                    <select class="form-control jenis_layanan" name="jenis_layanan" id="jenis_layanan">
                                        <option selected disabled>Pilih jenis layanan</option>
                                        <option value="Cuci Dirumah" id="cuci_dirumah"
                                            @if ($route === 'provider.post.update') {{ $layanan->jenis == 'Cuci Dirumah' ? 'selected' : '' }}
                                            @else
                                            {{ old('jenis_layanan') == 'Cuci Dirumah' ? 'selected' : '' }} @endif>
                                            Cuci
                                            Dirumah
                                        </option>
                                        <option value="Cuci Ditempat" id="cuci_ditempat"
                                            @if ($route === 'provider.post.update') {{ $layanan->jenis == 'Cuci Ditempat' ? 'selected' : '' }}
                                            @else
                                            {{ old('jenis_layanan') == 'Cuci Ditempat' ? 'selected' : '' }} @endif>
                                            Cuci
                                            Ditempat
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Harga</label>
                                        <input id="harga" class="form-control" name="harga" type="text"
                                            placeholder="Hanya gunakan angka tanpa titik(.) atau koma(,)"
                                            value="{{ $value = $layanan->harga ?? old('harga') }}">
                                    </div>
                                </div>
                                <style>
                                    .form-check {
                                        transition: all 0.5s ease 0s;
                                    }

                                    .form-check:hover {
                                        transform: scale(1.075);
                                    }
                                </style>
                                <div class="col for-cuci-dirumah">
                                    <div class="form-group">
                                        <label class="border-bottom container pl-0">Ketersediaan Tempat</label>
                                        <div class="row row-cols-2">
                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="tempat"
                                                            id="optionsRadios5" value="1"
                                                            {{ (old('tempat') == 1 ? 'checked' : isset($layanan->tempat) == 1) ? 'checked' : '' }}>
                                                        Ya
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="tempat"
                                                            id="optionsRadios6" value="0"
                                                            {{ (old('tempat') == 0 ? 'checked' : isset($layanan->tempat) == 0) ? 'checked' : '' }}>
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('tempat')
                                            <div class="alert alert-danger pt-2 pb-2 pl-3" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <a tabindex="0" class="text-warning" role="button" data-toggle="popover"
                                            data-trigger="focus" data-placement="bottom"
                                            data-content="Pilih 'Ya' jika anda mewajibkan pelanggan anda menyediakan tempat untuk cuci motor/mobil">
                                            <i data-feather="alert-circle" style="width: 20px; height: 20px;"></i>
                                            Informasi
                                        </a>
                                    </div>
                                </div>
                                <div class="col for-cuci-dirumah">
                                    <div class="form-group">
                                        <label class="border-bottom container pl-0">Ketersediaan Air</label>
                                        <div class="row row-cols-2">
                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="air"
                                                            id="optionsRadios5" value="1"
                                                            {{ (old('air') == 1 ? 'checked' : isset($layanan->air) == 1) ? 'checked' : '' }}>
                                                        Ya
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="air"
                                                            id="optionsRadios6" value="0"
                                                            {{ (old('air') == 0 ? 'checked' : isset($layanan->air) == 0) ? 'checked' : '' }}>
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('air')
                                            <div class="alert alert-danger pb-2 pt-2 pl-3" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <a tabindex="0" class="text-warning" role="button" data-toggle="popover"
                                            data-trigger="focus" data-placement="bottom"
                                            data-content="Pilih 'Ya' jika anda mewajibkan pelanggan anda untuk menyediakan air">
                                            <i data-feather="alert-circle" style="width: 20px; height: 20px;"></i>
                                            Informasi
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi <span
                                        style="color: lightgray; font-size: smaller;">( opsional )</span></label>
                                <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="5">
@if (old('deskripsi'))
{{ old('deskripsi') }}
@elseif (isset($layanan->deskripsi))
{{ $layanan->deskripsi }}
@else
Deskripsi tambahan untuk layanan anda, dapat diisi ketentuan layanan sebagai informasi tambahan
@endif
</textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Tambahkan</button>
                            <a href="{{ route('provider.layanan') }}" class="btn btn-secondary"
                                type="button">Kembali</a>
                        </fieldset>
                    </form>
                    {{-- END FORM --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/layanan.js') }}"></script>
@endpush
