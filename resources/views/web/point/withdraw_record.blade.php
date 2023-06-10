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
                                <h2>{{ __('site.Withdraw_Record') }}</h2>
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
                                                        <th>{{ __('site.Bank Name') }}</th>
                                                        <th>{{ __('site.Bank Account Name') }}</th>
                                                        <th>{{ __('site.Bank Account Number') }}</th>
                                                        <th>{{ __('site.Bank Branch') }}</th>
                                                        <th>{{ __('site.Amount') }}</th>
                                                        <th>{{ __('site.AMOUNT_RECEIVED') }}</th>
                                                        <th>{{ __('site.STATUS') }}</th>
                                                        <th>{{ __('site.REMARK') }}</th>
                                                        <th>{{ __('site.CREATE_TIME') }}</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                @if ( count($record) > 0 )
                                                    @foreach ($record as $records)
                                                    <tr>
                                                        <td>{{ $records->id}}</td>
                                                        <td>{{ $records->user->username}}</td>
                                                        <td>{{ $records->bank_name}}</td>
                                                        <td>{{ $records->bank_user}}</td>
                                                        <td>{{ $records->bank_number}}</td>
                                                        <td>{{ $records->branch}}</td>
                                                        <td>USD {{ $records->amount}}</td>
                                                        <td>USD {{ ($records->get_amount)}}</td>
                                                        <td>{{ $records->status_remark}}</td>
                                                        <td>{{ $records->remark}}</td>
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