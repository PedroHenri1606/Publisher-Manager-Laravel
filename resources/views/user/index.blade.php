@extends('layout.template')

@section('title', 'Home')

@section('content')

@include('layout._partials.navbar')

@livewire('find')

@endsection