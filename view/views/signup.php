<?php 
    include_once 'header.php';
    include_once '../../core/session.php';
?>

    <h1 class="header">Signup</h1>

    <?php flash('register') ?>

    <form method="post" action="../../controller/Users.php">
        <input type="hidden" name="type" value="register">
        <input type="text" name="usersName" 
        placeholder="Full name...">
        <input type="text" name="usersEmail" 
        placeholder="Email...">
        <input type="text" name="usersUid" 
        placeholder="Username...">
        <input type="password" name="usersPwd" 
        placeholder="Password...">
        <input type="password" name="pwdRepeat" 
        placeholder="Repeat password">
        <button type="submit" name="submit">Sign Up</button>
    </form>
    
