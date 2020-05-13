<div class="form-group">
  <label for="first_name">First Name</label>
  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') ?? $contact->first_name ?? '' }}" autocomplete="first_name">

  @error("first_name")
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="form-group">
  <label for="last_name">Last Name</label>
  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') ?? $contact->last_name ?? '' }}" autocomplete="last_name">

  @error("first_name")
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="form-group">
  <label for="email">Email</label>
  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $contact->email ?? '' }}" autocomplete="email">

  @error("email")
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="form-group">
  <label for="contact_number">Contact Number</label>
  <input type="text" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" value="{{ old('contact_number') ?? $contact->contact_number ?? '' }}" autocomplete="contact_number">

  @error("contact_number")
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<button type="submit" class="btn btn-primary">Save</button>