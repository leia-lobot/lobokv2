<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateChangePasswordRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('change_password_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.changePasswords.index');
    }

    public function update(UpdateChangePasswordRequest $request)
    {
        abort_if(Gate::denies('change_password_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();

        $user->update($request->all());

        //TODO: Add status message
        return redirect()->route('admin.home');
    }
}
