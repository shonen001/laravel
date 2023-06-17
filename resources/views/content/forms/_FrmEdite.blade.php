@extends('layouts/main')
@section('content')
    <form  action="{{route('Contact.sbmtedite', $contact->id) }}" method="POST">
        @method('PUT')
        @csrf
        @include('content/outsayd/edite')
    </form>
@endsection
