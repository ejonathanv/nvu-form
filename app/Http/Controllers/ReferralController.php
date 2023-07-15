<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referral;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreReferralRequest;
use App\Http\Requests\UpdateReferralRequest;

class ReferralController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referrals = Referral::orderBy('created_at', 'desc')->get();
        return view('admin.referrals.index', compact('referrals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.referrals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReferralRequest $request)
    {
        $referral = new Referral();
        $referral->user_id = $this->create_user($request);
        $referral->code = $request->code;
        $referral->save();

        return redirect()->route('referrals.index', $referral);
    }

    public function create_user($request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return $user->id;
    }

    /**
     * Display the specified resource.
     */
    public function show(Referral $referral)
    {
        return view('admin.referrals.show', compact('referral'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Referral $referral)
    {
        return view('admin.referrals.show', compact('referral'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReferralRequest $request, Referral $referral)
    {
        $this->update_user($request, $referral);
        $referral->code = $request->code;
        $referral->save();

        return redirect()->route('referrals.show', $referral);
    }

    public function update_user($request, $referral){
        $user = $referral->user;
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referral $referral)
    {
        $defaultReferral = Referral::where('default', true)->first();
        $referral->registers->each->update(['referral_id' => $defaultReferral->id]);
        $user = $referral->user;
        $user->delete();
        $referral->delete();

        return redirect()->route('referrals.index');
    }
}
