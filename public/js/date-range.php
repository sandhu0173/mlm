<?php
if(isset($_POST['submit']))
{
    $loc=$_POST['location'].$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],$loc);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="" name="location">
        <button name="submit">Submit</button>
    </form>
</body>
</html>