<?php
    header('Content-Type: text/html; charset=utf-8');
    include 'db_connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camilo's Soccer Stats</title>
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
        
        a {
            text-decoration: none;
            color:black;
        }

        a:hover{
            text-decoration: underline;
            color:red;
        }

        div.SignIn {
            color:black;
            font-size:20px;
            margin-left:43%;
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


            if(isset($_POST['createAccount'])){
                
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email= $_POST['email'];
                $password = $_POST['password'];
                $favTeam = $_POST['favTeam'];

                $result = "SELECT TeamId from teams WHERE TeamName = '$favTeam'";
                $n=mysqli_query($db, $result);
                if($n->num_rows == 0) {
                    echo "Choose a team from the following Leagues: Serie A, Premier League, or La Liga";
                    
                    
                } else {
                    $sql = "INSERT INTO users (firstname, lastname, email, password, favTeamID) values ('$firstname', '$lastname', '$email','$password', (SELECT TeamId from teams WHERE TeamName = '$favTeam'))";
                    if (mysqli_query($db, $sql)) {
                        echo "New record created successfully";
                     } else {
                        echo "Error: " . $sql . "" . mysqli_error($db);
                     }
               }
               
               


            }

            
                





            
            

        ?>
    </div>

    <div class="registration">
            <form action="index.php" method="post">
                <div class = "container">
                    <h1>Registration</h1>
                    
                    <label for="firstname"><b>First Name:</b></label>
                    <input type="text" name="firstname" required>

                    <label for="lastname"><b>Last Name:</b></label>
                    <input type="text" name="lastname" required>

                    <label for="email"><b>Email:</b></label>
                    <input type="email" name="email" required>

                    <label for="password"><b>Password:</b></label>
                    <input type="password" name="password" required>

                    <label for="favTeam"><b>Favorite Team:</b></label>
                    <input type="text" name="favTeam" required>

                    <input type="submit" name="createAccount" value="Sign Up">

                </div>

            </form>

            
    </div >
    <div class="SignIn">
            If you have an account,
            
            <a href="signIn.php">
                Sign In
            </a> 
    </div>
</body>
</html>