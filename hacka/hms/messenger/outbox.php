$you=$_COOKIE['username'];
$st= "SELECT*FROM mbox WHERE sentby='$you' ORDER BY ID DESC LIMIT 10";