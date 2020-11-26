<html>
<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

session_start();

require "db.php";

$doj=$_POST["doj"];
$_SESSION["doj"] = "$doj";
$sp=$_POST["sp"];
$_SESSION["sp"] = "$sp";
$dp=$_POST["dp"];
$_SESSION["dp"] = "$dp";
// commnted 
//$query = mysqli_query($conn,"SELECT t.trainno,t.tname,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.dd,c.class,c.fare,c.seatsleft FROM train as t,classseats as c, schedule as s1,schedule as s2 where s1.trainno=t.trainno AND s2.trainno=t.trainno AND s1.sname='".$sp."' AND s2.sname='".$dp."' AND t.trainno=c.trainno AND c.sp='".$sp."' AND c.dp='".$dp."' AND c.doj='".$doj."' ");
$query = mysqli_query($conn,"SELECT t.trainno,t.tname,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.dd,c.class,c.seatsleft FROM 
train as t, newclassseats as c, schedule as s1, schedule as s2 
where s1.trainno=t.trainno AND s2.trainno=t.trainno AND t.trainno=c.trainno AND 
s1.sname='".$sp."' AND s2.sname='".$dp."' AND  c.sp='".$sp."' AND c.dp='".$dp."' AND c.doj='".$doj."' ");

// $query = mysqli_query($conn,"SELECT t.trainno,t.tname,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.dd,c.class,c.fare,c.seatsleft FROM 
// -- train as t, classseats as c, schedule as s
// -- where s.trainno=t.trainno  AND t.trainno=c.trainno AND
// -- s.sname='".$sp."' AND s.sname='".$dp."'  AND c.sp='".$sp."' AND c.dp='".$dp."' AND c.doj='".$doj."' ");


echo "<table><thead><td>Train No</td><td>Train_Name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Train_Class</td><td>Seats_Left</td></thead>";

while($row = mysqli_fetch_array($query))
{
 echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td></tr>";
}
echo "</table>";

//$rowcount=mysqli_num_rows($query);
if(mysqli_num_rows($query) == 0)
{
 echo "No such train <br> ";
 die();
}
?>

If you wish to proceed with booking fill in the following details:<br><br>
<form action="new_resvn.php" method="post">
Registered Card No: <input type="text" name="cno" required><br><br>
Name: <input type="text" name="name" required><br><br>
Enter Train No: <input type="text" name="tno" required><br><br>
Enter Class: <input type="text" name="class" required><br><br>
No. of Seats: <input type="text" name="nos" required><br><br>
<input type="submit" value="Proceed with Booking"><br><br>
</form>

<?php

echo " <a href=\"http://localhost/railway/new_enquiry.php\">More Enquiry</a> <br>";

$conn->close(); 
?>

<br><a href="http://localhost/railway/indexcopy.htm">Go to Home Page!!!</a>
</body>
</html>
