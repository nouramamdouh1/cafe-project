
<?php 
    include_once 'header.php';
    include_once '../../core/session.php';
?>
    <h1 class="header">Login</h1>

    <?php flash('login') ?>

    <form method="post" action="../../controller/Users.php">
    <input type="hidden" name="type" value="login">
        <input type="text" name="name/email"  
        placeholder="Username/Email...">
        <input type="password" name="usersPwd" 
        placeholder="Password...">
        <button type="submit" name="submit">Log In</button>
    </form>

    <div class="form-sub-msg"><a href="./reset-password.php">Forgotten Password?</a></div>
