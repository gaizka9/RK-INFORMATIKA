<?php

class menu {
    function account($data) {
        ?>
        <div class="main-container">
            <!-- Contenedor para los gráficos -->
            <div class="container mt-4">
                <?php $this->graficos($data); ?>
            </div>

            <!-- Contenedor para la tabla con el filtro -->
            <div class='container mt-4'>
                <!-- Filtro -->
                <div class="d-flex mb-3">
                    <!-- Filtro por Fecha -->
                    <div class="me-2">
                        <label for="dateFilterInput" class="form-label">Filter by Date:</label>
                        <input type="text" id="dateFilterInput" class="form-control" placeholder="Enter date (YYYY-MM-DD)" onkeyup="filterByDate()">
                    </div>
                </div>

                <!-- Ajustar el contenedor de la tabla para habilitar el scroll -->
                <div style="height: 400px; overflow-y: scroll;">
                    <table class='table table-bordered table-striped table-hover'>
                        <thead class='thead-dark'>
                            <tr>
                                <th class='bg-dark text-light'>Dates</th>
                                <th class='bg-dark text-light'>Money</th>
                                <th class='bg-dark text-light'>Incomes</th>
                                <th class='bg-dark text-light'>Expenses</th>
                            </tr>
                        </thead>
                        <tbody id="dataBody">
                        <?php
                        if (!empty($data)) {
                            foreach ($data as $row) {
                                echo "<tr data-date='" . date('Y-m-d', strtotime($row['dates'])) . "'>
                                        <td>" . date('Y-m-d', strtotime($row['dates'])) . "</td>
                                        <td>" . number_format($row['money'], 2) . "</td>
                                        <td class='text-success'> + " . number_format($row['incomes'], 2) . "</td>
                                        <td class='text-danger'> - " . number_format($row['expenses'], 2) . "</td>
                                    </tr>";
                                $balance = $row['money'] + $row['incomes'] - $row['expenses'];
                                $balance = number_format($balance, 2);
                            }
                        } else {
                            $balance = number_format(0, 2);
                        }
                        echo "<tr style='border-bottom: none;'>
                                <th style='border: 2px solid black;'>Balance</th>
                                <td style='border: 2px solid black;'>" .  $balance . " €</td>
                            </tr>";
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }


    function sharePanel($usuarios, $users){
        ?> <div class="container mt-3">
                    <ul class="list-group min-width-custom">
                        <li class="list-group-item list-group-item-success">SHARE</li><?php
                    foreach ($users as $user) {
                        
                       echo ' <form method="POST" action="./controller.php">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="me-2">' . $user['name'] . '</span> 
                            <button type="submit" name="sharebtn" class="btn btn-success" value="' . $user['id'] . '">Share</button>
                        </li>
                        </form>';
                    }
                    
                    ?></ul>
                    <ul class="list-group min-width-custom mt-3">
                        <li class="list-group-item list-group-item-danger">UNSHARE</li><?php
                    foreach ($usuarios as $usuario) {
                        echo '
                        <form method="POST" action="./controller.php">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="me-2">' . $usuario['name'] . '</span> 
                            <button type="submit" name="unsharebtn" class="btn btn-danger" value="' . $usuario['id'] . '">Remove</button>
                        </li>
                        </form>';
                    }
                        
                ?>   </ul>
                </div><?php
    }

    function promoting($usuarios, $users){
        ?> <div class="container mt-3">
                    <ul class="list-group min-width-custom">
                        <li class="list-group-item list-group-item-success">BE PROMOTED</li><?php
                    foreach ($users as $user) {
                        
                       echo ' <form method="POST" action="./controller.php">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="me-2">' . $user['name'] . '</span> 
                            <button type="submit" name="beAdmin" class="btn btn-success" value="' . $user['id'] . '">Promote</button>
                        </li>
                        </form>';
                    }
                    
                    ?></ul>
                    <ul class="list-group min-width-custom mt-3">
                        <li class="list-group-item list-group-item-danger">BE DEMOTED</li><?php
                    foreach ($usuarios as $usuario) {
                        echo '
                        <form method="POST" action="./controller.php">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="me-2">' . $usuario['name'] . '</span> 
                            <button type="submit" name="rmAdmin" class="btn btn-danger" value="' . $usuario['id'] . '">Demote</button>
                        </li>
                        </form>';
                    }
                        
                ?>   </ul>
                </div><?php
    }


