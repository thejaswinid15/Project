<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foodname = $_POST['foodname'];
    $Mealtype = $_POST['Mealtype'];
    $Category = $_POST['Category'];
    $Quantity = $_POST['quantity'];
    $Name = $_POST['name'];
    $Phone = $_POST['phoneno'];
    $Address = $_POST['address'];

    $conn = new mysqli('localhost', 'root', '', 'food');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO donation_details (foodname, Mealtype, Category, Quantity, Name, Phone, Address) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("sssssss", $foodname, $Mealtype, $Category, $Quantity, $Name, $Phone, $Address);
        $execval = $stmt->execute();
        if ($execval === false) {
            echo "Error: " . $stmt->error;
        } else {
            echo "Details recorded successfully...";
        }
        $stmt->close();
        $conn->close();
    }
}
?>
