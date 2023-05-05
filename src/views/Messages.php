<!DOCTYPE html>
<html>

<head>
    <title>Messages</title>
</head>

<body>
    <h1>Messages</h1>
    <a href="/messages/create">Create a new message</a>
    <ul>
        <?php foreach ($messages as $message) : ?>
            <li>
                <h2><?= $message['subject'] ?></h2>
                <p><?= $message['content'] ?></p>
                <p>Writed by : <?= $message['username'] ?></p>
                <a href="/messages/view/<?= $message['id'] ?>">View</a>
                <a href="/messages/edit/<?= $message['id'] ?>">Edit</a>
                <a href="/messages/delete/<?= $message['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>