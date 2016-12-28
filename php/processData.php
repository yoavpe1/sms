
<?php
/*

header('Content-Type:text/html; charset=utf-8');

//$xml1 = new SimpleXMLElement('<form/>');
$xml1 = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><form/>');
$xml1->addchild('sender' ,$_POST['sender']);
$xml1->addchild('sender_tel' , $_POST['sender_tel']);
$xml1->addchild('sender_mail' , $_POST['sender_mail']);
//$xml->addchild('senderid' , $_GET['senderid']);
$xml1->addchild('receiver_name' , $_POST['receiver_name']);
$xml1->addchild('receiver_tel' , $_POST['receiver_tel']);
$xml1->addchild('receiving_date' , $_POST['receiving_date']);
//$xml1->addchild('presentedNumber' , $_POST['presentedNumber']); disable option for system number
$xml1->addchild('presentedNumber' , '2');

for ($i=1;$i<=40;$i++){
    if ($_POST['time'.$i])
    {
        $xml1->addchild('message'.$i , $_POST['message'.$i]);
        $xml1->addchild('time'.$i , $_POST ['time'.$i]);
      }

}

// now we send this XML by mail
sendmail ($xml1);
function sendmail($xml1){
    $to = "yoavpe@gmail.com";
    $subject="xml file";
    $body = $xml1->asXML();
     $headers ="Content-type: text/plain; charset=utf-8";

    if (mail($to, $subject, $body, $headers)) {
      echo("<p>Message successfully sent!</p>");
   } else {
       echo("<p>Message delivery failed...</p>");
   }

}

upload($xml1);
function upload ($xml1)
{
    $date = $xml1 -> receiving_date;
    $sendto = $xml1 ->receiver_tel;
    $sender = $xml1 ->sender_tel;
    $presentedNumber = $xml1 -> presentedNumber;
    if ($presentedNumber == 1)
    {
        $sender='1111';
    }
    // validate $root

    for ($i = 1; ; $i++)
    {
        $msgNodeName	= "message".$i;
        $timeNodeName	= "time".$i;

        $message = $xml1->xpath($msgNodeName);
        $time = $xml1->xpath($timeNodeName);
        $dateandtime = $date." ".$time[0];

        if ($message[0] != null)
        {
            send_sms($message[0], $sendto, $dateandtime, $sender);
            //echo $message[0]."   ".$sendto."    ".$dateandtime."   ".$sender."</br>";
            //with this echo line you can see the data that are going to be sent.
        }
        else
            break;
    }
}


function send_sms($msg, $recepients, $timetosend, $sendernum)
{
    $msg = str_replace('<', '%26lt;', $msg); // "Cleans" the message from unsafe notes
    $msg = str_replace('>', '%26gt;', $msg); // "Cleans" the message from unsafe notes
    $msg = str_replace('\"', '%26quot;', $msg); // "Cleans" the message from unsafe notes
    $msg = str_replace("\'", '%26apos;', $msg); // "Cleans" the message from unsafe notes
    $msg = str_replace("&", '%26amp;', $msg); // "Cleans" the message from unsafe notes
    $message_text = $msg;
    $time= $timetosend;
    $sender=$sendernum;
    $sms_host = "api.smsim.co.il"; // Application server's URL;
    $sms_port = 80; // Application server's PORT;
    $sms_path = "/SendMessageXml.ashx"; // Application server's PATH;
    // EDIT THE FOLLOWING LINES
    $sms_user = "yoavpe"; // User Name (Provided by SMSIM) ;
    $sms_password = "Sisma190997"; // Password (Provided by SMSIM) ;
    $sms_sender_name = "Yoav"; // The SMS sender's will appear only on Cellcom & Partner's phones (Optional, only English characters, 11 max. );
    $sms_sender_num = $sender; // The number that this SMS will be sent from;
    $message_text = str_replace (" ", "%20", $message_text); // Encodes spaces into "%20" in the URL;
    $query = 'InforuXML=' . urlencode('<Inforu><User><Username>'.
        $sms_user.'</Username><Password>'.
        $sms_password.'</Password></User><Content Type="sms"><Message>').
        $message_text.urlencode('</Message></Content><Recipients><PhoneNumber>'.
        $recepients.'</PhoneNumber></Recipients><Settings>>'.
        //<SenderName>'.$sms_sender_name.'</SenderName>
        '<SenderNumber>'.
        $sms_sender_num.'</SenderNumber>'.//<CustomerParameter>'.
        //$customer_parameter.'</CustomerParameter>
        '<TimeToSend>'.
        $time.'</TimeToSend>'.
        '</Settings></Inforu>');
    $fp = fsockopen("$sms_host", $sms_port, $errno, $errstr, 30); // Opens a socket to the Application server
    if (!$fp)
    { // Verifies that the socket has been opened and sending the message;
        echo "$errstr ($errno)<br />\n";
    } else
    {
        $out = "GET $sms_path?$query HTTP/1.1\r\n";
        $out .= "Host: $sms_host\r\n";
        $out .= "Connection: Close\r\n\r\n";
        fwrite($fp, $out);
        while (!feof($fp))
        {
            echo fgets($fp, 128); // Echos the respond from application server (you may replace this line with an "Message has been sent" message);
        }
        fclose($fp);
    }
}

?>
<script>
alert ("ההודעות נשלחו");

 window.location.href='http://smsbless.co.il/';



</script>


<?php
*/








function showDataOnScreen () //function for displaying the information collected, on the screen
{
    $name = $_POST['senderName'];
	$sendto = $_POST['senderCell'];
	//$sender = $_GET['sender_tel'];
    //$presentedNumber = $_GET['presentedNumber'];
    //if ($presentedNumber == 1)
   //{
   //     $sender='1111';
   //}
	

echo "<h3>Sender number: ".$name."</h3>";
echo  "<h3>"."Send all blessings to: ".$sendto."</h3>";
//echo  "<h3>"."date: ".$date."</h3>";
//echo "<table border='1'>";
//echo "<tr>";
	//echo "<th style=width:200px>"."Message"."</th>"."<th style=width:200px>"."Send To"."</th>"."<th style=width:200px>"."Date & Time"."</th>"."<th style=width:200px>"."Sender"."</th>";
//echo "<th style='width:200px'>"."Message"."</th>"."<th style='width:200px'>"."Time"."</th>";
//echo "</tr>";
	
//	for ($i1 = 1;$i1<=40 ; $i1++)
//	{
		
//		if ($message[$i1] != null)
//		{
			
//			echo "<tr>";
			//echo "<td  dir=rtl align=right>".$message[0]."</td>"."<td>".$sendto."</td>"."<td>".$dateandtime."</td>"."<td>".$sender."</td>";
 //           echo "<td  dir='rtl' align='right'>".$message[$i1]."</td>"."<td align='center'>".$time[$i1]."</td>";
			//with this echo line you can see the data that are going to be sent.
//			echo "</tr>";
 //   }
//		}
		//else
		//{
 //           echo "</table>";
     //       break;

		//}

  //  }
//}

showDataOnScreen ();




?>
