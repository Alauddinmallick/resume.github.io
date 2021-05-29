
<?php

session_start();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    //connection database
    $conn=mysqli_connect("localhost","root","","resume");
    if(!$conn)
    {
        die("connected failed".mysqli_connect_error());
    }

    $Email_check="select * from sms where email='$email' ";
    $result=mysqli_query($conn,$Email_check);
    $OnlyEmailCheck=mysqli_num_rows($result);

    if($OnlyEmailCheck==1){
        echo "<script> alert('You are Already sent');
                window.setTimeout(function(){
                window.location.href = '../index.php';
                }, 0);
            </script>";
    }
    else if($num==0)
    {
        $sql1="INSERT INTO sms(name,subject,email,message)
        VALUES('$name','$subject','$email','$message')";
        if(mysqli_query($conn,$sql1)){
            echo "<script> alert('Your Message has been Sent ,Thank You');
            window.setTimeout(function(){
            window.location.href = '../index.php';
            }, 200000);
        </script>";
        }
        else
        {
            echo "Not Registered".mysqli_error($conn);
        }
        
    }
    else
    {
        echo "<script> alert('Something is Wrong Please Try Again !');
                window.setTimeout(function(){
                window.location.href = '../index.php';
                }, 0);
            </script>";
    }
}
 
?>