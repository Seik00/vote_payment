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
                                <h2>{{ __('site.Deposit_Record') }}</h2>
                            </div>

                            <div class="box-widget widget-module">
                                <div class="widget-container">
                                    <div class="widget-block">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>{{ __('site.Amount') }}</th>
                                                        <th>{{ __('site.STATUS') }}</th>
                                                        <th>{{ __('site.BANNER') }}</th>
                                                        
                                                        <th>{{ __('site.CREATE_TIME') }}</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if ( count($record) > 0 )
                                                        @foreach ($record as $records)
                                                        <tr>
                                                            <td>{{ $records->id}}</td>
                                                            <td>{{ $records->amount}}</td>
                                                            <td>
                                                            @if ( $records->status == 0 )
                                                            {{ __('site.PENDING') }}
                                                            @elseif ( $records->status == 1 )
                                                            {{ __('site.APPROVE') }}
                                                            @else
                                                            {{ __('site.REJECTED') }}
                                                            @endif
                                                            </td>
                                                            <td>
                                                                @if ( count($records->uploaded_file) > 0 )
                                                                <a target="_blank" href="{{ $records->uploaded_file[0]->public_image_path }}"> <img src="{{ $records->uploaded_file[0]->public_image_path }}" width="150px" height="150px"></a>
                                                                @endif
                                                            </td>
                                                            <td>{{ $records->created_at}}</td>
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