<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

$sql = "INSERT INTO newtrain (tnumber,sp,dp,dtrav,ac,sl) VALUES ('".$_POST["tnumber"]."','".$_POST["sp"]."','".$_POST["dp"]."','".$_POST["dtrav"]."','".$_POST["ac"]."','".$_POST["sl"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>

</body>
</html>
