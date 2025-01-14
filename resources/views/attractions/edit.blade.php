
<div class="container">
    <h1>Edit Attraction</h1>
    <form action="{{ route('attractions.update', $attraction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $attraction->name }}" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $attraction->location }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $attraction->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $attraction->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<style>
.container {
    max-width: 600px;
    margin: 120px auto; /* To prevent overlapping with a fixed header */
    padding: 20px;
    background-color: #f8f9fa; /* Light, neutral background color */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Slight shadow for elevation */
}

.container h1 {
    text-align: center;
    font-size: 2rem;
    font-family: 'Arial', sans-serif;
    margin-bottom: 20px;
    color: #343a40; /* Darker shade for title contrast */
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
    color: #495057; /* Neutral gray for better readability */
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
    border-color: #80bdff; /* Highlight the input border on focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Soft focus shadow effect */
}

textarea.form-control {
    resize: vertical; /* Allow only vertical resizing */
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
    width: 100%; /* Full-width for uniform design */
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.02); /* Slight zoom effect on hover */
}

.btn-primary:active {
    background-color: #004085;
    transform: scale(1); /* Reset zoom on active state */
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
