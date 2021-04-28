<?php

namespace App\Http\Controllers\Admins;

use App\Models\Role;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Gate::allows('accessRoles')) {
            return Inertia::render('Admin/Roles/Index', [
                'roles' => Role::all()
            ]);
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (Gate::allows('manageRoles')) {
            return Inertia::render('Admin/Roles/Create');
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Gate::allows('manageRoles')) {
            $request->validate([
                'name' => 'required',
            ]);
            Role::create($request->only(['name']));
            return redirect(route('admin.roles.index'))->withSuccess('Role created successfully!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role) {
        if (Gate::allows('accessRoles')) {
            return Inertia::render('Admin/Roles/Show', [
                'role' => $role,
            ]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role) {
        if (Gate::allows('manageRoles')) {
            $request->validate([
                'name' => 'required',
            ]);
            $role->update($request->only(['name']));
            return redirect(route('admin.roles.index'))->withSuccess('Role updated successfully!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role) {
        if (Gate::allows('manageRoles')) {
            $role->delete();
            return redirect(route('admin.roles.index'))->withSuccess('Role deleted successfully!');
        }
        return back();
    }
}
