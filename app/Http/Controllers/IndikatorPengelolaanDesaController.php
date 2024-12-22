<?php

namespace App\Http\Controllers;

use App\Models\IndikatorDesa\DesaProfile;
use App\Models\IndikatorDesa\KelembagaanAparatur;
use App\Models\IndikatorDesa\PenghargaanDesa;
use App\Models\IndikatorDesa\Provinsi;
use App\Models\IndikatorDesa\RegulasiDesa;
use App\Models\IndikatorDesa\StatusDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IndikatorPengelolaanDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinsi = Provinsi::all();
        // $indicator = Str::camel(str_replace(' ', '', $request->query('indicator')));
        $columns = [];
        foreach ($provinsi as $prov) {
            foreach ($prov->getRelations() as $key => $value) {
                if (!empty($value)) {
                    $className = class_basename($value);

                    if (!isset($columns[Str::camel($className)])) {
                        $columns[Str::camel($className)] = [];
                    }

                    // Tambahkan data baru tanpa menimpa
                    $columns[Str::camel($className)][] = $value->getAttributes();
                }
            }
        }

        return view("dashboard.indikator-pengelolaan-desa.index", [
            "indicators" => $provinsi,
            'columns' => $columns
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.indikator-pengelolaan-desa.create", [
            "provinces" => Provinsi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $length = 15; // Panjang angka random
            $validatedData = $request->validate([
                "kode_provinsi" => ['required', 'numeric'],
                "jumlah_desa" => ['required', 'numeric'],
                "jumlah_rt" => ['required', 'numeric'],
                "jumlah_rw" => ['required', 'numeric'],
                "jumlah_lad" => ['required', 'numeric'],
                "jumlah_aparatur_pemerintahan_desa" => ['required', 'numeric'],
                "jumlah_desa_swadaya" => ['required', 'numeric'],
                "jumlah_desa_swakarya" => ['required', 'numeric'],
                "jumlah_desa_swasembada" => ['required', 'numeric'],
                "jumlah_desa_rumah_tidak_layak_huni" => ['required', 'numeric'],
                "jumlah_desa_sanitasi_kurang_bagus" => ['required', 'numeric'],
                "jumlah_desa_menyewa_kantor_desa" => ['required', 'numeric'],
                "jumlah_anggota_bpd" => ['required', 'numeric'],
                "jumlah_anggota_bpd_perempuan" => ['required', 'numeric'],
                "jumlah_lkd" => ['required', 'numeric'],
                "jumlah_lkd_dasar_hukum_sah" => ['required', 'numeric'],
                "jumlah_desa_menetapkan_kepengurusan_posyandu" => ['required', 'numeric'],
                "jumlah_aparatur_desa_pelatihan_kapasitas" => ['required', 'numeric'],
                "jumlah_desa_aktif_pkk" => ['required', 'numeric'],
                "jumlah_peraturan_desa" => ['required', 'numeric'],
                "jumlah_peraturan_kepala_desa" => ['required', 'numeric'],
                "jumlah_peraturan_bersama_kepala_desa" => ['required', 'numeric'],
                "jumlah_keputusan_kepala_desa" => ['required', 'numeric'],
                "jumlah_desa_memiliki_sop_spm" => ['required', 'numeric'],
                "jumlah_desa_memiliki_peraturan_kerjasama_antar_desa" => ['required', 'numeric'],
                "jumlah_desa_memiliki_peraturan_kerjasama_pihak_ketiga" => ['required', 'numeric'],
                "jumlah_desa_melaksanakan_kerjasama_bkad_bumdes" => ['required', 'numeric'],
                "jumlah_desa_menerima_penghargaan_kecamatan" => ['required', 'numeric'],
                "jumlah_desa_menerima_penghargaan_kabupaten" => ['required', 'numeric'],
                "jumlah_desa_menerima_penghargaan_provinsi" => ['required', 'numeric'],
                "jumlah_desa_menerima_penghargaan_nasional" => ['required', 'numeric'],
                "jumlah_desa_menerima_penghargaan_internasional" => ['required', 'numeric'],
                "jumlah_desa_musrenbang_tertib" => ['required', 'numeric'],
                "jumlah_desa_rpjmdes_tepat_waktu" => ['required', 'numeric'],
                "jumlah_desa_rkpdes_tepat_waktu" => ['required', 'numeric'],
                "jumlah_desa_sertifikat_kantor" => ['required', 'numeric'],
                "jumlah_pades" => ['required', 'numeric'],
            ]);

            DB::transaction(function () use ($validatedData) {
                DesaProfile::create([
                    "id" => str_pad(mt_rand(0, pow(10, 15) - 1), 15, '0', STR_PAD_LEFT),
                    "kode_provinsi" => $validatedData['kode_provinsi'],
                    "jumlah_desa" => $validatedData['jumlah_desa'],
                    "jumlah_rt" => $validatedData['jumlah_rt'],
                    "jumlah_rw" => $validatedData['jumlah_rw'],
                    "jumlah_lad" => $validatedData['jumlah_lad'],
                    "jumlah_aparatur_pemerintahan_desa" => $validatedData['jumlah_aparatur_pemerintahan_desa']
                ]);
        
                StatusDesa::create([
                    "id" => str_pad(mt_rand(0, pow(10, 15) - 1), 15, '0', STR_PAD_LEFT),
                    "kode_provinsi" => $validatedData['kode_provinsi'],
                    "jumlah_desa_swadaya" => $validatedData['jumlah_desa_swadaya'],
                    "jumlah_desa_swakarya" => $validatedData['jumlah_desa_swakarya'],
                    "jumlah_desa_swasembada" => $validatedData['jumlah_desa_swasembada'],
                    "jumlah_desa_rumah_tidak_layak_huni" => $validatedData['jumlah_desa_rumah_tidak_layak_huni'],
                    "jumlah_desa_sanitasi_kurang_bagus" => $validatedData['jumlah_desa_sanitasi_kurang_bagus'],
                    "jumlah_desa_menyewa_kantor_desa" => $validatedData['jumlah_desa_menyewa_kantor_desa'],
                ]);
        
                KelembagaanAparatur::create([
                    "id" => str_pad(mt_rand(0, pow(10, 15) - 1), 15, '0', STR_PAD_LEFT),
                    "kode_provinsi" => $validatedData['kode_provinsi'],
                    "jumlah_anggota_bpd" => $validatedData['jumlah_anggota_bpd'],
                    "jumlah_anggota_bpd_perempuan" => $validatedData['jumlah_anggota_bpd_perempuan'],
                    "jumlah_lkd" => $validatedData['jumlah_lkd'],
                    "jumlah_lkd_dasar_hukum_sah" => $validatedData['jumlah_lkd_dasar_hukum_sah'],
                    "jumlah_desa_menetapkan_kepengurusan_posyandu" => $validatedData['jumlah_desa_menetapkan_kepengurusan_posyandu'],
                    "jumlah_aparatur_desa_pelatihan_kapasitas" => $validatedData['jumlah_aparatur_desa_pelatihan_kapasitas'],
                    "jumlah_desa_aktif_pkk" => $validatedData['jumlah_desa_aktif_pkk'],
                ]);
                
                RegulasiDesa::create([
                    "id" => str_pad(mt_rand(0, pow(10, 15) - 1), 15, '0', STR_PAD_LEFT),
                    "kode_provinsi" => $validatedData['kode_provinsi'],
                    "jumlah_peraturan_desa" => $validatedData['jumlah_peraturan_desa'],
                    "jumlah_peraturan_kepala_desa" => $validatedData['jumlah_peraturan_kepala_desa'],
                    "jumlah_peraturan_bersama_kepala_desa" => $validatedData['jumlah_peraturan_bersama_kepala_desa'],
                    "jumlah_keputusan_kepala_desa" => $validatedData['jumlah_keputusan_kepala_desa'],
                    "jumlah_desa_memiliki_sop_spm" => $validatedData['jumlah_desa_memiliki_sop_spm'],
                    "jumlah_desa_memiliki_peraturan_kerjasama_antar_desa" => $validatedData['jumlah_desa_memiliki_peraturan_kerjasama_antar_desa'],
                    "jumlah_desa_memiliki_peraturan_kerjasama_pihak_ketiga" => $validatedData['jumlah_desa_memiliki_peraturan_kerjasama_pihak_ketiga'],
                    "jumlah_desa_melaksanakan_kerjasama_bkad_bumdes" => $validatedData['jumlah_desa_melaksanakan_kerjasama_bkad_bumdes'],
                ]);
                
                PenghargaanDesa::create([
                    "id" => str_pad(mt_rand(0, pow(10, 15) - 1), 15, '0', STR_PAD_LEFT),
                    "kode_provinsi" => $validatedData['kode_provinsi'],
                    "jumlah_desa_menerima_penghargaan_kecamatan" => $validatedData['jumlah_desa_menerima_penghargaan_kecamatan'],
                    "jumlah_desa_menerima_penghargaan_kabupaten" => $validatedData['jumlah_desa_menerima_penghargaan_kabupaten'],
                    "jumlah_desa_menerima_penghargaan_provinsi" => $validatedData['jumlah_desa_menerima_penghargaan_provinsi'],
                    "jumlah_desa_menerima_penghargaan_nasional" => $validatedData['jumlah_desa_menerima_penghargaan_nasional'],
                    "jumlah_desa_menerima_penghargaan_internasional" => $validatedData['jumlah_desa_menerima_penghargaan_internasional'],
                    "jumlah_desa_musrenbang_tertib" => $validatedData['jumlah_desa_musrenbang_tertib'],
                    "jumlah_desa_rpjmdes_tepat_waktu" => $validatedData['jumlah_desa_rpjmdes_tepat_waktu'],
                    "jumlah_desa_rkpdes_tepat_waktu" => $validatedData['jumlah_desa_rkpdes_tepat_waktu'],
                    "jumlah_desa_sertifikat_kantor" => $validatedData['jumlah_desa_sertifikat_kantor'],
                    "jumlah_pades" => $validatedData['jumlah_pades'],
                ]);
            }, 5);
            return redirect('/dashboard/form-indikator-desa')->with("success", "New Data Indikator Pengelolaan Desa Sukses KodeProvinsi: " . $request->kode_provinsi);
        } catch(\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->with('error-indikator', 'Terjadi Kesalahan Pada Form Input Silahkan Dicek')->withInput();
        } catch (\Exception $e) {
            report($e); 
            return redirect()->back()->with("error-indikator", "Terjadi Kesalahan: " . substr($e->getMessage(), 0, strpos($e->getMessage(), "(SQL: ")));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("/dashboard/indikator-pengelolaan-desa/show", []);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            
        $models = [
            DesaProfile::class,
            StatusDesa::class,
            KelembagaanAparatur::class,
            RegulasiDesa::class,
            PenghargaanDesa::class,
        ];

        $data = [];
        foreach ($models as $model) {
            $data = $model::with('provinsi')->find($id);
            if ($data) {
                $data = $data;
                break;
            }
            // dd($data);
        }
        // dd($data->getAttributes());
        $provinsi = [$data->provinsi];
        return view('dashboard.indikator-pengelolaan-desa.edit', [
            'provinces' => $provinsi,
            'tab' => class_basename($model),
            'data' => $data->getAttributes()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        switch ($request->tab) {
            case 'DesaProfile':
                $validatedData = $request->validate([
                    "kode_provinsi" => ['required', 'numeric'],
                    "jumlah_desa" => ['required', 'numeric'],
                    "jumlah_rt" => ['required', 'numeric'],
                    "jumlah_rw" => ['required', 'numeric'],
                    "jumlah_lad" => ['required', 'numeric'],
                    "jumlah_aparatur_pemerintahan_desa" => ['required', 'numeric'],
                ]);
                DesaProfile::where('id', $id)->update($validatedData);
                break;
            
            case 'StatusDesa':
                $validatedData = $request->validate([
                    "kode_provinsi" => ['required', 'numeric'],
                    "jumlah_desa_swadaya" => ['required', 'numeric'],
                    "jumlah_desa_swakarya" => ['required', 'numeric'],
                    "jumlah_desa_swasembada" => ['required', 'numeric'],
                    "jumlah_desa_rumah_tidak_layak_huni" => ['required', 'numeric'],
                    "jumlah_desa_sanitasi_kurang_bagus" => ['required', 'numeric'],
                    "jumlah_desa_menyewa_kantor_desa" => ['required', 'numeric'],
                ]);
                StatusDesa::where('id', $id)->update($validatedData);
                break;
            
            case 'KelembagaanAparatur':
                $validatedData = $request->validate([
                    "kode_provinsi" => ['required', 'numeric'],
                    "jumlah_anggota_bpd" => ['required', 'numeric'],
                    "jumlah_anggota_bpd_perempuan" => ['required', 'numeric'],
                    "jumlah_lkd" => ['required', 'numeric'],
                    "jumlah_lkd_dasar_hukum_sah" => ['required', 'numeric'],
                    "jumlah_desa_menetapkan_kepengurusan_posyandu" => ['required', 'numeric'],
                    "jumlah_aparatur_desa_pelatihan_kapasitas" => ['required', 'numeric'],
                    "jumlah_desa_aktif_pkk" => ['required', 'numeric'],
                ]);
                KelembagaanAparatur::where('id', $id)->update($validatedData);
                break;
            
            case 'RegulasiDesa':
                $validatedData = $request->validate([
                    "kode_provinsi" => ['required', 'numeric'],
                    "jumlah_peraturan_desa" => ['required', 'numeric'],
                    "jumlah_peraturan_kepala_desa" => ['required', 'numeric'],
                    "jumlah_peraturan_bersama_kepala_desa" => ['required', 'numeric'],
                    "jumlah_keputusan_kepala_desa" => ['required', 'numeric'],
                    "jumlah_desa_memiliki_sop_spm" => ['required', 'numeric'],
                    "jumlah_desa_memiliki_peraturan_kerjasama_antar_desa" => ['required', 'numeric'],
                    "jumlah_desa_memiliki_peraturan_kerjasama_pihak_ketiga" => ['required', 'numeric'],
                    "jumlah_desa_melaksanakan_kerjasama_bkad_bumdes" => ['required', 'numeric'],
                ]);
                RegulasiDesa::where('id', $id)->update($validatedData);
                break;
            
            case 'PenghargaanDesa':
                $validatedData = $request->validate([
                    "kode_provinsi" => ['required', 'numeric'],
                    "jumlah_desa_menerima_penghargaan_kecamatan" => ['required', 'numeric'],
                    "jumlah_desa_menerima_penghargaan_kabupaten" => ['required', 'numeric'],
                    "jumlah_desa_menerima_penghargaan_provinsi" => ['required', 'numeric'],
                    "jumlah_desa_menerima_penghargaan_nasional" => ['required', 'numeric'],
                    "jumlah_desa_menerima_penghargaan_internasional" => ['required', 'numeric'],
                    "jumlah_desa_musrenbang_tertib" => ['required', 'numeric'],
                    "jumlah_desa_rpjmdes_tepat_waktu" => ['required', 'numeric'],
                    "jumlah_desa_rkpdes_tepat_waktu" => ['required', 'numeric'],
                    "jumlah_desa_sertifikat_kantor" => ['required', 'numeric'],
                    "jumlah_pades" => ['required', 'numeric'],
                ]);
                PenghargaanDesa::where('id', $id)->update($validatedData);
                break;
            
            default:
                
                break;
        }
        return redirect('/dashboard/form-indikator-desa')->with("success", "Edit Data Indikator Pengelolaan Desa Sukses <b> KodeProvinsi: " . $request->kode_provinsi . " - TAB: " . $request->tab . " PERIODE: " . $request->created_at . "</b>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        DesaProfile::where('kode_provinsi', $request->kode_provinsi)->where("created_at", $id)->delete();
        StatusDesa::where('kode_provinsi', $request->kode_provinsi)->where("created_at", $id)->delete();
        RegulasiDesa::where('kode_provinsi', $request->kode_provinsi)->where("created_at", $id)->delete();
        PenghargaanDesa::where('kode_provinsi', $request->kode_provinsi)->where("created_at", $id)->delete();
        KelembagaanAparatur::where('kode_provinsi', $request->kode_provinsi)->where("created_at", $id)->delete();
        
        return redirect('/dashboard/form-indikator-desa')->with('success', 'Indikator Desa Sudah Di Hapus <b> Kode Provinsi ' . $request->kode_provinsi . " - Periode " . $id. "</b>");
    }
}
