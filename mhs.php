<html>
<body> <table border ="1" cellspacing="0" cellpadding="4"   width="50%"> 
<?php echo "<h2>Your Input:</h2>" ?>
<tr>
<td>NIM</td>
<td><?php echo $_POST["nim"] ?> </td>
</tr>

<tr>
<td>NAMA</td>
<td><?php echo $_POST["name"] ?> </td>
</tr>

<tr>
<td>ALAMAT</td>
<td><?php echo $_POST["alamat"] ?> </td>
</tr>

<tr>
<td>JENIS KELAMIN</td>
<td><?php echo $_POST["gender"] ?> </td>
</tr>

<tr>
<td>PROGRAM STUDI</td>
<td><?php echo $_POST["prodi"] ?> </td>
</tr>

<tr>
<td>BAHASA PEMOGRAMAN DIKUASAI</td>
<td><?php echo $_POST["bahasa"] ?>  </td>
</tr>
</table>
</body>
</html>