@extends('layout.app')

@section('title', 'about')

@section('body')

    @unless($values)
        There is no data
    @endunless

    @foreach($values as $value)
        {{$value}}
    @endforeach

 @endsection