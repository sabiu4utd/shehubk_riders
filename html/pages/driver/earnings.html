<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings - MyRides Driver</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/css/custom.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4 class="mb-0">Shehubk Riders</h4>
        </div>
        <div class="sidebar-nav">
            <a href="dashboard.html" class="sidebar-link">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
            <a href="requests.html" class="sidebar-link">
                <i class="fas fa-bell me-2"></i> Requests
            </a>
            <a href="earnings.html" class="sidebar-link active">
                <i class="fas fa-wallet me-2"></i> Earnings
            </a>
            <a href="history.html" class="sidebar-link">
                <i class="fas fa-history me-2"></i> History
            </a>
            <a href="profile.html" class="sidebar-link">
                <i class="fas fa-user me-2"></i> Profile
            </a>
            <a href="../auth/login.html" class="sidebar-link">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-link d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="d-flex align-items-center">
                    <span class="me-2">Welcome, <span id="driverName">Ibrahim</span></span>
                    <img src="../../assets/images/default-avatar.png" 
                         class="rounded-circle" 
                         width="32" 
                         height="32" 
                         alt="Profile">
                </div>
            </div>
        </nav>

        <!-- Content Area -->
        <div class="container-fluid">
            <!-- Time Period Filter -->
            <div class="dashboard-card mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="btn-group">
                            <button class="btn btn-outline-primary active" onclick="updateEarningsPeriod('today')">
                                Today
                            </button>
                            <button class="btn btn-outline-primary" onclick="updateEarningsPeriod('week')">
                                This Week
                            </button>
                            <button class="btn btn-outline-primary" onclick="updateEarningsPeriod('month')">
                                This Month
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="date" class="form-control" id="startDate">
                            <input type="date" class="form-control" id="endDate">
                            <button class="btn btn-primary-custom" onclick="filterByDateRange()">
                                Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings Summary Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Earnings</h6>
                                <h3 class="mb-0">₦12,500</h3>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 8% vs last period
                                </small>
                            </div>
                            <div class="bg-primary bg-opacity-10 p-3 rounded">
                                <i class="fas fa-wallet fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Rides</h6>
                                <h3 class="mb-0">25</h3>
                                <small class="text-success">
                                    <i class="fas fa-car"></i> Completed
                                </small>
                            </div>
                            <div class="bg-success bg-opacity-10 p-3 rounded">
                                <i class="fas fa-car fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Average Per Ride</h6>
                                <h3 class="mb-0">₦500</h3>
                                <small class="text-primary">
                                    <i class="fas fa-calculator"></i> Average
                                </small>
                            </div>
                            <div class="bg-info bg-opacity-10 p-3 rounded">
                                <i class="fas fa-calculator fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Online Hours</h6>
                                <h3 class="mb-0">8.5</h3>
                                <small class="text-warning">
                                    <i class="fas fa-clock"></i> Hours
                                </small>
                            </div>
                            <div class="bg-warning bg-opacity-10 p-3 rounded">
                                <i class="fas fa-clock fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings Chart -->
            <div class="dashboard-card mb-4">
                <h5 class="mb-4">Earnings Overview</h5>
                <canvas id="earningsChart"></canvas>
            </div>

            <!-- Earnings Breakdown -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="dashboard-card">
                        <h5 class="mb-4">Recent Earnings</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date & Time</th>
                                        <th>Ride ID</th>
                                        <th>Route</th>
                                        <th>Distance</th>
                                        <th>Duration</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Oct 2, 10:30 AM</td>
                                        <td>RD12345</td>
                                        <td>Central Market → Emir Palace</td>
                                        <td>2.5 km</td>
                                        <td>15 mins</td>
                                        <td>₦500</td>
                                    </tr>
                                    <tr>
                                        <td>Oct 2, 09:45 AM</td>
                                        <td>RD12344</td>
                                        <td>Federal Poly → General Hospital</td>
                                        <td>3.2 km</td>
                                        <td>20 mins</td>
                                        <td>₦600</td>
                                    </tr>
                                    <tr>
                                        <td>Oct 2, 09:00 AM</td>
                                        <td>RD12343</td>
                                        <td>Ahmadu Bello Way → FMC</td>
                                        <td>4.0 km</td>
                                        <td>25 mins</td>
                                        <td>₦700</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="dashboard-card">
                        <h5 class="mb-4">Earnings Breakdown</h5>
                        <canvas id="earningsBreakdown"></canvas>
                        <div class="mt-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Base Fares</span>
                                <strong>₦8,000</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Distance Bonus</span>
                                <strong>₦2,500</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Time Bonus</span>
                                <strong>₦1,000</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tips</span>
                                <strong>₦1,000</strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <strong>Total Earnings</strong>
                                <strong>₦12,500</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Withdrawal Section -->
            <div class="dashboard-card">
                <h5 class="mb-4">Withdraw Earnings</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Available Balance</label>
                            <h3 class="text-success">₦12,500</h3>
                        </div>
                        <form id="withdrawalForm">
                            <div class="mb-3">
                                <label class="form-label">Withdrawal Amount</label>
                                <input type="number" class="form-control" min="1000" max="12500">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bank Account</label>
                                <select class="form-select">
                                    <option>Access Bank - **** 1234</option>
                                    <option>Add New Account</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary-custom">
                                Withdraw Funds
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3">Recent Withdrawals</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Oct 1, 2023</td>
                                        <td>₦10,000</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>Sep 30, 2023</td>
                                        <td>₦8,500</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load driver data
            const driverData = JSON.parse(localStorage.getItem('driverData') || '{}');
            if (driverData.name) {
                document.getElementById('driverName').textContent = driverData.name;
            }

            // Initialize charts
            initializeEarningsChart();
            initializeBreakdownChart();

            // Initialize date inputs
            const today = new Date();
            document.getElementById('endDate').valueAsDate = today;
            const lastWeek = new Date(today);
            lastWeek.setDate(lastWeek.getDate() - 7);
            document.getElementById('startDate').valueAsDate = lastWeek;

            // Add form submission handler
            document.getElementById('withdrawalForm').addEventListener('submit', function(e) {
                e.preventDefault();
                handleWithdrawal();
            });
        });

        function initializeEarningsChart() {
            const ctx = document.getElementById('earningsChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['9 AM', '10 AM', '11 AM', '12 PM', '1 PM', '2 PM', '3 PM'],
                    datasets: [{
                        label: 'Earnings (₦)',
                        data: [500, 1200, 1800, 2500, 3200, 4000, 4800],
                        borderColor: '#28a745',
                        tension: 0.4,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        function initializeBreakdownChart() {
            const ctx = document.getElementById('earningsBreakdown').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Base Fares', 'Distance Bonus', 'Time Bonus', 'Tips'],
                    datasets: [{
                        data: [8000, 2500, 1000, 1000],
                        backgroundColor: [
                            '#28a745',
                            '#007bff',
                            '#ffc107',
                            '#17a2b8'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        function updateEarningsPeriod(period) {
            // In a real app, you would fetch data for the selected period
            alert(`Updating earnings for ${period}`);
        }

        function filterByDateRange() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            // In a real app, you would fetch data for the selected date range
            alert(`Filtering earnings from ${startDate} to ${endDate}`);
        }

        function handleWithdrawal() {
            // In a real app, you would process the withdrawal request
            alert('Withdrawal request submitted successfully!');
        }
    </script>
</body>
</html>