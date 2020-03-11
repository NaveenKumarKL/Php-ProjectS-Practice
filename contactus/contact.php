<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">

        <label>Name</label><br>
        <input type="text" name="name" required><br>
        <label>Email</label><br>
        <input type="text" name="email" required><br>
        <label>Subject</label><br>
        <input type="text" name="subject"><br>
        <label>Message</label><br>
        <textarea name="text" id="" cols="30" rows="10"></textarea><br>
        <input type="submit" name="submit" value="submit">


        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $text = $_POST['text'];
            $adminwsite = "naveen3031992@gmail.com";
            $headers = header["replay-to:$email"];

            mail($adminwsite, $subject, $text, $headers);
        }

        ?>
    </form>

</body>

</html>