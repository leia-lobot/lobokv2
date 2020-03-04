@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reservation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reservations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.reservation.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date"
                    id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                <div class="invalid-feedback">
                    {{ $errors->first('date') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.reservation.fields.start_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text"
                    name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                <div class="invalid-feedback">
                    {{ $errors->first('start_time') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stop_time">{{ trans('cruds.reservation.fields.stop_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('stop_time') ? 'is-invalid' : '' }}" type="text"
                    name="stop_time" id="stop_time" value="{{ old('stop_time') }}" required>
                @if($errors->has('stop_time'))
                <div class="invalid-feedback">
                    {{ $errors->first('stop_time') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.stop_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="resource_id">{{ trans('cruds.reservation.fields.resource') }}</label>
                <select class="form-control select2 {{ $errors->has('resource') ? 'is-invalid' : '' }}"
                    name="resource_id" id="resource_id" required>
                    @foreach($resources as $id => $resource)
                    <option value="{{ $id }}" {{ old('resource_id') == $id ? 'selected' : '' }}>{{ $resource }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource'))
                <div class="invalid-feedback">
                    {{ $errors->first('resource') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.resource_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_id">{{ trans('cruds.reservation.fields.company') }}</label>
                <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}" name="company_id"
                    id="company_id" required>
                    @foreach($companies as $id => $company)
                    <option value="{{ $id }}" {{ old('company_id') == $id ? 'selected' : '' }}>{{ $company }}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                <div class="invalid-feedback">
                    {{ $errors->first('company') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extras">{{ trans('cruds.reservation.fields.extras') }}</label>
                <input class="form-control {{ $errors->has('extras') ? 'is-invalid' : '' }}" type="text" name="extras"
                    id="extras" value="{{ old('extras', '') }}">
                @if($errors->has('extras'))
                <div class="invalid-feedback">
                    {{ $errors->first('extras') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.extras_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
