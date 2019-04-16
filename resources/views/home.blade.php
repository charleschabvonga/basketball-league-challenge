@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('global.app_dashboard')</div>

                <div class="panel-body">
                    @lang('You are logged in') {{ Auth::user()->name }}!</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
