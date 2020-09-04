<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>

    <?php
    $username = 'Thomas';
    $numNotifications = 8;
    $numEmails = 2;
    $notificationText = "You have $numNotifications notifications";
    ?>

    <h1><?php echo 'Welcome' . $username . '!'; ?></h1>
    <h2><?php echo "$notificationText and $numEmails emails!"; ?></h2>

</body>

</html>