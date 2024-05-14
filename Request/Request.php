<?php

include("../security.php");
include("../connection.php");

if (isset($_POST['submit'])) {

    $requested_by = $_SESSION['username'];

    $name = $_POST['name'];
    $ki = $_POST['ki'];
    $max_ki = $_POST['max_ki'];
    $race = $_POST['race'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $affiliation = $_POST['affiliation'];
    $face_image = $_POST['face_image'];

    $ability_1 = $_POST['ability_1'];
    $ability_2 = $_POST['ability_2'];
    $ability_3 = $_POST['ability_3'];
    $ability_4 = $_POST['ability_4'];

    $ability_1_yt = $_POST['ability_1_yt'];
    $ability_2_yt = $_POST['ability_2_yt'];
    $ability_3_yt = $_POST['ability_3_yt'];
    $ability_4_yt = $_POST['ability_4_yt'];

    try {
        $stmt = $conn->prepare("INSERT INTO character_request
                                (name, ki, max_ki, race, gender, description, image, affiliation, face_image, ability_1, ability_2, ability_3, ability_4, ability_1_yt, ability_2_yt, ability_3_yt, ability_4_yt, requested_by) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $ki);
        $stmt->bindParam(3, $max_ki);
        $stmt->bindParam(4, $race);
        $stmt->bindParam(5, $gender);
        $stmt->bindParam(6, $description);
        $stmt->bindParam(7, $image);
        $stmt->bindParam(8, $affiliation);
        $stmt->bindParam(9, $face_image);
        $stmt->bindParam(10, $ability_1);
        $stmt->bindParam(11, $ability_2);
        $stmt->bindParam(12, $ability_3);
        $stmt->bindParam(13, $ability_4);
        $stmt->bindParam(14, $ability_1_yt);
        $stmt->bindParam(15, $ability_2_yt);
        $stmt->bindParam(16, $ability_3_yt);
        $stmt->bindParam(17, $ability_4_yt);
        $stmt->bindParam(18, $requested_by);

        $stmt->execute();

        echo "Request Succecufully Sent";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    header("Location: main.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="Request.css">
</head>
<body>


<form action="Request.php" method="post">

<label for="name">Name</label>
<input type ="text" name ="name" id ="name" required><br>

<label for="Base_ki">Base Ki</label>
<input type ="text" name ="ki" id ="ki" required placeholder="please enter a number"><br>

<label for="Max_Ki">max ki</label>
<input type ="text" name ="max_ki" id ="max_ki" required placeholder="please enter a number higher than the base ki"><br>

<label for="Race">Race</label>
<input type ="text" name ="race" id ="race" required><br>

<label for="Gender">Gender</label>
<select name="gender" id="gender" required>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select><br>


<label for="">description</label>
<textarea name="description" id="description" cols="30" rows="10"></textarea required><br>


<label for="image_link">Image link(make sure the img has no background)</label required><br>
<input type ="text" name ="image" id ="image">

<label for="Affiliation">Affiliation</label>
<input type ="text" name ="affiliation" id ="affiliation" required> <br>

<label for="face_image">Face image link</label>
<input type ="text" name ="face_image" id ="face_image" required><br>

<label for="ability_1">ability 1</label>
<input type ="text" name ="ability_1" id ="ability_1" required><br>

<label for="ability_2">ability 2</label>
<input type ="text" name ="ability_2" id ="ability_2" required><br>

<label for="ability_3">ability 3</label>
<input type ="text" name ="ability_3" id ="ability_3" required><br>

<label for="ability_1">ability 1</label>
<input type ="text" name ="ability_4" id ="ability_4" required><br>


<label for="ability_1_yt">ability  1 showcase (videoUrl)</label>
<input type ="text" name ="ability_1_yt" id ="ability_1_yt" required><br>



<label for="ability_2_yt">ability  2 showcase (videoUrl)</label>
<input type ="text" name ="ability_2_yt" id ="ability_2_yt" required><br>


<label for="ability_3_yt">ability  3 showcase (videoUrl)</label>
<input type ="text" name ="ability_3_yt" id ="ability_3_yt" required><br>


<label for="ability_4_yt">ability  1 showcase (videoUrl)</label>
<input type ="text" name ="ability_4_yt" id ="ability_4_yt" required><br>

<input type="submit" value ="Request" name ="submit">

</form>




</body>
</html>