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
                                <h2>Repurchase History</h2>
                            </div>

                            <div class="box-widget widget-module">
                                <div class="widget-container">
                                    <div class="widget-block">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('site.Product_ID') }}</th>
                                                        <th>{{ __('site.quantity') }}</th>
                                                        <th>{{ __('site.CREATE_TIME') }}</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if ( count($record) > 0 )
                                                        @foreach ($record as $records)
                                                            @if ( $records->product_id > 0 )
                                                                <tr>
                                                                    <td>{{ $records->product_info->product_name_en}}</td>
                                                                    <td style="padding-left:30px;">{{ $records->quantity}}</td>
                                                                    <td>{{ $records->created_at}}</td>

                                                                </tr>
                                                            @endif
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