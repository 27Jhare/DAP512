<!DOCTYPE Html>
<header>

<div id="contact">
        <a class=".right" href="Login.php">My Account</a>
        <?php $cookiename="user";
        
        if (isset($_COOKIE[$cookiename])&& $_COOKIE[$cookiename] != ""){
        echo '<a class= ".right" href="logout.php">Logout User</a>';
        }
       ?>
       </div>
    <h1 id="logo"><a href="index.php">testco Ltd</a></h1>

    <div id="contact">

       </div>
       

    
</header>