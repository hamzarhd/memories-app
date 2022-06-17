@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'users'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Add User') }}</h5>
                </div>
                <form method="post" action="{{ route('users.register') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf


                            @include('alerts.alert')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="fullname" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" required>
                                @include('alerts.feedback', ['field' => 'fullname'])
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('Email address') }}</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email address') }}" required>
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                                <label>{{ __('Age') }}</label>
                                <input type="number" name="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" placeholder="{{ __('Age') }}" min="5" max="120">
                                @include('alerts.feedback', ['field' => 'age'])
                            </div>
                            <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                <label>{{ __('Gender') }}</label>
                                <input type="text" name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" placeholder="{{ __('Gender') }}" >
                                @include('alerts.feedback', ['field' => 'gender'])
                            </div>
                            <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                <label>{{ __('Country') }}</label>
                                <input type="text" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="{{ __('Country') }}" >
                                @include('alerts.feedback', ['field' => 'country'])
                            </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>{{ __('Password') }}</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group">
                            <label>{{ __('Confirm New Password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Sign up') }}</button>
                    </div>
                </form>
            </div>


        </div>

        </div>
    </div>
@endsection
