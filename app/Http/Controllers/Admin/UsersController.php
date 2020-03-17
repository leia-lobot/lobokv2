<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Don't get Admin if not Admin
        if (auth()->user()->is_admin)
            $roles = Role::all()->pluck('title', 'id');
        else {
            $roles = Role::where('id', '!=', 1)->get()->pluck('title', 'id');
        }

        $companies = Company::all()->pluck('name', 'id');

        return view('admin.users.create', compact('roles', 'companies'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->companies()->sync($request->input('companies', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Don't get Admin if not Admin
        if (auth()->user()->is_admin)
            $roles = Role::all()->pluck('title', 'id');
        else {
            $roles = Role::where('id', '!=', 1)->get()->pluck('title', 'id');
        }

        $companies = Company::all()->pluck('name', 'id');

        $user->load('roles', 'companies');

        return view('admin.users.edit', compact('roles', 'companies', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        $user->roles()->sync($request->input('roles', []));

        $user->companies()->sync($request->input('companies', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'companies', 'userUserAlerts');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
