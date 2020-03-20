@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.changePassword.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.change-passwords.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="password">{{ trans('global.new_password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                    name="password" id="password">
                @if($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="password-confirm">{{ trans('global.login_password_confirmation') }}</label>
                <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                    type="password" name="password_confirmation" id="password-confirm">
                @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.reset_password') }}
                </button>
            </div>
        </form>
    </div>



    @endsection
