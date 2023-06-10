<!-- <h1>{{ $user->username }}</h1> -->
@extends('layouts.header')

@section('content')

<?php
$f_trust = request('f_trust');

if ($f_trust == '') {
    $f_trust = '-1';
}
?>
<div class="main-container">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="section-header">
                                <h2>{{ __('site.Bonus_Record') }}</h2>
                                <p>{{ __('site.Total') }}: {{number_format( $total, 2)}}</p>
                            </div>

                            <div class="box-widget widget-module">
                                <div class="widget-container">
                                    <div class="widget-block">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>{{ __('site.Username') }}</th>
                                                        <th>{{ __('site.Amount') }}</th>
                                                        <th>{{ __('site.Point1') }}</th>
                                                        @if ($bonus=='static_bonus')
                                                        <th>{{ __('site.Pin') }}</th>
                                                        @else
                                                        <th>{{ __('site.Point2') }}</th>
                                                        @endif
                                                        <th>{{ __('site.DETAIL') }}</th>
                                                        <th>{{ __('site.CREATE_TIME') }}</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                @if ( count($record) > 0 )
                                                    @foreach ($record as $records)
                                                    <tr>
                                                        <td>{{ $records->id}}</td>
                                                        <td>
                                                        @if ( $records->user )
                                                        {{ $records->user->username}}
                                                        @endif
                                                        </td>
                                                        <td>{{number_format( $records->founds, 2)}}</td>
                                                        <td>{{number_format( $records->wallet1, 2)}}</td>
                                                        <td>{{ number_format( $records->wallet2, 2)}}</td>
                                                        <td>
                                                        @if ( Config::get('app.locale') == 'en')
                                                            {{ $records->detailen}}
                                                        @else
                                                        {{ $records->detail}}
                                                        @endif</td>
                                                        <td>{{ $records->add_time}}</td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6">{{ __('site.NO_RECORD') }}</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                            {{ $record->appends(request()->except('page'))->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		@stop