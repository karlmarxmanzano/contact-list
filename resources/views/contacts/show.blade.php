@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card">
      <div class="card-header">{{ $contact->first_name }} {{ $contact->last_name }}</div>
      <p>{{ $contact->email }}</p>
      <p>{{ $contact->contact_number }}</p>
      <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
      <a href="" class="btn btn-outline-danger btn-sm" role="button" onclick="event.preventDefault(); document.getElementById('delete-contact').submit();">
        Delete
      </a>
      <form id="delete-contact" action="{{ route('contacts.destroy', $contact) }}" method="post" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    </div>
  </div>
</div>
</div>
@endsection
