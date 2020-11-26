<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

$cdquery="SELECT * FROM Booking_Agent";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Name</td><td>Address</td><td>Card_no</td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow[0]."</td><td>".$cdrow[1]."</td><td>".$cdrow[2]."</td></tr>"
// "</td><td><a href=\"http://localhost/railway/edit_user.php?id=".$cdrow[0]."\"><button>Edit</button></a></td><td><a href=\"http://localhost/railway/delete_user.php?id=".$cdrow[0]."\"><button>Delete</button>

;
}
echo "</table>";

// echo " <br><a href=\"http://localhost/railway/new_user_form.html\"> Add New User </a><br> ";
echo " <br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>
