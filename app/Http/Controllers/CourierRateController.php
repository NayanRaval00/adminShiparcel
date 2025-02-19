<?php

namespace App\Http\Controllers;

use App\Models\CourierCompany;
use App\Models\CourierWeightSlab;
use App\Models\UserCourierRate;
use App\Models\UserCourierWeightSlab;
use Illuminate\Http\Request;

class CourierRateController extends Controller
{

    /**
     * Store User wise it's rate
     */
    public function store(Request $request)
    {
        $userId = $request->user_id;
        $companyId = $request->courier_company_id;
        $weightSlabs = $request->input('weight_slab', []); // Array of weight slab values

        // Loop through each rate slab
        foreach ($request->input('rates', []) as $index => $rateSlab) {
            $weightSlabId = $weightSlabs[$index] ?? null; // Match weight slab index-wise

            if (!$weightSlabId) {
                continue; // Skip if weight slab ID is missing
            }

            // Process Surface and Air separately
            foreach (['Surface', 'Air'] as $mode) {
                if (!isset($rateSlab[$mode])) {
                    continue; // Skip if the mode is missing
                }

                foreach ($rateSlab[$mode] as $zone => $rates) {
                    UserCourierRate::updateOrCreate(
                        [
                            'user_id' => $userId,
                            'courier_company_id' => $companyId,
                            'courier_weight_slab_id' => $weightSlabId, // Store weight slab index-wise
                            'mode' => $mode,
                            'zone' => $zone,
                        ],
                        [
                            'forward_fwd' => $rates['forward_fwd'] ?? null,
                            'additional_fwd' => $rates['additional_fwd'] ?? null,
                            'forward_rto' => $rates['forward_rto'] ?? null,
                            'additional_rto' => $rates['additional_rto'] ?? null,
                        ]
                    );
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Courier rates saved successfully!']);
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
