<!-- resources/views/components/layout.blade.php -->
@extends('layouts.app')

@section('title', $title ?? 'Default Title')

@section('content')
    {{ $slot }}
@endsection
