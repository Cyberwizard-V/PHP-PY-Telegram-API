<?php 

function tNotifier($token, $chatid , $errormessage = "Please enter a message"){
    //Make simple form
    echo '<form method="POST">';
    echo '<textarea name="message" rows="4" cols="50" placeholder="Enter message"></textarea>';
    echo '<br>';
    echo '<button name="submit" type="submit" value="submit">Show me what you got</button>';
    echo '</form>';

//exec on post submit
if(isset($_POST['submit'])){
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatid;
        $url = $url . "&text=" . urlencode($_POST['message']);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    }
    if(empty($_POST['message'])){
        echo "Please enter a message";
    }else{
        echo "Thank you for the message";
    }
    
}
?>
