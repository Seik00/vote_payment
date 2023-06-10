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
                                <h2>{{ __('site.Wallet_Record') }}</h2>
                            </div>
                            <div class="full-tab-container">
                                <ul class="main-tab nav nav-tabs">
                                    @if ($wallet=='point1')
                                    <li class="active"><a href="{{ route('webwalletRecord')}}?wallet=point1">Cash Wallet</a></li>
                                    @else
                                    <li><a href="{{ route('webwalletRecord')}}?wallet=point1">Cash Wallet</a></li>
                                    @endif
                                    <li><a href="{{ route('webwalletRecord')}}?wallet=point2"><i class="fa icon-faces-users-04"></i> Redeem Wallet</a>
                                    </li>
                                    <li><a href="{{ route('webwalletRecord')}}?wallet=pin"><i class="fa icon-faces-users-04"></i> Activation Wallet</a>
                                    </li>
                                    <li><a href="{{ route('webwalletRecord')}}?wallet=point3"><i class="fa icon-faces-users-04"></i> Registration Wallet</a>
                                    </li>
                                </ul>
                                <div class="main-tab-content tab-content" style="margin: 0px 0px">
                                    <div class="tab-pane active">
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
                                                        <td>{{ number_format($records->found, 2)}}</td>
                                                        <td>
                                                        @if ( Config::get('app.locale') == 'en')
                                                            {{ $records->detailen}}
                                                        @else
                                                        {{ $records->detail}}
                                                        @endif</td>
                                                        <td>{{ $records->created_at}}</td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6">No Record</td>
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
                    </div>
                </div>
            </div>
		@stop