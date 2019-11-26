<?php
$db = mysqli_connect("localhost", "root", "", "drdo");

if(mysqli_connect_error()){
    echo "connection unsucessful";
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $town = $_POST['town'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    

    if($name==''||$town==''||$phone==''||$email==''||$checkin==''||$checkout=='')
    {
        echo '<script language="javascript">';
        echo 'alert("Please Fill out All details")';
        echo '</script>';

    }

    else{
        $hash = md5($_POST['password'], PASSWORD_DEFAULT);
        $query="INSERT INTO sign (name1,town,phone,email,checkin,checkout) VALUES ('$name','$town','$phone','$email','$checkin','$checkout')";
        mysqli_query($db, $query);
        header("Location:login.php");
    }

}

?>


<!doctype html>
<html>

    <head>
        <title>Visitor Details</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="visitor.css">
    </head>

    <body>

        <div id="error"><?php echo '<script language="javascript">';
                              echo 'alert $error';
                              echo '</script>'; ?>
        </div>

        <form action="/drdo project/Registration.php" class="base" method="post">
            <fieldset class="field">
                <h1>Visitor Details</h1>
                Name<br>  <input class="bar" type="text" name="name" value=<?php if(isset($_POST['name'])){echo $name;}else{echo " ";}?>><br><br>
                Town/locality<br> <input class="add" type="text" name="town"value=<?php if(isset($_POST['town'])){echo $town;}else{echo " ";}?>><br><br>
                Phone number<br>  <input class="num" name="phone" min="12" max="60" value=<?php if(isset($_POST['phone'])){echo $phone;}else{echo " ";}?>><br><br>
                Email<br>  <input class="add" type="email" name="email" value=<?php if(isset($_POST['email'])){echo $email;}else{echo " ";}?>><br><br>
                checkin<br><input class="time" type="time" name="checkin" value=<?php if(isset($_POST['checkin'])){echo $checkin;}else{echo " ";}?>><br><br>
                checkin<br><input class="time" type="time" name="checkout" value=<?php if(isset($_POST['checkout'])){echo $checkout;}else{echo " ";}?>><br><br>
                <button class="icl-Button icl-Button--primary icl-Button--lg" type="submit" name="submit">Submit</button>
            </fieldset>
        </form>

    </body>

</html>