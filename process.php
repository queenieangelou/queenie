<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST["product_name"];
    $productCategory = $_POST["product_category"];
    $productDescription = $_POST["product_description"];
    $productPrice = $_POST["product_price"];

    // Check if a product photo was uploaded
    if (isset($_FILES['product_photo']) && $_FILES['product_photo']['error'] === UPLOAD_ERR_OK) {
        // Define the upload directory
        $uploadDir = 'uploads/';

        // Create the 'uploads' directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate a unique filename for the uploaded photo
        $productPhotoName = uniqid() . '_' . $_FILES['product_photo']['name'];

        // Move the uploaded file to the upload directory
        if (move_uploaded_file($_FILES['product_photo']['tmp_name'], $uploadDir . $productPhotoName)) {
            // Database configuration
            $servername = "localhost";
            $username = "root"; // Default username for WampServer
            $password = "";     // Default password for WampServer
            $dbname = "sari_sari_store_price_management"; // Corrected the database name

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to insert data into the table, including the product photo filename
            $sql = "INSERT INTO product_information (product_name, product_category, product_description, product_price, product_photo)
                    VALUES ('$productName', '$productCategory', '$productDescription', '$productPrice', '$productPhotoName')";

            if ($conn->query($sql) === TRUE) {
                echo "New record added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        // Handle cases where no product photo was uploaded
        echo "Product photo not uploaded or error occurred during upload. Error code: " . $_FILES['product_photo']['error'];
    }
} else {
    // Handle cases where the form wasn't submitted
    echo "Form not submitted.";
}
?>
