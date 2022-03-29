<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    
    public function index()
    {
        $item = Item::orderBy('created_at','DESC')->get();
        $response = [
            'message' => 'List berdasarkan item terbaru',
            'data' => $item
        ];

        return response()->json($response, Response::HTTP_OK);
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {   
        $validator = $request->validate([
            'nama_item' => 'required',
            'unit' => 'required|in:kg,pcs',
            'stok' => 'required|numeric|min:1',
            'harga_satuan' => 'required|numeric',
            'barang' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if($validator){
        }else{
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        
        try {
            $validator['barang'] = $request->file('barang')->store('barang'); 
            $item = Item::create($validator);
            $response = [
                'message' => 'Item berhasil di buat',
                'data' => $item
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Data gagal di buat'.$e->errorInfo
            ]);
        }
    }

    
    public function show($id)
    {
        $item = Item::findOrFail($id);

        $response = [
            'message' => 'Detail data Item',
            'data' => $item
        ];

        return response()->json($response, Response::HTTP_OK);
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $validator = $request->validate([
            'nama_item' => 'required',
            'unit' => 'required|in:kg,pcs',
            'stok' => 'required|numeric',
            'harga_satuan' => 'required|numeric'
        ]);

        if($validator){
        }else{
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $item->update($validator);
            $response = [
                'message' => 'Item berhasil di ubah',
                'data' => $item
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Data gagal di ubah'.$e->errorInfo
            ]);
        }
    }

    public function updateImg(Request $request, $id){
        $item = Item::findOrFail($id);
        $validator = $request->validate([
             'barang' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        if($validator){
        }else{
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $validator['barang'] = $request->file('barang')->store('barang');
            $item->update($validator);
            $response = [
                'message' => 'Berhasil',
                'data' => $item
            ];
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Gagal'.$e->errorIfo
            ]);
        }
    }

   
    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        try {
            $item->delete();
            $response = [
                'message' => 'Item berhasil di hapus'
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch (QueryException $e) {

            return response()->json([
                'message' => 'Data gagal di hapus'.$e->errorInfo
            ]);
        }
    }
}
