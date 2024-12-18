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
