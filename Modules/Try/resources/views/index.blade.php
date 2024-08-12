@extends('try::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('try.name') !!}</p>
@endsection
