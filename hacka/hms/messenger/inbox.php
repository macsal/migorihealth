$you=$_COOKIE['username'];     
$st= "SELECT* FROM mbox WHERE sentto='$you' ORDER BY ID DESC LIMIT 10";