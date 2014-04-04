<?php
//phpinfo();
$con=mysqli_connect("localhost","gplusbus","Akshar11!!","gplusbus_Deals");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM Zappos_users");


if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}

while($row = mysqli_fetch_array($result))
  {
  //echo $row['Email'] . " " . $row['Product_ID'];
  
  $url= "http://api.zappos.com/Product/".$row['Product_ID']."?includes=[%22styles%22]&key=a73121520492f88dc3d33daf2103d7574f1a3166"; // connect to the API and get the data
    $response = @file_get_contents($url);
    
    if($response === false)
    {
        // do nothing
    }
    else{
        
        $decoded_json=json_decode($response, true); // Decode the Json data fetched from API
        
        $discount = explode("%",$decoded_json['product'][0]['styles'][0]['percentOff']);
        if(intval($discount[0])>=20)
        {
      
            // send email to the user if discount is equal to or greater than 20%
            $to = $row['Email'];
        $subject = "Sample Email notification";
        $body = "Hi this is the testing email !";
        $headers = "From: parth@gplusbusinessapps.com\r\n"."X-Mailer: php";
       
        if (mail($to, $subject, $body, $headers))
        {
          echo("<p>Message sent!</p>");
        }
        else
        {
         //echo("<p>Message delivery failed...</p>");
        }
        exit;
        }
    }
  }

mysqli_close($con);
?>
