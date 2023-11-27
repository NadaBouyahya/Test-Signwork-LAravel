<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgencyStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agency = Agency::paginate(10);
        return response()->json($agency);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('logo')->store('images', 'public');
        $agency = Agency::create([
            'name' => $request->name,
            'logo' => $path,
            'website' => $request->website,
            'email' => $request->email
        ]);
        return response()->json($agency);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        return response()->json($agency);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        $path = $request->file('logo')->store('images', 'public');
        $upadate_agency = $agency->update([
            'name' => $request->name,
            'logo' => $path,
            'website' => $request->website,
            'email' => $request->email
        ]);
        return response()->json($upadate_agency);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();
        return response()->json(NULL);
    }
}
