@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div>
		
	</div>

    <div class="row justify-content-center">

      <div class="col-md-8">

    <h1 class="text-center">Contact List</h1>
    
		<a href="{{ route('contacts.create') }}" class="btn btn-primary mb-4">Add new contact</a>

      </div>
  </div>

    @foreach($contacts as $contact)
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

              {{-- <div class="card">
              <div class="card-header">{{ $contact->first_name }} {{ $contact->last_name }}</div>
              <p>{{ $contact->email }}</p>
              <p>{{ $contact->contact_number }}</p>
              <a href="{{ route('contacts.show', $contact) }}">View</a>
              <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
              <a href="" class="btn btn-outline-danger btn-sm" role="button" onclick="event.preventDefault(); document.getElementById('delete-contact').submit();">
                Delete
              </a>
              <form id="delete-contact" action="{{ route('contacts.destroy', $contact) }}" method="post" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            </div> --}}
          </div>
      </div>
    @endforeach

    <div class="row justify-content-center">
      {{$contacts->links()}}
    </div>
</div>
@endsection
