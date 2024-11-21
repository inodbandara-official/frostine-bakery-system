<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frostine employee Management</title>
    <link rel="stylesheet" href="Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <b>
                    <li><a href="../Dashboard/Dashboard.php"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                    <li><a href="../Employee Management/EmployeeManagement.php"><i class="fas fa-users"></i>&nbsp;Employees</a></li>
                    <li><a href="#"><i class="fas fa-truck"></i>&nbsp;Suppliers</a></li>
                    <li><a href="../Product Management/ProductManagement.php"><i class="fas fa-box"></i>&nbsp;Inventory</a></li>
                    <li><a href="../Customer Management/customerManagement.php"><i class="fas fa-user"></i>&nbsp;Customers</a></li>
                    <li><a href="#"><i class="fas fa-shopping-cart"></i>&nbsp;Orders</a></li>
                    </b>
                </ul>
            </nav>
            <div class="logo">
                <img src="../Images/FrostineLogo.png" alt="Frostine Logo">
            </div>
        </aside>
        <main>
            <header>
                <h1><i class="fas fa-user"></i>&nbsp&nbsp;Dashboard</h1>
                <div class="user-info">
                    <span>Dasun Pathirana</span>
                    <span>(Head Manager)</span>
                </div>
            </header>
            <div class="content">
            <div class="overview">
                    <div class="card">
                        <h2>15</h2>
                        <p>Total Employees</p>
                    </div>
                    <div class="card">
                        <h2>120</h2>
                        <p>Total Orders</p>
                    </div>
                    <div class="card">
                        <h2>35</h2>
                        <p>Inventory Items</p>
                    </div>
            </div>
            <div class="overview">
                    <div class="card">
                        <h2>200</h2>
                        <p>Total Customers</p>
                    </div>
                    <div class="card">
                        <h2>10</h2>
                        <p>Total Employees</p>
                    </div>
                    <div class="card">
                        <h2>8</h2>
                        <p>Total Suppliers</p>
                    </div>
            </div>
                <div class="main-content">
                    <div class="chart">
                        <canvas id="salesChart"></canvas>
                    </div>
                    <div class="calendar-container">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="Dashboard.js"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</html>



