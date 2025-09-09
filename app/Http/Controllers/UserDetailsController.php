<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userDetails = UserDetails::all();
        return view('user-details.index', compact('userDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user-details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_details',
            'phone' => 'nullable|string|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        UserDetails::create($request->all());

        return redirect()->route('user-details.index')
            ->with('success', 'User details created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDetails $userDetails)
    {
        return view('user-details.show', compact('userDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserDetails $userDetails)
    {
        return view('user-details.edit', compact('userDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserDetails $userDetails)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_details,email,' . $userDetails->id,
            'phone' => 'nullable|string|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userDetails->update($request->all());

        return redirect()->route('user-details.index')
            ->with('success', 'User details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDetails $userDetails)
    {
        $userDetails->delete();
        return redirect()->route('user-details.index')
            ->with('success', 'User details deleted successfully.');
    }
}
