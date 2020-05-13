@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">{{ $contact->first_name }} {{ $contact->last_name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $contact->email }}</h6>
        <p class="card-text">{{ $contact->contact_number }}</p>
        <a href="{{ route('contacts.show', $contact) }}" class="card-link">View</a>
        <a href="{{ route('contacts.edit', $contact) }}" class="card-link">Edit</a>
        <a href="" class="card-link text-danger" role="button" onclick="event.preventDefault(); document.getElementById('delete-contact').submit();">
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
</div>
@endsection
