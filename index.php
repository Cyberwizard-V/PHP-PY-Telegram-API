<?php 
//turn on error
ini_set('display_errors', 1);
error_reporting(E_ALL);
//exec on post submit
if(isset($_POST['submit'])){
    function sendMessage($chatID, $messaggio, $token) {
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($messaggio);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return "Message sent";
    }
    $token = "YOUR KEY";
    $chatid = "YOUR CHAT ID";
    if(empty($_POST['message'])){
        echo "Please enter a message";
    }else{
        sendMessage($chatid, $_POST['message'], $token);
        unset($_POST['message']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CWV - Telegram Notifier</title>
</head>
<body style="background-color: #2d2d2d; color: white;">
<div class="container">
    <h1 style="color: white; font-family: Arial;">Notify me >.> </h1>
    <form method="POST">
        <!--- Make input with text area -->
        <textarea name="message" rows="4" cols="50" placeholder="Enter message"></textarea>
        <br>
        <button name='submit' type="submit" value="submit">Show me what you got</button>
        <?php 
        
        ?>
    </form>
</div>
    
</body>
</html>