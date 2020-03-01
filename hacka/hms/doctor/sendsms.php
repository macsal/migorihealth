<?php
session_start();
$id=$_SESSION['id'];
include('include/config.php');

$ma=mysql_query("SELECT * FROM users where id='$id' ");  
  if(mysql_num_rows($ma)>0) {
    while($mb=mysql_fetch_assoc($ma))
    { 
        // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your authentication credentials
    $username   = "mmbehiclayton";
    $apikey     = "f8b03e50edd777291d8f23e6e361ec3d0ab9d50ec990584b034813332b81b1fd";
    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)

    $name=$mb['fullName'];
    $phone=$mb['phone'];
      $phone='+254'.$phone;
      
      
      $recipients = $phone;
    // And of course we want our recipients to know what we really do
    $message='hello'.' '.$name.' Your Appointment on date '.$_SESSION['date'].' at '.$_SESSION['time'].' has been cancelled make another Appointment';
    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    /*************************************************************************************
      NOTE: If connecting to the sandbox:
      1. Use "sandbox" as the username
      2. Use the apiKey generated from your sandbox application
         https://account.africastalking.com/apps/sandbox/settings/key
      3. Add the "sandbox" flag to the constructor
      $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
    **************************************************************************************/
    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    { 
      // Thats it, hit send and we'll take care of the rest. 
      $results = $gateway->sendMessage($recipients, $message);
                
      foreach($results as $result) {
        // status is either "Success" or "error message"
?><script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("Appointment cancelled. The patient recieve a confirmation mesage shortly. Do you want to log out?") == true) {
    window.location.href = "logout.php";
}
else{
  window.location.href = "dashboard.php";
}</script><?php
        
      }
  }
    catch (Exception $e )
    {
      echo "Encountered an error while sending:".$e->getMessage()."<br>";
      print_r($e);
    } 
      
  }

}
  else 
  {
    echo "nothing to display";

  }

  


    // DONE!!! 