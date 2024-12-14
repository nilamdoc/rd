@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="container">
    <div class="row">
        <!-- Left Side - Form -->
        <div class="col-md-6 form-container">
            <h2>Contact Form</h2>
            <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                @csrf <!-- Protect against CSRF attacks -->
                
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="contact" class="form-label fw-bold">Contact No.</label>
					<div class="input-group">
						<select name="phone_code" id="phone_code" class="phone-select form-control me-2" style="width:20%">
							@foreach ($phoneCodes as $code => $country)
								<option value="{{ $code }}" {{ old('phone_code') == $code ? 'selected' : '' }}>
									{{ $country }}
								</option>
							@endforeach
						</select>
						<input type="text" class="form-control w-75" id="contact" name="contact" value="{{ old('contact') }}" required placeholder="Enter contact number">
						@error('contact')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>

                </div>
                
                <div class="mb-3">
                    <label for="country" class="form-label fw-bold">Country</label>
                    <select class="form-control" id="country" name="country" required>
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}">
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                    @error('country')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>

        <!-- Right Side - Image -->
        <div class="col-md-6 image-container">
            <img src="https://via.placeholder.com/500" alt="Image" class="img-fluid" />
        </div>
    </div>
</div>
@endsection
