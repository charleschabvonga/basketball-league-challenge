@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.games.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.games.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('team1_id', trans('global.games.fields.team1').'', ['class' => 'control-label']) !!}
                    {!! Form::select('team1_id', $team1s, old('team1_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block">Team1</p>
                    @if($errors->has('team1_id'))
                        <p class="help-block">
                            {{ $errors->first('team1_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('team2_id', trans('global.games.fields.team2').'', ['class' => 'control-label']) !!}
                    {!! Form::select('team2_id', $team2s, old('team2_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block">Team2</p>
                    @if($errors->has('team2_id'))
                        <p class="help-block">
                            {{ $errors->first('team2_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start_time', trans('global.games.fields.start-time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('start_time', old('start_time'), ['class' => 'form-control datetime', 'placeholder' => 'YYYY-MM-DD HH:MM:SS']) !!}
                    <p class="help-block">YYYY-MM-DD HH:MM:SS</p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('result1', trans('global.games.fields.result1').'', ['class' => 'control-label']) !!}
                    {!! Form::number('result1', old('result1'), ['class' => 'form-control', 'placeholder' => '0']) !!}
                    <p class="help-block">0</p>
                    @if($errors->has('result1'))
                        <p class="help-block">
                            {{ $errors->first('result1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('result2', trans('global.games.fields.result2').'', ['class' => 'control-label']) !!}
                    {!! Form::number('result2', old('result2'), ['class' => 'form-control', 'placeholder' => '0']) !!}
                    <p class="help-block">0</p>
                    @if($errors->has('result2'))
                        <p class="help-block">
                            {{ $errors->first('result2') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop