<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>

<body>
    <h1>Welcome</h1>
    <a href="/messages">Messages</a>
    <ul>
        <?php foreach ($data as $user) : ?>
            <li><?= $user['username'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>