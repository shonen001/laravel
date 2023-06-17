@extends('layouts/main')
@section('content')
    <form  action="{{ route('Contact.Insert') }}" method="POST">
        @csrf
        @include('content/outsayd/createContact')
    </form>
@endsection
