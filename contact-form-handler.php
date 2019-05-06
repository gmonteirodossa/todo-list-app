<?php
$subject = "To do List App - Today's tasks";

if( isset($_POST["todo"]))
$todomessages = $_POST["todo"];

else 
$todomessages = "You have nothing to do";

if( isset($_POST["completed"]))
$completedmessages = $_POST["completed"];

else
$completedmessages = "Nothing completed";

$length = count($todomessages);
$length1 = count($completedmessages);
$emailaddress = $_POST["address"];
$amessage = "You still need to do: ";
$bmessage = "You already did: ";
for ($i = 0; $i < $length; $i++)
{
    if( isset($_POST["todo"][$i]))
    $thismessage = $_POST["todo"][$i];
    
    else
    break;
    $amessage = $amessage . " ". $thismessage . " ";
}
for ($j = 0; $j < $length1; $j++)
{
    if( isset($_POST["completed"][$j]))
    $thismessage1 = $_POST["completed"][$j];
    
    else
    break;
    $bmessage = $bmessage . " " . $thismessage1 . " ";
}
$officialmessage = $amessage . "\n" . $bmessage;
$mail=mail($emailaddress, $subject, $officialmessage, "From:todolist@mydomain.com");

if ($mail){
echo"Message has been sent";
}
else{
echo"Message not sent this time";
}
?>