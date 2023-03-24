<?php  
   $to = "pansarebaliram@kccemsr.edu.in";//change receiver address  
   $subject = "This is subject";  
   $message = "<h1>This is HTML heading</h1>";  
  
   $header = "From:xyz@example.com \r\n";  
   $header .= "MIME-Version: 1.0 \r\n";  
   $header .= "Content-type: text/html;charset=UTF-8 \r\n";  
  
   $result = mail ($to,$subject,$message,$header);  
  
   if( $result == true ){  
      echo "Message sent successfully...";  
   }else{  
      echo "Sorry, unable to send mail...";  
   }  
?>  

<!--a href="mailto:pansarebaliram@kccemsr.edu.in?cc=scomeone@example.com, another@example.com&bcc=person@example.com&subject=mail%20subject&body=Body-goes-here">Email button</a-->

<a href="mailto:pansarebaliram@kccemsr.edu.in?subject=mail%20subject&body=hello">Email button</a>