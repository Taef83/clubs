<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class AdminController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $admins = Admin::paginate(30);
        return view('control.admins.index', compact('admins'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('control.admins.add');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'admin_name'        => 'required|string|max:255',
            'admin_email'       => 'required|string|email|max:255|unique:admin,admin_email',
            'password'          => 'required|string|min:8',
            'admin_phone'       => 'required|numeric|saudi_phone|unique:admin,admin_phone'
        ]);

        Admin::create([
            'admin_name'        => $request->admin_name,
            'admin_email'       => $request->admin_email,
            'admin_password'    => Hash::make($request->password),
            'admin_phone'       => $request->admin_phone
        ]);

        return redirect()->route('control.admins.index')->with('success', 'You have created item in database successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit(Admin $admin)
    {
        $item = $admin;
        return view('control.admins.edit', compact('admin', 'item'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'admin_name'        => 'required|string|max:255',
            'admin_email'       => 'required|string|email|max:255|unique:admin,admin_email,' . $admin->id . ',admin_id',
            'password'          => 'nullable|string|min:8',
            'admin_phone'       => 'required|numeric|saudi_phone|unique:admin,admin_phone,' . $admin->id . ',admin_id'
        ]);

        $admin->update([
            'admin_name'        => $request->admin_name,
            'admin_email'       => $request->admin_email,
            'admin_password'    => $request->password ? Hash::make($request->password) : $admin->admin_password,
            'admin_phone'       => $request->admin_phone
        ]);

        return redirect()->route('control.admins.index')->with('success', 'You have updated item in database successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Admin $admin)
    {
        abort_if(in_array($admin->id, [1]), 404);
        $admin->delete();
        return redirect()->route('control.admins.index')->with('success', 'You have delete item from database successfully.');
    }
}
