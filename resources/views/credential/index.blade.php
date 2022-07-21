@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@stop

@section('content')

    <div id="app">

        <credential></credential>

    </div>

@stop

@section('footer')
@parent
@stop
