

<?php
if (!empty($_POST))
{
    
    
    $url= "http://api.zappos.com/Product/".$_POST['productid']."?includes=[%22styles%22]&key=a73121520492f88dc3d33daf2103d7574f1a3166";
    $response = @file_get_contents($url);
    if($response===false)
    {
        echo "This product is not valid ! Check your product ID!";
    }
    else
    {
        
       // echo $response;
        $con=mysqli_connect("localhost","gplusbus","Akshar11!!","gplusbusDeals");
        // Check connection
           if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
            
            $sql="INSERT INTO Zappos_users (Email, Product_ID)
            VALUES
            ('$_POST[email]','$_POST[productid]')";
            
            if (!mysqli_query($con,$sql))
              {
              die('Error: ' . mysqli_error($con));
              }
            echo "Your preference has been saved ! You will receive a notification if product have 20 % off !";
            
            mysqli_close($con);
            

    }
}
?>





<!DOCTYPE html>

<html>
<head>
    <title>Database connect !</title>
</head>

<body>

<form action="Zappos_Database.php" method="post"><br>
Email: <input type="text" name="email"><br></br>
product name: <input type="text" name="productid">

<input type="submit">
</form>

</body>
</html>
  
