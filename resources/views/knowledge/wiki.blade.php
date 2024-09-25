@extends('layouts.wiki')
@section('content')

{{--@include('knowledge.wiki._table', ['datas' => $datas])--}}
@include('knowledge.wiki._base', ['datas' => $datas])
@include('knowledge.wiki._info', ['datas' => $datas])
@include('knowledge.wiki._picture', ['datas' => $datas])
@include('knowledge.wiki._about', ['datas' => $datas])
@include('knowledge.wiki._footer', ['datas' => $datas])

@endsection
