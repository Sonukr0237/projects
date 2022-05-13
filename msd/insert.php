<?php
session_start();
$username1=$_SESSION['username'];

require_once 'config.php';
if (isset($_POST['message'])) {
    $message = $_POST['message'];
    mysqli_query($conn, "insert into status(message,username1) values ('$message', '$username1')");
    $sql = mysqli_query($conn, "SELECT message,id FROM status order by id desc");
    $result = mysqli_fetch_array($sql);
    echo '<div class="message-wrap">' . $result['message'] . '</div>';
} else {
    echo "Message is empty";
}
?>