    function enterMoney(){

        ?><div class="login-container" id="incomeExpenseDiv">
                <h2 class="login-title">INCOME/EXPENSE</h2>
                <form method="POST" action="./controller.php">
                    <div class="mb-3">
                        <label for="income" class="form-label">Income</label>
                        <input type="number" name="income" class="form-control" id="income" placeholder="Enter income amount" value="0.00" step="0.01" min="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="expense" class="form-label">Expense</label>
                        <input type="number" name="expense" class="form-control" id="expense" placeholder="Enter expense amount" value="0.00" step="0.01" min="0.01" required>
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <button type="submit" name="submitIncomeExpense" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div><?php
    }

    function sendMoney($max, $users){ 

        ?><div class="login-container" id="incomeExpenseDiv">
            <h2 class="login-title">SEND MONEY</h2>
            <form method="POST" action="./controller.php">
                
                <div class="mb-3">
                    <label for="money" class="form-label">Money</label>
                    <input type="number" name="money" class="form-control" id="money" placeholder="Enter money amount" value="0.01" step="0.01" min="0.01" max="<?= $max ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="whom" class="form-label">Whom</label>
                    <select name="whom" class="form-control" id="whom" required>
                        <option value="" disabled selected>Select a user</option>
                        <?php
                        foreach ($users as $user) {
                            echo "<option value='{$user['id']}'>{$user['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="d-flex justify-content-center gap-2">
                    <button type="submit" name="submitSendMoney" class="btn btn-primary">Send</button>
                </div>
                
            </form>
        </div><?php
    }

    function eraseUser($users){ 

        ?><div class="login-container" id="incomeExpenseDiv">
            <h2 class="erasedanger">ERASE USER</h2>
            <form method="POST" action="./controller.php">
                
                <div class="mb-3">
                    <select name="whomErase" class="form-control" id="whom" required>
                        <option value="" disabled selected>Select a user</option>
                        <?php
                        foreach ($users as $user) {
                            echo "<option value='{$user['id']}'>{$user['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="d-flex justify-content-center gap-2">
                    <button type="submit" name="submitErase" class="btn btn-danger">Erase</button>
                </div>
                
            </form>
        </div><?php
    }

    function updateUser($userInfo){
        
        ?>
        <div class="login-container">
            <h2 class="login-title"> <?= $userInfo['username'] ?></h2>
            
            <form method="POST" action="./controller.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="upname" class="form-control" id="name" placeholder="First Name" value="<?= $userInfo['name'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="uplastname" class="form-control" id="lastname" placeholder="Last Name" value="<?= $userInfo['lastname'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="upusername" class="form-control" id="username" placeholder="User name" value="<?= $userInfo['username'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="upemail" class="form-control" id="email" placeholder="Email" value="<?= $userInfo['email'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (actual or new)</label>
                    <input type="password" name="uppassword" class="form-control" id="password" placeholder="Password" required>
                </div>

                <div class="d-flex justify-content-center gap-2">
                        <button type="submit" name="doUpdate" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
        <?php
    }

    public function graficos($data) {

        $moneyArray = [];

        $balance = 0.00;

        if (!empty($data)) {
            foreach ($data as $row) {
                $moneyArray[] = [
                    'number' => $row['dates'], 
                    'money' => $row['money'],
                    'incomes' => $row['incomes'],
                    'expenses' => $row['expenses'] * -1
                    
                ];

                $balance = $row['money'] + $row['incomes'] - $row['expenses'];
            }


            $moneyArray[] = [
                'number' => date('Y-m-d'), 
                'money' => $balance
            ];
        }
    
                echo '<script>';
                echo 'var moneyArray = ' . json_encode($moneyArray) . ';'; // Convert to JSON
                echo '</script>';
        ?>
        <div class="graficos">
            <figure>
                <canvas id="yearsChart"></canvas>
            </figure>
            <figure>
                <canvas id="tresdChart"></canvas>
            </figure>
        </div>
        <?php
    }

}
