
<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $vehicle = $_POST['vehicle'] ?? null;

    // Navigate based on the selected vehicle type
    if ($vehicle) {
        switch ($vehicle) {
            case 'car':
                header('Location: cars.blade.php'); // Replace with your car page URL
                break;
            case 'mpv':
                header('Location: mpvs.blade.php'); // Replace with your MPV page URL
                break;
            case 'motorcycle':
                header('Location: motorcycles.blade.php'); // Replace with your motorcycle page URL
                break;
            default:
                // Redirect to a default or error page
                header('Location: mainpage.blade.php'); // Replace with your error page URL
        }
        exit; // Ensure no further code is executed
    } else {
        // Redirect to an error page if no vehicle type is selected
        header('Location: mainpage.blade.php');
        exit;
    }
} else {
    // Redirect to the form page if accessed directly
    header('Location: index.php'); // Replace with your form page URL
    exit;
}

