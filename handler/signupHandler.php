<?php
include("config.php");
include("firebaseRDB.php");

// Set default status code
http_response_code(500); // Internal Server Error

$response = array();

// Check if the form data is set and not empty
if(isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']) &&
   !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $name = $firstname." ".$lastname;

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Create an instance of the firebaseRDB class
        $rdb = new firebaseRDB($databaseURL);

        // Retrieve user data from Firebase
        $retrieve = $rdb->retrieve("/user", "email", "EQUAL", $email);
        $data = json_decode($retrieve, true);

        // Check if email is already registered
        if(count($data) > 0) {
            http_response_code(400); // Bad Request
            $response['status'] = 400;
            $response['message'] = "Email is already registered";
        } else {
            // Insert user data into Firebase
            $insert = $rdb->insert("/user", [
                "name" => $firstname . ' ' . $lastname,
                "email" => $email,
                "password" => $hashedPassword
            ]);

            // Decode the result
            $result = json_decode($insert);

            // Check if insertion was successful
            if($result !== null) {
                http_response_code(201); // Created
                $response['status'] = 201;
                $response['message'] = "Signup successful!";
            } else {
                http_response_code(500); // Internal Server Error
                $response['status'] = 500;
                $response['message'] = "Signup failed!";
            }
        }
    } catch (Exception $e) {
        http_response_code(500); // Internal Server Error
        $response['status'] = 500;
        $response['message'] = "Error: " . $e->getMessage();
    }
} else {
    // If form data is not set or empty, display an error message
    http_response_code(400); // Bad Request
    $response['status'] = 400;
    $response['message'] = "Form data is incomplete";
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
