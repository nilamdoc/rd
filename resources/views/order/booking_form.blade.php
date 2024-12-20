@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
  </div>
</nav>   
<div class="container2">
    <!-- Left Side Form -->
    <div class="form-section">
        <h2>Billing Information</h2>
        <form id="contactForm" method="POST" action="{{ route('order.submit') }}" autocomplete="off">
            @csrf <!-- Protect against CSRF attacks -->
            
            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Contact Number with Country Code -->
            <div class="mb-3">
                <label for="contact" class="form-label fw-bold">Contact No.</label>
                <div class="input-group">
                    <select name="phone_code" id="phone_code" class="form-select me-2" style="max-width: 25%;">
                        @foreach ($phoneCodes as $code => $country)
                            <option value="{{ $code }}" {{ old('phone_code') == $code ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}" required placeholder="Enter contact number">
                </div>
                @error('contact')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Country Dropdown -->
            <div class="mb-3">
                <label for="country" class="form-label fw-bold">Country</label>
                <select class="form-select" id="country" name="country" required>
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                @error('country')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Order</button>
        </form>
    </div>

    <!-- Right Side Image -->
    <div class="image-section">
        <img src="https://via.placeholder.com/500x600" alt="Form Image">
    </div>
</div>
<div class="container2 p-20">
    <!-- Left side: QR Code Image -->
    <div class="qr-code">
        <img src="https://via.placeholder.com/500x600" alt="QR Code">
    </div>

    <!-- Right side: Text Description -->
    <div class="description">
        <h2>Scan the QR Code</h2>
        <p>Scan the QR code to access exclusive content or offers. Simply use your smartphone's camera or a QR code reader to unlock amazing opportunities. This feature allows you to quickly connect with the information or service you need.</p>
    </div>
</div>
<hr>
<!-- Heading Section -->
<div class="heading">
    <p>P.S. <span>CHECK OUT WHAT PEOPLE HAVE TO SAY</span> ABOUT THE INNER PERSONALITY IDENTIFICATION REPORT</p>
</div>

<!-- Testimonial Container -->
<div class="testimonial-container">
    @forelse($testimonialsData as $testimonial)
        <div class="testimonial-card">
            <p>"{{ trim($testimonial->testimonial) }}"</p>
            <div class="testimonial-author">
                <div>
                    <div class="name">{{ trim($testimonial->country) }}</div>
                </div>
            </div>
        </div>
    @empty
        <p>No testimonials available at the moment.</p>
    @endforelse
</div>
@endsection
