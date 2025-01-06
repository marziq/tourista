@extends('master.layout')

@section('content')
<style>
    .home {
        position: relative;
        height:150px; /* Adjust height as needed */
        background-color: #f8f9fa; /* Optional: Background color in case the image doesn't load */
    }

    .home_title {
        font-size: 3rem; /* Adjust font size */
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase; /* Optional: Uppercase title */
    }

    .price {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .quantity-control {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .quantity-control button {
        width: 30px;
        height: 30px;
        border: 1px solid #ddd;
        background-color: #fff;
        font-size: 18px;
        cursor: pointer;
    }

    .quantity-control input {
        width: 50px;
        height: 30px;
        text-align: center;
        border: 1px solid #ddd;
        margin: 0 5px;
    }

    .payment-container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        max-width: 600px;
        margin: auto;
    }

    /* Styling for the image */
    .attraction-image {
        width: 100%;  /* Make the image fill the container */
        height: auto;  /* Maintain aspect ratio */
        max-width: 400px;  /* Set a maximum width for the image */
        object-fit: cover;  /* Ensure the image covers the area without stretching */
        margin-bottom: 20px;  /* Add some space below the image */
    }
</style>

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/about_background.jpg"></div>
    <div class="home_content">
        <div class="home_title">Attractions</div>
    </div>
</div>
<div class="container my-4">
    <h1>Payment Details</h1>
    <div class="payment-container shadow-sm">
        <h5>Place: {{ $paymentDetails['place'] }}</h5>
        <p>Description: {{ $paymentDetails['description'] }}</p>
        <p>Price per unit: RM {{ number_format($paymentDetails['price'], 2) }}</p>
        <p>Quantity: {{ $paymentDetails['quantity'] }}</p>
        <p>Total Price: RM {{ number_format($paymentDetails['total_price'], 2) }}</p>
        <form action="{{ route('completePayment') }}" method="POST" id="payment-form">
            @csrf
            <input type="hidden" name="place" value="{{ $paymentDetails['place'] }}">
            <input type="hidden" name="description" value="{{ $paymentDetails['description'] }}">
            <input type="hidden" name="price" value="{{ $paymentDetails['price'] }}">
            <input type="hidden" name="quantity" value="{{ $paymentDetails['quantity'] }}">
            <input type="hidden" name="total_price" value="{{ $paymentDetails['total_price'] }}">
            <button type="submit" class="btn btn-primary mt-3" id="payment-button">Complete Payment</button>
        </form>
    </div>
</div>

<!-- Payment Completed Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentModalLabel">Payment Completed</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Your payment has been successfully completed. Thank you for your purchase!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Show the modal after successful form submission
    document.getElementById('payment-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting immediately
        const form = this;

        // Submit the form after a short delay
        setTimeout(function() {
            // You can implement form submission logic here if needed

            // Show the modal after submitting the form
            var paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
            paymentModal.show();

            // Optionally, automatically submit the form
            form.submit();
        }, 500); // Delay in milliseconds before showing the modal (optional)
    });
</script>
@endsection

