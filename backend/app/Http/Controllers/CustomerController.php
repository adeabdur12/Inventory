<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    
    public function index()
    {
        $customer = Customer::orderBy('created_at','DESC')->get();
        $response = [
            'message' => 'Data Customer',
            'data' => $customer
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'contact' => 'required',
            'email' => 'required|email:dns',
            'tipe_diskon' => 'required|in:persentase,fix',
            'ktp' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $customer = Customer::create($request->all());
            $response = [
                'message' => 'Data berhasil di buat',
                'data' => $customer
            ];
            return response()->json($response, Response::HTTP_CREATED);

        }catch(QueryException $e){
            return response()->json([
                'message' => 'gagal di buat'.$e->errorInfo
            ]);
        }
    }

    
    public function show($id)
    {
        $item = Customer::findOrFail($id);

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
        $customer = Customer::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'contact' => 'required',
            'email' => 'required|email:dns',
            'tipe_diskon' => 'required|in:persentase,fix',
            'ktp' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $customer->update($request->all());
            $response = [
                'message' => 'Data Berhasil di ubah',
                'data' => $customer    
            ];

            return response()->json($customer, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Gagal di ubah'.$e->errorInfo
            ]);
        }
    }

    
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        try {
            $customer->delete();
            $response = [
                'message' => 'data berhasil di hapus'
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch (QueryException $e) {

            return response()->json([
                'message' => 'Data gagal di hapus'.$e->errorInfo
            ]);
        }
    }
}
