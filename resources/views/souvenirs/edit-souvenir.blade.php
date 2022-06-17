@extends('layouts.app', ['page' => __('Souvenirs management'), 'pageSlug' => 'souvenirs'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Edit Souvenir') }}</h5>
            </div>
            <form method="post" action="{{ route('souvenirs.update') }}" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('put')

                    <input type="hidden" name="id"    value="{{$souvenir->id}}">


                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label>{{ __('Name') }} <span class="text-danger">&#42;</span></label>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$souvenir->name}}" required>
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>


                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                        <label>{{ __('Note') }}</label>
                        <textarea  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Note') }}" name="description" id="description"  style="width: 100%" rows="6"
                                              >{{$souvenir->name}}</textarea>
                        @include('alerts.feedback', ['field' => 'description'])
                    </div>

                    <div class="form-group{{ $errors->has('souvenir_date') ? ' has-danger' : '' }}">
                        <label>{{ __('Souvenir Date') }} <span class="text-danger">&#42;</span></label>
                        <input type="date" name="souvenir_date" class="form-control{{ $errors->has('souvenir_date') ? ' is-invalid' : '' }}" placeholder="{{ __('memory date') }}" value="{{$souvenir->souvenir_date}}" required>

                        @include('alerts.feedback', ['field' => 'souvenir_date'])
                    </div>

                    <div class="form-group">
                        <input type="file" name="file" accept="image/*" class="form-control">
                        <label for="file">
                                <i class="tim-icons icon-camera-18"></i>                   
                           choose a photo </label>
                    </div>

                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>


    </div>
</div>
@endsection
