@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@stop

@section('content')

    <div id="app">

        <client></client>

    </div>

@stop

@section('footer')
@parent
@stop
