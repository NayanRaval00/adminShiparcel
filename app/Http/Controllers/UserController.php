<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\CourierCompany;
use App\Models\CourierWeightSlab;
use App\Models\User;
use App\Models\UserCourierWeightSlab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(CreateUserRequest $request)
    {
        // Validate and create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'website_url' => $request->website_url,
            'billing_address' => $request->billing_address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'state' => $request->state,
            'image_url' => $request->file('image_url') ? $request->file('image_url')->store('users', 'public') : null,
            'status' => $request->status,
            'cod_charges' => $request->cod_charges,
            'cod_percentage' => $request->cod_percentage,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id); // Retrieve user or fail if not found
        return view('admin.users.edit', compact('user')); // Pass user data to the edit view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Update user details
        $user->update([
            'name' => $request->name,
            'website_url' => $request->website_url,
            'billing_address' => $request->billing_address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'state' => $request->state,
            'status' => $request->status,
            'cod_charges' => $request->cod_charges,
            'cod_percentage' => $request->cod_percentage,
        ]);

        // If a new password is provided, update it
        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Handle profile image upload
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('users', 'public');
            $user->update(['image_url' => $imagePath]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show Update User Charge Update form
     */
    public function userCharges(Request $request)
    {
        $users = User::where('status', 1)->orderBy('id', 'desc')->paginate('10');
        return view('admin.users.user_charges', compact('users'));
    }


    /**
     * Update User Chargeable Amount
     */

    public function updateUserCharges(Request $request, $userId)
    {
        $request->validate([
            'chargeable_amount' => ['required', 'numeric'],
        ]);

        $user = User::findOrFail($userId);
        $user->update(['chargeable_amount' => $request->chargeable_amount]);

        return redirect()->back()->with('success', 'Chargeable Amount updated successfully.');
    }

    /**
     * User Weight Slab  
     * 
     */

    public function userWeightSlab(Request $request)
    {
        $userId = $request->user_id;

        $courierCompanies = CourierCompany::where('status', 1)
            ->with(['userSelections' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->get();

        $weightSlabs = CourierWeightSlab::where('status', 1)->get();

        foreach ($courierCompanies as $company) {
            $userSelection = $company->userSelections->first();
            $company->isChecked = $userSelection ? true : false;
            $company->selectedSlabs = $userSelection ? json_decode($userSelection->courier_weight_slab_id, true) : [];
        }

        return view('admin.users.courier_weight_slab', compact('courierCompanies', 'weightSlabs'));
    }



    /*
    *   Courier Rate Slab 
    */
    public function courierRateSlab($company_id, $user_id)
    {
        $courierWeightSlabs = UserCourierWeightSlab::where('courier_company_id', $company_id)
            ->where('user_id', $user_id)
            ->with('company')
            ->get();

        $formattedSlabs = [];

        foreach ($courierWeightSlabs as $slab) {
            // Decode the JSON field
            $decodedSlabs = json_decode($slab->courier_weight_slab_id, true);

            if (is_array($decodedSlabs)) {
                $weightSlabs = CourierWeightSlab::whereIn('id', $decodedSlabs)->pluck('weight', 'id');

                foreach ($decodedSlabs as $slabId) {
                    $formattedSlabs[] = [
                        'company_name' => $slab->company->name ?? 'Unknown Company',
                        'weight_slab' => $weightSlabs[$slabId] ?? 'Unknown Weight', // Get actual weight
                    ];
                }
            }
        }

        return view('admin.users.courier_rate_slab', compact('formattedSlabs'));
    }




    /**
     * Save Weight Slabs
     */
    public function saveUserWeightSlab(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:courier_companies,id',
            'weight_slab' => 'nullable|array',
            'weight_slab.*' => 'exists:courier_weight_slabs,id'
        ]);

        $userId = $validated['user_id'];
        $companyId = $validated['company_id'];
        $selectedWeightSlabs = $validated['weight_slab'] ?? [];

        // Check if record exists
        $existingRecord = UserCourierWeightSlab::where('user_id', $userId)
            ->where('courier_company_id', $companyId)
            ->first();

        if ($existingRecord) {
            if (!empty($selectedWeightSlabs)) {
                $existingRecord->update([
                    'courier_weight_slab_id' => json_encode($selectedWeightSlabs),
                    'is_enabled' => 1
                ]);
            } else {
                $existingRecord->update(['is_enabled' => 0]);
            }
        } else {
            if (!empty($selectedWeightSlabs)) {
                UserCourierWeightSlab::create([
                    'user_id' => $userId,
                    'courier_company_id' => $companyId,
                    'courier_weight_slab_id' => json_encode($selectedWeightSlabs),
                    'is_enabled' => 1
                ]);
            }
        }

        return redirect()->back()->with('success', 'Weight slabs updated successfully.');
    }
}
