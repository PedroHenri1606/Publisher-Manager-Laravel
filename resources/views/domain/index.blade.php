@extends('layout.template')

@section('title', 'Index')

@section('content')

@include('layout._partials.navbar')

@livewire('domain-index')

@endsection