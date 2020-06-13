<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> <table border ="1" cellspacing="0" cellpadding="4"   width="50%"> 

<?php
// define variables and set to empty values
$nameErr = $nimErr = $genderErr = $websiteErr = "";
$name = $nim = $gender = $prodi = $bahasa = $alamat = "";

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
   
  if (empty($_POST["alamat"])) {
    $alamat = "";
  } else {
    $alamat = test_input($_POST["alamat"]);
  }

  if (isset($_POST["prodi"])) {
  $prodi = test_input($_POST["prodi"]);
}

  if (isset($_POST["bahasa"])) {
  $bahasa = test_input($_POST["bahasa"]);
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
<p><span class="">Masukkan Data Anda</span></p>

<form method="post" action="mhs.php">  
  
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

  Alamat: 
  <br>
  <textarea name="alamat" rows="5" cols="40"><?php echo $alamat;?></textarea>
  <br><br>
  
  Program Studi :
  <SELECT NAME="prodi" id= "prodi" >
  <OPTION VALUE="FISIKA"> FISIKA </OPTION>
  <OPTION VALUE="BIOLOGI">BIOLOGI </OPTION>
  <OPTION VALUE="MATEMATIKA">MATEMATIKA </OPTION>
  <OPTION VALUE="SISTEM INFORMASI">SISTEM INFORMASI </OPTION>
  </SELECT>
  <br><br>
  
  Bahasa Pemrograman yang dikuasai : 
  <br>
  <br NAME="bahasa" id= "bahasa">
  
  <INPUT TYPE=CHECKBOX NAME="bahasa" VALUE="PASCAL/DELPHI"> PASCAL/DELPHI <BR>
  <INPUT TYPE=CHECKBOX NAME="bahasa" VALUE="C/C++"> C/C++ <BR>
  <INPUT TYPE=CHECKBOX NAME="bahasa" VALUE="VISUAL BASIC"> VISUAL BASIC <BR>
  
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
  
</form>
</body>
</html>