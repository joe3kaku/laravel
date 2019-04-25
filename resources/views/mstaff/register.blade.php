@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('社員登録') }}</div>
                <div class="card-body">
                    <form method="POST" action="registerStaff">
                        @csrf
                        <div class="form-group row">
                            <label for="Staff_ID" class="col-md-4 col-form-label text-md-right">{{ __('社員ID') }}</label>

                            <div class="col-md-6">
                                <input id="Staff_ID" type="text" class="form-control{{ $errors->has('Staff_ID') ? ' is-invalid' : '' }}" name="Staff_ID" value="{{ old('Staff_ID') }}" required autofocus>
                                @if ($errors->has('Staff_ID'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Staff_ID') }}</strong>
                                    </span>
                                @endif
                                @if (Session::has('doubleCheck'))
                                    <div class="alert alert-danger" role="alert"><strong>{{ session('doubleCheck') }}</strong></div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Staff_Name" class="col-md-4 col-form-label text-md-right">{{ __('社員名') }}</label>

                            <div class="col-md-6">
                                <input id="Staff_Name" type="text" class="form-control{{ $errors->has('Staff_Name') ? ' is-invalid' : '' }}" name="Staff_Name" required>

                                @if ($errors->has('Staff_Name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Staff_Name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if (Session::has('login'))
                            <div class="alert alert-danger" role="alert"><strong>{{ session('login') }}</strong></div>
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @if (Session::has('DataInsert'))
                        <div class="alert alert-success" role="alert"><strong>{{ session('DataInsert') }}</strong></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
