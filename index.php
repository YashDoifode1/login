<?php
include('includes/header.php');

 ?>

<?php
//session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>

<?php include('includes/footer.html'); ?>

