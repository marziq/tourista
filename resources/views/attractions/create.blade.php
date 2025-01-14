
<div class="container">
    <h1>Create Attraction</h1>
    <form action="{{ route('attractions.store') }}" method="POST">
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
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<style>
.container {
    max-width: 600px;
    margin: 120px auto; /* Avoid overlap with any fixed header */
    padding: 20px;
    background-color: #f8f9fa; /* Light neutral background */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for elevation */
}

.container h1 {
    text-align: center;
    font-size: 2rem;
    font-family: 'Arial', sans-serif;
    margin-bottom: 20px;
    color: #343a40; /* Darker shade for better contrast */
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
    color: #495057; /* Neutral gray for text */
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
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Focus effect */
}

textarea.form-control {
    resize: vertical; /* Allow vertical resizing only */
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
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth button interactions */
    width: 100%; /* Full-width button for a cleaner layout */
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
