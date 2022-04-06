<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $adressErr = $werkervaringErr = $studieloopbaanErr = $diplomaErr = $hobbyErr = "";
$name = $email = $gender = $comment = $website = $adress = $werkervaring = $studieloopbaan = $diploma = $hobby = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "";
    }
  }
  
  if (empty($_POST["adress"])) {
    $adressErr = "";
  } else {
    $adress = test_input($_POST["adress"]);
    // check if e-mail address is well-formed
    if (!filter_var($adress, FILTER_VALIDATE_EMAIL)) {
      $adressErr = "";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "";
    }
  }

  if (empty($_POST["werkervaring"])) {
    $werkervaring = "";
  } else {
    $werkervaring = test_input($_POST["werkervaring"]);
  }

  if (empty($_POST["studieloopbaan"])) {
    $studieloopbaan = "";
  } else {
    $studieloopbaan = test_input($_POST["studieloopbaan"]);
  }

  if (empty($_POST["diploma"])) {
    $diploma = "";
  } else {
    $diploma = test_input($_POST["diploma"]);
  }

  if (empty($_POST["hobby"])) {
    $hobby = "";
  } else {
    $hobby = test_input($_POST["hobby"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2 style = "color:red;" > 
        Portfolio Builder
    </h2> 
<p><span class="error">* Vereist om in te vullen</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Naam: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Adress: <input type="text" name="adress" value="<?php echo $adress;?>">
  <span class="error">* <?php echo $adressErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Werkervaring: <input type="text" name="werkervaring" value="<?php echo $werkervaring;?>">
  <span class="error"><?php echo $werkervaringErr;?></span>
  <br><br>
  Studieloopbaan: <input type="text" name="studieloopbaan" value="<?php echo $studieloopbaan;?>">
  <span class="error"><?php echo $studieloopbaanErr;?></span>
  <br><br>
  Diploma's: <input type="text" name="diploma" value="<?php echo $diploma;?>">
  <span class="error"><?php echo $diplomaErr;?></span>
  <br><br>
  Hobby's: <input type="text" name="hobby" value="<?php echo $hobby;?>">
  <span class="error"><?php echo $hobbyErr;?></span>
  <br><br>
  Wat zijn jouw vaardigheden?: 
  <br><br>
  <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Geslacht:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Vrouw
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Man
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>




<body style = "text-align:center;">

    <h1 style = "color:red;" > 
        Verander achtergrond naar geel
    </h1> 

    <p id = "GFG_UP" style =
        "font-size: 16px; font-weight: bold;">
    </p>

    <button onclick = "gfg_Run()"> 
        Klik hier
    </button>

    <p id = "GFG_DOWN" style =
        "color:green; font-size: 20px; font-weight: bold;">
    </p>

    <script>
        var el_up = document.getElementById("GFG_UP");
        var el_down = document.getElementById("GFG_DOWN");
        var str = "Klik op het knopje om de achtergrond aan te passen";

        el_up.innerHTML = str;

        function changeColor(color) {
            document.body.style.background = color;
        }

        function gfg_Run() {
            changeColor('yellow');
            el_down.innerHTML = "";
        }
    </script>




<?php
echo "<h2>Jouw portfolio:</h2>";
echo $name;
echo "<br>";
echo $adress;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $werkervaring;
echo "<br>";
echo $studieloopbaan;
echo "<br>";
echo $diploma;
echo "<br>";
echo $hobby;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>
