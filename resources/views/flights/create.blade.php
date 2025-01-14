<div class="container">
    <h1>Create Flight</h1>
    <form action="{{ route('flights.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="departure">Departure:</label>
            <input type="text" class="form-control" id="departure" name="departure" required>
        </div>
        <div class="form-group">
            <label for="arrival">Arrival:</label>
            <input type="text" class="form-control" id="arrival" name="arrival" required>
        </div>
        <div class="form-group">
            <label for="travel_date">Travel Date:</label>
            <input type="date" class="form-control" id="travel_date" name="travel_date" required>
        </div>
        <div class="form-group">
            <label for="passenger_count">Passenger Count:</label>
            <input type="number" class="form-control" id="passenger_count" name="passenger_count" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="airline">Airline:</label>
            <input type="text" class="form-control" id="airline" name="airline" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<style>
.container {
    max-width: 600px;
    margin: 120px auto; /* Prevent overlap with a fixed header */
    padding: 20px;
    background-color: #f8f9fa; /* Light gray background */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds subtle shadow for a polished look */
}

.container h1 {
    text-align: center;
    font-size: 2rem;
    font-family: 'Arial', sans-serif;
    margin-bottom: 20px;
    color: #343a40; /* Neutral dark color */
}

.form-group {
    margin-bottom: 20px; /* Spacing between fields */
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
    color: #495057; /* Darker label color for better readability */
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ced4da; /* Light border for inputs */
    border-radius: 5px;
    box-sizing: border-box;
}

.form-control:focus {
    outline: none;
    border-color: #80bdff; /* Highlighted border on focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Subtle glow on focus */
}

textarea.form-control {
    resize: vertical; /* Allow vertical resizing */
}

.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff; /* White text */
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth hover effects */
    width: 100%; /* Full-width button */
}

.btn-primary:hover {
    background-color: #0056b3; /* Slightly darker blue on hover */
    transform: scale(1.02); /* Gentle zoom on hover */
}

.btn-primary:active {
    background-color: #004085;
    transform: scale(1); /* Return to original size when clicked */
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
