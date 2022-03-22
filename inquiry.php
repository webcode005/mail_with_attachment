<?php 
if((isset($_POST["name"]) && $_POST["name"] !='') 
&& (isset($_POST["email"]) && $_POST["email"] !='') 
&& (isset($_POST["phone"]) && $_POST["phone"] !='') 
&& (isset($_POST["father"]) && $_POST["father"] !='') 
&& (isset($_POST["date"]) && $_POST["date"] !='') 
&& (isset($_POST["year"]) && $_POST["year"] !='') 
&& (isset($_POST["post"]) && $_POST["post"] !=''))
				{
				$name=$_POST["name"];		
				$email=$_POST["email"];
				$phone=$_POST["phone"];
				$father=$_POST["father"];
				$date=$_POST["date"];
				$year=$_POST["year"];
				$post=$_POST["post"];
				
  $to = "kaleemwxi@gmail.com, therajasthanschool@gmail.com";
  $subject = "Career Enquiry - https://www.therajasthanschool.edu.in/";
  $message='Hi Enquiry From Contact Enquiry  !<br /><br />'.ucfirst($name).' has sent you a message via contact form on your website! <br /><br />
  Name: '.ucfirst($name ).'<br />
  Email: '.ucfirst( $email ).'<br />
  Phone: '.ucfirst( $phone).'<br />
  Father: '.ucfirst( $father).'<br />
  Date: '.ucfirst( $date).'<br />
  Years of Experience: '.ucfirst( $year).' Year<br />
  Applied for the post of: '.ucfirst( $post).'<br />';



 $filename = $_FILES['img']['name'];   



  //$filename = 'myfile';
    $path = 'main-images/career';
    $file = $path . "/" . $filename;
    
    move_uploaded_file($_FILES['img']['tmp_name'],$file);

    $mailto = 'justfordemo2017@gmail.com';
   
    // $message = 'My message';

    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: ".$name." <'.$email.'>" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: info@therajasthanschool.edu.in' . "\r\n";

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) 
  
// if (mail($to,$subject,$txt,$headers))
{
	header('Location: thanks.php');
    //echo 'Message has been sent';
 exit;

				}
				else
				{
					echo "OOPS please try Again !!!";
				}
			}
			else
			{
				echo "Authentication Failed";
			}
			
//thanks you message
   
 ?>
