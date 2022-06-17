@extends('layouts.app', ['page' => __('Souvenir management'), 'pageSlug' => 'souvenirs'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Show Souvenir Details') }}</h5>
            </div>
                <div class="card-body">
                    @csrf




                    <div class="form-group">
                        <label style="font-size: 18px;">{{ __('Souvenir Name') }}: </label>
                        <label style="font-size: 15px;margin-left: 20px;">{{$souvenir->name}}</label>

                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px;">{{ __('Note') }}: </label>
                        <label style="font-size: 15px;margin-left: 20px;">{{$souvenir->description}}</label>

                    </div>


                    <div class="form-group">
                        <label style="font-size: 18px;">{{ __('Souvenir Date') }}: </label>
                        <label style="font-size: 15px;margin-left: 20px;">{{$souvenir->souvenir_date}}</label>

                    </div>


                    <div class="form-group">
                        <label style="font-size: 18px;">{{ __('Date of creation') }} :</label>
                        <label style="font-size: 15px;margin-left: 20px;">{{$souvenir->created_at}}</label>

                    </div>
                    @if($souvenir->path != null || trim($souvenir->path) != '')
                    <div class="row">

                        <img src="{{route("souvenirs.image",$souvenir->id)}}" style="min-height: 200px;max-height: 200px;margin: 15px">
                      </div>
                      @endif
                </div>

        </div>


    </div>

</div>
@endsection
