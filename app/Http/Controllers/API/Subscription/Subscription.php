<?php

namespace App\Http\Controllers\API\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Tenant;
use App\Subscription;
use Validator;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Storage;

class SubscriptionController extends Controller
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
        $inputs = $request->only('name', 'description', 'domain', 'services', 'subscription', 'payment_method');
        $errors = [];

        $validator = Validator::make($inputs, [
            'name' => 'required', // |image|mimetypes:image/jpeg,image/jpg,image/png
            'domain' => 'required',
            'description' => 'required',
            'services' => 'required',
            'subscription' => 'required',
            'payment_method' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        
        $tenant_data = [
            'name' => $inputs['name'],
            'domain' => $inputs['domain'],
            'description' => $inputs['description'],
        ];


        if($tenant = Tenant::create($tenant_data)) {
            $user = auth();
            $update_user_data = [
                'tenant_id' => $tenant->id,
                'role_id' => 2
            ];
            $updated_user = User::update($user->id, $update_user_data);

            if($updated_user) {
                $subscription_data = [
                    'tenant_id' => $tenant->id,
                    'package_id' => $inputs['subscription'],
                    'payment_method_id' => $inputs['description'],
                    'services' => implode(',', $inputs['services']),
                    'created_by_user_id' => $updated_user->id
                ];

                if($subscription = Subscription::create($subscription_data)) {
                    return response()->json(['success' => true, 'data' => $subscription], 201);
                } else {
                    $errors['subscription'] = [
                        'code' => 3,
                        'message' => 'Subscription not created!'
                    ];
                }
            } else {
                $errors['user'] = [
                    'code' => 2,
                    'message' => 'User not updated!'
                ];
            }
            
        } else {
            $errors['tenant'] = [
                'code' => 1,
                'message' => 'Tenant not created!'
            ];
        }
        return response()->json(['success' => false, 'errors' => $errors], 200);
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

    public function subscribe(Request $request)
    {
        $inputs = $request->only('name', 'description', 'domain', 'services', 'subscription', 'payment_method');
        $errors = [];

        $validator = Validator::make($inputs, [
            'name' => 'required', // |image|mimetypes:image/jpeg,image/jpg,image/png
            'domain' => 'required',
            'description' => 'required',
            'services' => 'required',
            'subscription' => 'required',
            'payment_method' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        
        $tenant_data = [
            'name' => $inputs['name'],
            'domain' => $inputs['domain'],
            'description' => $inputs['description'],
        ];


        if($tenant = Tenant::create($tenant_data)) {
            $user = auth();
            $update_user_data = [
                'tenant_id' => $tenant->id,
                'role_id' => 2
            ];
            $updated_user = User::where('id', auth()->id())->update($update_user_data);

            if($updated_user) {
                $subscription_data = [
                    'tenant_id' => $tenant->id,
                    'package_id' => $inputs['subscription'],
                    'payment_method_id' => $inputs['payment_method'],
                    'services' => implode(',', $inputs['services']),
                    'created_by_user_id' => auth()->id()
                ];

                if($subscription = Subscription::create($subscription_data)) {
                    return response()->json(['success' => true, 'data' => $subscription], 201);
                } else {
                    $errors['subscription'] = [
                        'code' => 3,
                        'message' => 'Subscription not created!'
                    ];
                }
            } else {
                $errors['user'] = [
                    'code' => 2,
                    'message' => 'User not updated!'
                ];
            }
            
        } else {
            $errors['tenant'] = [
                'code' => 1,
                'message' => 'Tenant not created!'
            ];
        }
        return response()->json(['success' => false, 'errors' => $errors], 200);
    }
}
