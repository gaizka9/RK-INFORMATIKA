<?php

class sidebar{
    function sidebar($usuarios) {
        session_start();
        ?><div class="sidebar">
            <h1><b>BANK</b></h1>
        <ul class="navbar-nav">
            <li class="nav-item">
                <form id="myForm" action="./controller.php" method="post">
                    <button type="submit" name="incExp" class="btn">Income/Expense</button>
                </form>
            </li>
            <li class="nav-item">
                <form id="myForm" action="./controller.php" method="post">
                    <button type="submit" name="sendMoney" class="btn">Send Money</button>
                </form>
            </li>
            <li class="nav-item">
                <form id="myForm" action="./controller.php" method="post">
                    <button type="submit" name="toShare" class="btn">Share</button>
                </form>
            </li>
            <li class="nav-item dropdown">
                <a class="btn" href="#" id="toggleDropdown">Shared with you</a>
                <ul class="dropdown-menu" id="dropdown-menu">
                    <li>
                        <form method="POST" action="./controller.php">
                            <button type="submit" id="submitButton" name="usuarioID" value="<?= $_SESSION['id'] ?>">Myself</button>
                        </form>
                    </li>
                    <li>
                        <!-- Campo de entrada para el filtro -->
                        <input type="text" id="filterInput" placeholder="Filter by username" />
                    </li>
                    <?php
                    foreach ($usuarios as $usuario) {
                        echo '<li class="user-item" data-name="' . $usuario['name'] . '">
                                <form method="POST" action="./controller.php">
                                    <button type="submit" name="usuarioID" value="' . $usuario['id'] . '">' . $usuario['name'] . '</button>
                                </form>
                            </li>';
                    }
                    ?>
                </ul>
            </li>
            <li class="nav-item">
                <form id="myForm" action="./controller.php" method="post">
                    <button type="submit" name="upUser" class="btn">User</button>
                </form>
            </li>
            <li class="nav-item">
                <form method="POST" action="./loginController.php">
                    <button type="submit" name="logoutbutton" class="btn btn-danger">Logout</button>
                </form>
            </li>
            <?php 
            if ($_SESSION['admin']){
            ?>
                <li class="nav-item">
                    <form method="POST" action="./controller.php">
                        <button type="submit" name="hiring" class="btn">Promote</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form method="POST" action="./controller.php">
                        <button type="submit" name="erasing" class="btn">Erase</button>
                    </form>
                </li>
            <?php 
            }
            ?>
        </ul>
    </div><?php    

    }
}

?>