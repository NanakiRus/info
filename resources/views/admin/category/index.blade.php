@extends('admin.layout')

@section('content')
    @foreach($categories as $category)
        {{ $category }}
    @endforeach
@endsection