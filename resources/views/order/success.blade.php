@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
  </div>
</nav>   
<div class="container3">
    <h1>Thank You for Your Order!</h1>
    <p>We have received your order and will process it shortly. You will receive a confirmation email once your order has been shipped.</p>
    
    <div class="order-info">
        <h3>Order Details:</h3>
        <p><strong>Order Number:</strong> {{ $orderNumber }}</p>
        <p><strong>Order Date:</strong>  {{ $orderDate }}</p>
    </div>

    <a href="{{ url('') }}" class="button">Go to Homepage</a>
</div>
@endsection
