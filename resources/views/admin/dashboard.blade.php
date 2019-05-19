@extends('layout.admin')

@section('content')
    <!-- Page Content -->
    <section>
        {{Auth::user()->username}}
    </section>
@endsection