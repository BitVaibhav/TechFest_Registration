<?php
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$gender = filter_input(INPUT_POST, 'gender');
$event = isset($_POST['event']) && is_array($_POST['event']) ? $_POST['event'] : [];
$chkstr =implode(',', $event);


if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($phone)|| !empty($gender) || !empty($events)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "techfest";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname,3307);

    if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
        }

    else{
        $sql = "INSERT INTO participants (firstname, lastname, email, phone, gender, events) 
        values ('$firstname','$lastname','$email','$phone','$gender', '$chkstr')";

        if ($conn->query($sql)){
            echo "New record is inserted sucessfully";
        }
        else{
            echo "Error: ". $sql ."". $conn->error;
        }
        $conn->close();

    }
}
else{
    echo("Form Still Incomplete");
    die();
}
?>