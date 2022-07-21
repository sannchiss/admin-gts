@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@stop

@section('content')

    <div id="app">

        <company></company>

    </div>

@stop

@section('footer')
@parent
@stop
