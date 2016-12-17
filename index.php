<?php
if (!isset($_COOKIE["username"])){
  header("Location: login.htm"); /* Redirect browser */
}else{
  header("Location: showDish.php"); /* Redirect browser ..*/
}
exit;
?>