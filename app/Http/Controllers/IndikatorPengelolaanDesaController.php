<?php

namespace App\Http\Controllers;

use App\Models\IndikatorDesa\Provinsi;
use Illuminate\Http\Request;
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
        // dd($provinsi[7]->getRelations());
        $columns = [];
        foreach ($provinsi as $prov) {
            foreach ($prov->getRelations() as $key => $value) {
                // Memeriksa apakah relasi ditemukan dan tidak null
                if (!empty($value)) {
                    // Mengambil atribut relasi dan mengisi array dengan nama relasi sebagai key
                    $className = class_basename($value);

                    // Jika key sudah ada, tambahkan sebagai array tambahan
                    if (!isset($columns[Str::camel($className)])) {
                        $columns[Str::camel($className)] = []; // Inisialisasi array baru jika key belum ada
                    }

                    // Tambahkan data baru tanpa menimpa
                    $columns[Str::camel($className)][] = $value->getAttributes();
                }
            }
        }
        // dd(array_keys($columns['penghargaanDesa'][0]));
        // var_dump($columns['kelembagaanAparatur']);


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
        return view("dashboard.indikator-pengelolaan-desa.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
