@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <h1>Contact List</h1>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add new contact</a>

    <div class="row justify-content-center">

      <div class="col-md-8">
          <form method="get" action="{{ route('search.result') }}" class="mr-auto d-flex">
            <input type="text" name="query" value="{{ isset($searchterm) ? $searchterm : ''  }}" class="form-control"  placeholder="Search First Name" aria-label="Search">
            <button class="btn btn-outline-primary ml-2" type="submit">Search</button>
          </form>
          <br>


          @if(isset($searchResults))
              @if ($searchResults-> isEmpty())
                  <h2>Sorry, no results found for the term <b>"{{ $searchterm }}"</b>.</h2>
              @else
                  <h2>There are {{ $searchResults->count() }} results for the term <b>"{{ $searchterm }}"</b></h2>
                  <hr />
                  @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                  <h2>{{ ucwords($type) }}</h2>
  
                  @foreach($modelSearchResults as $searchResult)
                      <ul>
                              <a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                      </ul>
                  @endforeach
                  @endforeach
              @endif
          @endif
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
                <a href="{{ route('contacts.show', $contact) }}">View</a>
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

    {{$contacts->links()}}
</div>
@endsection
