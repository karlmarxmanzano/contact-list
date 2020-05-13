@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
		@if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Edit contact</h5>
				<form id="post-form" action="{{ route('contacts.update', $contact) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					@include('contacts._form')
				</form>
			</div>
		</div>
  </div>
</div>
@endsection