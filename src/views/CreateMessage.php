<!DOCTYPE html>
<html>

<?php
$js_path = "js/validation.js";
?>

<head>
    <title>Create a new message</title>
</head>

<body>
    <h1>Create a new message</h1>
    <form id="create-message-form" method="POST" action="/messages/create">
        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject"><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content"></textarea><br>
        <label for="userId">UserId:</label><br>
        <input id="userId" name="userId"></input><br>
        <input type="submit" value="Submit">
    </form>
    <p id="error-message" style="color:red;"></p>
    <script src="<?php echo $js_path; ?>"></script>
</body>

</html>