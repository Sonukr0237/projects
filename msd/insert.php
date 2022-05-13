<?php
require_once 'config.php';
if (isset($_POST['message'])) {
    $message = $_POST['message'];
    mysqli_query($conn, "insert into users(message) values ('$message')");
    $sql = mysqli_query($conn, "SELECT message,id FROM users order by id desc");
    $result = mysqli_fetch_array($sql);
    echo '<div class="message-wrap">' . $result['message'] . '</div>';
} else {
    echo "Message is empty";
}
?>