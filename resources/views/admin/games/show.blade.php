@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.games.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.games.fields.team1')</th>
                            <td field-key='team1'>{{ $game->team1->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.games.fields.team2')</th>
                            <td field-key='team2'>{{ $game->team2->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.games.fields.start-time')</th>
                            <td field-key='start_time'>{{ $game->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.games.fields.result1')</th>
                            <td field-key='result1'>{{ $game->result1 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.games.fields.result2')</th>
                            <td field-key='result2'>{{ $game->result2 }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.games.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
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
