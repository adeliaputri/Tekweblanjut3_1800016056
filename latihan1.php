<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> <table border ="1" cellspacing="1" cellpadding="5" width="50%"> 

<?php
// define variables and set to empty values
$nameErr = $nimErr = $genderErr = $websiteErr = "";
$name = $nim = $gender = $prodi = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["nim"])) {
    $nimErr = "nim is required";
  } else {
    $nim = test_input($_POST["nim"]);
    // check if e-mail address is well-formed
    if (!filter_var($nim, FILTER_VALIDATE_INT)) {
      $nimErr = "Invalid nim format";
    }
  }
   
   if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
   
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
   

  if (isset($_POST["prodi"])) {
  $prodi = test_input($_POST["prodi"]);
}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>FORM DATA MAHASISWA</h2>
<p><span class="error">* Masukkan data anda</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  NIM : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp <input type="text" name="nim" value="<?php echo $nim;?>">
  <span class="error">* <?php echo $nimErr;?></span>
  <br><br>
  
  Nama : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  
  Jenis Kelamin :
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Laki-Laki") echo "checked";?> value="Laki-Laki">Laki-Laki
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Perempuan") echo "checked";?> value="Perempuan">Perempuan
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  
  Program Studi :
  <SELECT NAME="prodi" id= "prodi" >
  <OPTION VALUE="FISIKA"  > FISIKA </OPTION>
  <OPTION VALUE="BIOLOGI"  >BIOLOGI </OPTION>
  <OPTION VALUE="MATEMATIKA"  >MATEMATIKA </OPTION>
  <OPTION VALUE="SISTEM INFORMASI"   >SISTEM INFORMASI </OPTION>
  </SELECT>
  <br><br>
  
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
  
</form>

<?php echo "<h2>Your Input:</h2>" ?>

<tr>
<td>NIM</td>
<td><?php echo $nim ?> </td>
</tr>

<tr>
<td>NAMA</td>
<td><?php echo $name ?> </td>
</tr>

<tr>
<td>JENIS KELAMIN</td>
<td><?php echo $gender ?> </td>
</tr>

<tr>
<td>PROGRAM STUDI</td>
<td><?php echo $_POST["prodi"] ?> </td>
</tr>

</table>

</body>
</html>