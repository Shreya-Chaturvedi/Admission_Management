<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['excel_file']['tmp_name']; // Temporary file path
        $fileType = $_FILES['excel_file']['type']; // File type

        // Ensure the uploaded file is a CSV
        $allowedTypes = ['text/csv', 'application/vnd.ms-excel'];
        if (!in_array($fileType, $allowedTypes)) {
            die("Error: Only CSV files are allowed.");
        }

        // Open the CSV file for reading
        if (($handle = fopen($fileTmpPath, 'r')) !== false) {
            // Database connection (update with your credentials)
            $conn = new mysqli("localhost", "your_username", "your_password", "your_database");
            if ($conn->connect_error) {
                die("Database connection failed: " . $conn->connect_error);
            }

            // Skip the header row (if your CSV has headers)
            $rowIndex = 0;

            // Read each row in the CSV
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                if ($rowIndex === 0) {
                    // Skip the header row
                    $rowIndex++;
                    continue;
                }

                // Example: Assuming the columns are Roll, Firstname, Middlename, Lastname, Status
                $roll = $conn->real_escape_string($data[0]);
                $firstname = $conn->real_escape_string($data[1]);
                $middlename = $conn->real_escape_string($data[2]);
                $lastname = $conn->real_escape_string($data[3]);
                $status = $conn->real_escape_string($data[4]);

                // Insert into the database
                $sql = "INSERT INTO student_list (roll, firstname, middlename, lastname, status) 
                        VALUES ('$roll', '$firstname', '$middlename', '$lastname', '$status')";
                if (!$conn->query($sql)) {
                    echo "Error inserting row: " . $conn->error . "<br>";
                }
            }

            fclose($handle); // Close the file
            $conn->close();  // Close the database connection
            echo "Data imported successfully!";
        } else {
            echo "Error: Unable to open the uploaded file.";
        }
    } else {
        echo "Error: No file uploaded.";
    }
} else {
    echo "Invalid request.";
}
?>
