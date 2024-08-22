<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class SupplierController extends Controller
{
    public function index(){
        $supplier = Supplier::all();

        if($supplier->count() > 0){
            return response()->json([
                'status' => 200,
                'supplier' => $supplier
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'supplier' => 'Not Found'
            ], 404);
        }

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'nama_supplier' => 'required|string|max:255',
            'alamat_supplier' => 'required|string|max:255',
            'kota_supplier' => 'required|string|max:255',
            'email_supplier' => 'required|email|unique:suppliers',
            'nohp_supplier' => 'required|digits:13'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
           $tambah = Supplier::create([
                'nama_supplier' => $request->nama_supplier,
                'alamat_supplier' => $request->alamat_supplier,
                'kota_supplier' => $request->kota_supplier,
                'email_supplier' => $request->email_supplier,
                'nohp_supplier' => $request->nohp_supplier,
            ]);

            if($tambah){
                return response()->json([
                    'status' => 200,
                    'message' => "Sudah Masuk Database"
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => "Gatau Rusak"
                ], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);

        if($supplier){
            return response()->json([
                'status' => 200,
                'supplier' => $supplier
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'supplier' => 'Data Tidak Ada'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);

        if($supplier){
            return response()->json([
                'status' => 200,
                'supplier' => $supplier
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'supplier' => 'Data Tidak Ada'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::find($id);

        $validator = FacadesValidator::make($request->all(), [
            'nama_supplier' => 'required|string|max:255',
            'alamat_supplier' => 'required|string|max:255',
            'kota_supplier' => 'required|string|max:255',
            'email_supplier' => 'required|email',
            'nohp_supplier' => 'required|digits:13'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
           $tambah = $supplier->update([
                'nama_supplier' => $request->nama_supplier,
                'alamat_supplier' => $request->alamat_supplier,
                'kota_supplier' => $request->kota_supplier,
                'email_supplier' => $request->email_supplier,
                'nohp_supplier' => $request->nohp_supplier,
            ]);

            if($tambah){
                return response()->json([
                    'status' => 200,
                    'message' => "Sudah Update Database"
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => "Gatau Rusak"
                ], 500);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);

        if($supplier){
            $supplier->delete();
            return response()->json([
                'status' => 200,
                'message' => "Sudah Dihapus dari Database"
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Data Tidak Ada'
            ], 404);
        }
    }

}
