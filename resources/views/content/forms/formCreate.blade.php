@extends('layouts/main')
@section('content')
    <form  action="{{ route('Contact.store') }}" method="POST">
        @csrf
        @include('content/outsayd/createContact')
    </form>
@endsection
