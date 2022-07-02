<?php
    $con=mysqli_connect('localhost','root','','stock');
    $email_A=@$_POST['email_A'];
    $password_A=@$_POST['password_A'];
    if(isset($_POST['login'])){
        if(empty($email_A)or empty($password_A)){
            echo '<script>alert("Veuillez entrer toutes les informations")</script>';
        }else{
            $get_admin="select * from admin where email_A='$email_A'and password_A ='$password_A'";
            $run_admin= mysqli_query($con,$get_admin) ;
            if(mysqli_num_rows($run_admin)==1){
                $row_admin=mysqli_fetch_array($run_admin) ;
                $aname=$row_admin['email_A'];
                setcookie("aname",$aname,time()+60*60*24);
                setcookie("adminlogin",1,time()+60*60*24);
                echo '<script>alert("accueillir à nouveau")</script>';
                header("Location: home.html");
            }else{
                echo '<script>alert("Les donnéees saisies sont incorrectes")</script>';
            }
        }
    }
?>