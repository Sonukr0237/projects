<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='insert.js'></script>
    <title>Welcome</title>
</head>
<body>
     <div class="container" style="max-width:800px;margin:0 auto;margin-top:50px;">  
            <div>
                <div class="form-group">
                    <label for="email">What are you doing today?</label>
                    <textarea name="message" class="form-control" id="message"></textarea>
                    <div class="error" id="error_message"></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" id="save">Save</button>
                </div>

                <div class="display-content">

                    <div class="message-wrap dn">                      
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $(document).on("click", "#save", function () {
                //get value of message 
                var message = $("#message").val();
                //check if value is not empty
                if (message == "") {
                    $("#error_message").html("Please enter message");
                    return false;
                } else {
                    $("#error_message").html("");
                }
                //Ajax call to send data to the insert.php
                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: {message: message},
                    cache: false,
                    success: function (data) {
                        //Insert data before the message wrap div
                        $(data).insertBefore(".message-wrap:first");
                        //Clear the textarea message
                        $("#message").val("");
                    }
                });
            });
        </script>
    <a href="logout.php">Logout</a>
</body>
</html>
