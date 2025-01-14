<style>
    .container {
        max-width: 600px;
        margin: 120px auto; /* Ensures it doesn't overlap with a fixed header */
        padding: 20px;
        background-color: #f8f9fa; /* Light background */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds subtle shadow */
    }

    .container h1 {
        text-align: center;
        font-size: 2rem;
        font-family: 'Arial', sans-serif;
        margin-bottom: 20px;
        color: #343a40; /* Neutral dark color */
    }

    .form-group {
        margin-bottom: 20px; /* Spacing between form fields */
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        font-family: 'Arial', sans-serif;
        color: #495057; /* Darker label color */
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ced4da; /* Subtle border for inputs */
        border-radius: 5px;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #80bdff; /* Blue border on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Glowing focus effect */
    }

    textarea.form-control {
        resize: vertical; /* Allow vertical resizing of text areas */
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff; /* White text for the button */
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth hover effects */
        width: 100%; /* Full-width for buttons */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker blue on hover */
        transform: scale(1.02); /* Slight scale on hover */
    }

    .btn-primary:active {
        background-color: #004085;
        transform: scale(1); /* Returns to original size when clicked */
    }

    @media (max-width: 768px) {
        .container {
            margin: 80px 15px;
            padding: 15px;
        }

        .btn-primary {
            font-size: 14px;
            padding: 10px;
        }
    }
    </style>
<div class="container">
    <h1>Edit Hotel</h1>
    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $hotel->location }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $hotel->price }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $hotel->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="check_in">Check In:</label>
            <input type="date" class="form-control" id="check_in" name="check_in" value="{{ $hotel->check_in }}" required>
        </div>
        <div class="form-group">
            <label for="check_out">Check Out:</label>
            <input type="date" class="form-control" id="check_out" name="check_out" value="{{ $hotel->check_out }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
