
<style>
/* Adjust the container to prevent overlap with the fixed header */
.container {
    max-width: 600px;
    margin: 120px auto; /* Increased margin-top to account for the header */
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

header {
    position: fixed; /* Keeps the header fixed at the top */
    top: 0;
    left: 0;
    width: 100%;
    height: 60px; /* Adjust this based on your actual header height */
    background-color: #fff;
    border-bottom: 1px solid #ddd;
    z-index: 10;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Ensure the body or main content starts below the header */
body {
    padding-top: 70px; /* Adjust to match your header height + spacing */
}

.container h1 {
    text-align: center;
    font-size: 2rem;
    font-family: 'Arial', sans-serif;
    margin-bottom: 20px;
    color: #343a40;
}

/* Retaining the same form and button styles as before */
.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
    color: #495057;
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-control:focus {
    outline: none;
    border-color: #80bdff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

textarea.form-control {
    resize: vertical;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 100%;
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.02);
}

.btn-primary:active {
    background-color: #004085;
    transform: scale(1);
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
    <h1 class="cont-h1">Create Hotel</h1>
    <form action="{{ route('hotels.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="check_in">Check In:</label>
            <input type="date" class="form-control" id="check_in" name="check_in" required>
        </div>
        <div class="form-group">
            <label for="check_out">Check Out:</label>
            <input type="date" class="form-control" id="check_out" name="check_out" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
