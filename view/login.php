
<?php

class view {
    function login($ruta) {
        ?>
       
    <div class="login-container logear" id="loginDiv">
            <h2 class="login-title">LOG IN</h2>
            <form method="POST" action="<?= $ruta ?>/controller/loginController.php">
                <div class="mb-3">
                    <label for="username" class="form-label">User</label>
                    <input type="text" name="name" class="form-control" id="username" placeholder="User name" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="psw" class="form-control" id="password" placeholder="User password" required>
                </div>

                <?php
                session_start();
                    $remaining_attempts = $_SESSION['attempts'];
                    echo "<div class='alert alert-warning'>You have $remaining_attempts attempts left.</div>";
                
                ?>

                <div class="d-flex gap-2">
                    <button type="button" id="signupbutton" class="btn btn-secondary flex-grow-1">Sign up</button>
                    <button type="submit" name="loginbutton" class="btn btn-primary flex-grow-1">Log in</button>
                </div>
            </form>
    </div>
    <div class="login-container" id="signupDiv" style="display: none;">
        <h2 class="login-title">SIGN IN</h2>
        <form method="POST" action="<?= $ruta ?>/controller/loginController.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="crname" class="form-control" id="name" placeholder="First Name" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" name="crlastname" class="form-control" id="lastname" placeholder="Last Name" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="crusername" class="form-control" id="username" placeholder="User name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="cremail" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="crpassword" class="form-control" id="password" placeholder="Password" required>
            </div>

            <div class="d-flex gap-2">
                <button type="button" id="signinbutton" class="btn btn-secondary flex-grow-1">Sign in</button>
                <button type="submit" name="createbutton" class="btn btn-primary flex-grow-1">Create</button>
            </div>
        </form>
    </div>
    <?php
    }


    function loginBlocked() {
        ?>
       
    <div class="login-container logear" id="loginDiv">
            <h2 class="login-title">LOGIN</h2>
            
                <div class="mb-3">
                    <label for="username" class="form-label">User</label>
                    <input type="text" disabled name="name" class="form-control" id="username" placeholder="User name">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" disabled name="psw" class="form-control" id="password" placeholder="User password">
                </div>

                <?php
               
                    echo "<div class='alert alert-danger'>You have 0 attempts left.</div>";
                    echo "<div class='alert alert-warning'>Wait a minute to try again.</div>";
                
                ?>
                <div class="d-flex gap-2">
                    <button type="button" id="signupbutton" class="btn btn-secondary flex-grow-1">Sign up</button>
                    <button type="submit" disabled class="btn btn-primary flex-grow-1">Log in</button>
                </div>
    </div>



    <div class="login-container" id="signupDiv" style="display: none;">
        <h2 class="login-title">SIGN IN</h2>
        <form method="POST" action="./../controller/loginController.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="crname" class="form-control" id="name" placeholder="First Name" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" name="crlastname" class="form-control" id="lastname" placeholder="Last Name" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="crusername" class="form-control" id="username" placeholder="User name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="cremail" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="crpassword" class="form-control" id="password" placeholder="Password" required>
            </div>

            <div class="d-flex gap-2">
                <button type="button" id="signinbutton" class="btn btn-secondary flex-grow-1">Sign in</button>
                <button type="submit" name="createbutton" class="btn btn-primary flex-grow-1">Create</button>
            </div>
        </form>
    </div>
    
        
    <?php
    
    }


    function errorWait() {
        ?>
        <script>
            setTimeout(function(){
                window.location.href = './../index.php';
            }, 60000); // Esperar 60 segundos (60000 milisegundos)

            </script>
        
    <?php
    
    
    }
}
