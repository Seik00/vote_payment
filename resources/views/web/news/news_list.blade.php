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
                                <h2>{{ __('site.Notice') }}</h2>
                            </div>

                            <div class="box-widget widget-module">
                                <div class="widget-container">
                                    <div class="widget-block">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>{{ __('site.TITLE') }}</th>
                                                        <th>{{ __('site.DESCRIPTION') }}</th>
                                                        <th>{{ __('site.CREATE_TIME') }}</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if ( count($info) > 0 )
                                                        @foreach ($info as $infos)
                                                        <tr>
                                                            <td>{{ $infos->id}}</td>
                                                            <td>{{ $infos->title}}</td>
                                                            <td>{{ $infos->created_at}}</td>
                                                            <td><a href="{{ route('news_detail')}}?news_id={{ $infos->id}}"><button type="button" class="btn btn-primary">{{ __('site.READ_MORE') }}</button></a></td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="6">{{ __('site.NO_RECORD') }}</td>
                                                        </tr>
                                                        @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		@stop