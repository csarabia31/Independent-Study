<?php
    include 'db_connection.php';
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>

        body{
            background-image: url(images/champions.jpg);
            background-position:center;
        }
        h1{
            font-size:50px;
            text-align:center;
            
        }
        
    
        input{

            display:block;
            width:30%;
            margin-left:35%;
            margin-right:35%;
            padding:5px;
            
        }

        input[type=submit]{
            width:10%;
            text-align:center;
            margin-left:45%;
            margin-top:1%;
        }

        label{
            margin-left:35%;
            font-size:20px;
        }
    </style>
    <div class="php">

        <?php
            if(isset($_POST['email']))
            {
                $email= $_POST['email'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."' limit 1";
                $result = mysqli_query($db,$sql);
                
                if(mysqli_num_rows($result)==1)
                {
                    header("Location: table.php");
                    //echo "account verified!";
                    exit();
                }
                else
                {
                    echo '<script language="javascript">';
                    echo 'alert("WRONG EMAIL OR PASSWORD. TRY AGAIN")';
                    echo '</script>';
                    
                    //header("Location: signIn.php");
                }

            }
        ?>
    </div>
    <div class="signIn">
            <form action="signIn.php" method="post">
                <div class = "container">
                    <h1>Sign In</h1>
                    
                    

                    <label for="email"><b>Email:</b></label>
                    <input type="email" name="email" required>

                    <label for="password"><b>Password:</b></label>
                    <input type="password" name="password" required>

                    <input type="submit" name="signIn" value="Sign In">

                </div>

            </form>

            
    </div >
</body>
</html>