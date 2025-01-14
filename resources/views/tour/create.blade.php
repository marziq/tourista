<div class="container">
    <h1>Create Tour</h1>
    <form action="{{ route('tours.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="destination">Description:</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<style>
    /* filepath: /c:/xampp/htdocs/tourista/public/css/styles.css */
.container {
    max-width: 600px;
    margin: 120px auto; /* Prevent overlap with fixed headers */
    padding: 20px;
    background-color: #f8f9fa; /* Light gray background */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.container h1 {
    text-align: center;
    font-size: 2rem;
    font-family: 'Arial', sans-serif;
    margin-bottom: 20px;
    color: #343a40; /* Neutral dark gray for contrast */
}

.form-group {
    margin-bottom: 20px; /* Consistent spacing between form fields */
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
    color: #495057; /* Darker text for better readability */
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
    border-color: #80bdff; /* Highlight color on focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Focus glow effect */
}

textarea.form-control {
    resize: vertical; /* Allow resizing in vertical direction only */
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
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth interaction */
    width: 100%; /* Full-width button for responsive design */
}

.btn-primary:hover {
    background-color: #0056b3; /* Slightly darker blue shade */
    transform: scale(1.02); /* Small zoom-in effect */
}

.btn-primary:active {
    background-color: #004085;
    transform: scale(1); /* Reset zoom */
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
