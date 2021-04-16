<?php

echo "<pre>";
print_r($_COOKIE);
echo"</pre>";
setcookie("user", "", time() - 3600,"/");
echo "<pre>";
print_r($_COOKIE);
echo"</pre>";
header("location: index.php");
  
?>