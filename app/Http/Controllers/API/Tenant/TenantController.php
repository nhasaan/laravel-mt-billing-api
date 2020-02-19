<?php

namespace App\Http\Controllers\API\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tenant;
use Validator;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Storage;

class TenantController extends Controller
{
    public function index()
    {
        $size = 100;
        return response()->json($request->get('limit'));
        // $clients = DB::table('clients')->paginate($size);
        // return response()->json($clients, 200);
    }

    public function show(Tenant $slug)
    {
         // $slug->users()->with('users')->get();
        return response()->json($slug, 200);
    }

    public function store(Request $request)
    {
        $inputs = $request->only('name', 'description', 'domain');

        // $messages = [
        //     'mimes' => 'The :attribute must be a file of type: :values.',
        //     'max' => 'The :attribute must be maximum of: :values kb.',
        // ];

        $validator = Validator::make($inputs, [
            'name' => 'required', // |image|mimetypes:image/jpeg,image/jpg,image/png
            'domain' => 'required',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        if($tenant = Tenant::create($inputs)) {
            return response()->json(['success' => true, 'tenantinfo' => $tenant], 201);
        }
        // $tenant = Tenant::create($inputs);
        // return response()->json($inputs, 200);
        return response()->json(['success' => false], 200);
    }

    public function update(Request $request, Tenant $tenant)
    {
        $tenant->update($request->all());

        return response()->json($tenant, 200);
    }

    public function delete(Tenant $tenant)
    {
        $tenant->delete();

        return response()->json(null, 204);
    }
}
