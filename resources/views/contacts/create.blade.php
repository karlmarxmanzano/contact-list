@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		@if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Add new contact</h5>
				<form id="post-form" action="{{ route('contacts.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('POST')
					@include('contacts._form')
				</form>
			</div>
		</div>
  </div>
</div>
@endsection