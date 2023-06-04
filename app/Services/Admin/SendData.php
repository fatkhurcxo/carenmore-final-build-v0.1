<?php

namespace App\Services\Admin;

use App\Models\KTP;
use App\Models\Layanan;
use App\Models\Provider;
use App\Models\Berlangganan;

/**
 * Class SendData
 * @package App\Services
 */
class SendData
{
    public function dataPengajuan()
    {
        $pengajuan = Provider::where('status', 'nonaktif')->latest()->paginate(3);

        return $pengajuan;
    }

    public function dataDetailPengajuan(Int $id)
    {
        $detailPengajuan = Provider::find($id);

        return $detailPengajuan;
    }

    public function dataProvider()
    {
        $providers = Provider::latest()->get();

        return $providers;
    }

    public function dataKTP(Int $id)
    {
        $ktp = KTP::firstWhere('provider_id', $id);

        return $ktp;
    }

    public function dataPengajuanBerlangganan()
    {
        $berlangganan = Berlangganan::where('status', 'nonaktif')->latest()->get();

        return $berlangganan;
    }

    public function dataBerlangganan()
    {
        $berlangganan = Berlangganan::latest()->paginate(9);

        return $berlangganan;
    }

    public function dataDetailBerlangganan(Int $id)
    {
        $detail = Berlangganan::find($id);

        return $detail;
    }

    public function dataLayanan()
    {
        $layanan = Layanan::latest()->paginate(9);

        return $layanan;
    }

    public function dataDetailLayanan(Int $id)
    {
        $detail = Layanan::find($id);

        return $detail;
    }

}
