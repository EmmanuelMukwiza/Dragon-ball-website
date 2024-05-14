<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="dark-orange">

     <div class="light-orange">
           <img src="dragonball.png" class="img-logo">

           <div class="left-content">
           <img src="signup-goku.png" class="left-img">
           </div>

           <div class="right-content"> 

            <form action="signup_process.php" method="POST">

            <label for="Username"><b>Username</b></label>                     
            <label for="Password"><b>Password</b></label><br>
            <input type="text" name = "username"   class="input" required >
            <input type="password" name = "pass" required style ="margin-left: 20px;"class="input"> 
            
            <input type="image" src="ball.png" class="submit-button">


            </form>

           </div>

     </div>
    </div>
</body>
</html>
