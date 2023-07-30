@extends('layouts/main')
@section('content')

    <form action="{{ route('Contact.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('content/outsayd/edite')
    </form>

@endsection
