<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ZoomDate;
use App\Exports\RegistersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreZoomDateRequest;
use App\Http\Requests\UpdateZoomDateRequest;

class ZoomDateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.zoom-dates.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.zoom-dates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreZoomDateRequest $request)
    {
        $user = auth()->user();
        $referral = $user->referral;

        $zoomDate = new ZoomDate();
        $zoomDate->referral_id = $referral->id;
        $zoomDate->date = Carbon::parse($request->date);
        $zoomDate->time = Carbon::parse($request->time);
        $zoomDate->join_url = $request->join_url;
        $zoomDate->password = $request->password;
        $zoomDate->participants = $request->participants;
        $zoomDate->active = $request->has('active') ? true : false;

        $zoomDate->save();

        return redirect()->route('zoom-dates.show', $zoomDate);
    }

    /**
     * Display the specified resource.
     */
    public function show(ZoomDate $zoomDate)
    {
        return view('admin.zoom-dates.show', compact('zoomDate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ZoomDate $zoomDate)
    {
        return view('admin.zoom-dates.edit', compact('zoomDate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateZoomDateRequest $request, ZoomDate $zoomDate)
    {
        $zoomDate->date = Carbon::parse($request->date);
        $zoomDate->time = Carbon::parse($request->time);
        $zoomDate->join_url = $request->join_url;
        $zoomDate->password = $request->password;
        $zoomDate->participants = $request->participants;
        $zoomDate->active = $request->has('active') ? true : false;

        $zoomDate->save();

        return redirect()->route('zoom-dates.show', $zoomDate);
    }

    public function end(ZoomDate $zoomDate){
        $zoomDate->active = false;
        $zoomDate->save();
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ZoomDate $zoomDate)
    {   
        $zoomDate->delete();

        return redirect()->route('dashboard');
    }

    public function export(ZoomDate $zoomDate){
        $date = Carbon::parse($zoomDate->date)->format('d-m-Y');
        $filename = "registros-{$date}.xlsx";
        return Excel::download(new RegistersExport($zoomDate->id), $filename);
    }
}
