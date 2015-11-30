
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />

<?php require '../settings.php';
/* Check all form inputs using check_input function */
$name= check_input($_POST['name'], "Enter your name");
$email= check_input($_POST['email']);
$message= $_POST['message'];
$subject= check_input($_POST['subject']);
/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* If URL is not valid set $website to empty */
if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $website))
{
    $website = '';
}

/* From who and Reply to Who. */
$headers  = 'From: ' . $name . "\r\n";
$headers .= 'Reply-To: ' . $administrationemail . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

/* Send the message using mail() function */
mail($email, $subject, $message, $headers);

/* Redirect visitor to the thank you page */
echo "<div class='se-pre-con'></div><b>Your email has been sent sucessfully!";
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>