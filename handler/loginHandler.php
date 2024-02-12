<?php
include("config.php");
include("firebaseRDB.php");
$response = array();

try {
    if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        // Extract email and password fields from the request
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create an instance of the firebaseRDB class
        $rdb = new firebaseRDB($databaseURL);

        // Retrieve user data from Firebase
        $retrieve = $rdb->retrieve("/user", "email", "EQUAL", $email);
        $data = json_decode($retrieve, true);

        // Check if email is already registered
        if(count($data) > 0) {
            // var_dump ($data);
            $id = array_keys($data)[0];
            // Verify hashed password
            if(password_verify($password, $data[$id]["password"])) {
                setcookie("userId", $id, time()+(60*60*24*7), '/');
                setcookie("name", $data[$id]["name"], time()+(60*60*24*7), '/');
                $response['message'] = "Email is registered";
                $response['status'] = 200;
            } else {
                $response['message'] = "Password is incorrect";
                $response['status'] = 404;
            }
        } else {
            $response['message'] = "Email not registered";
            $response['status'] = 404; // Not Found
        }
    } else {
        $response['message'] = "Email and password fields are required and cannot be empty";
        $response['status'] = 400; // Bad Request
    }
} catch (Exception $e) {
    // Handle exceptions
    $response['error'] = "Error: " . $e->getMessage();
    $response['status'] = 500; // Internal Server Error
}

// Send JSON response with appropriate status code
http_response_code($response['status']);
header('Content-Type: application/json');
echo json_encode($response);
?>
