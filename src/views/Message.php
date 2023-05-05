<!DOCTYPE html>
<html>

<head>
    <title><?= $message['title'] ?></title>
</head>

<body>
    <h1><?= $message['title'] ?></h1>
    <p><?= $message['content'] ?></p>
    <a href="/messages/edit/<?= $message['id'] ?>">Edit</a>
    <a href="/messages/delete/<?= $message['id'] ?>">Delete</a>
</body>

</html>