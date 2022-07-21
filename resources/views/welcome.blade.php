@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@stop

@section('content')
    <p>This is my body content.</p>
@stop

@section('footer')
@parent
@stop



