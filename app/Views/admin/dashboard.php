<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MyRides</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
   <?php echo view('includes/admin/sidebar'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-link d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="d-flex align-items-center">
                    <span class="me-2">Welcome, <span id="userName">Admin</span></span>
                    <img src="<?php echo base_url() ?>assets/images/default-avatar.png" 
                         class="rounded-circle" 
                         width="32" 
                         height="32" 
                         alt="Profile">
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container-fluid">
            <!-- Analytics Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Users</h6>
                                <h3 class="mb-0">1,234</h3>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 12% this month
                                </small>
                            </div>
                            <div class="bg-primary bg-opacity-10 p-3 rounded">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Active Drivers</h6>
                                <h3 class="mb-0">45</h3>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 5% today
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
                                <h6 class="text-muted mb-1">Today's Rides</h6>
                                <h3 class="mb-0">156</h3>
                                <small class="text-danger">
                                    <i class="fas fa-arrow-down"></i> 3% vs yesterday
                                </small>
                            </div>
                            <div class="bg-warning bg-opacity-10 p-3 rounded">
                                <i class="fas fa-route fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Revenue</h6>
                                <h3 class="mb-0">₦45,670</h3>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 8% this week
                                </small>
                            </div>
                            <div class="bg-info bg-opacity-10 p-3 rounded">
                                <i class="fas fa-wallet fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Live Map and Active Rides -->
            <div class="row mb-4">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="dashboard-card p-0">
                        <div class="card-header bg-white p-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Live Tracking</h5>
                                <div class="d-flex gap-2">
                                    <span class="badge bg-success">
                                        <i class="fas fa-circle me-1"></i> 45 Active
                                    </span>
                                    <span class="badge bg-warning">
                                        <i class="fas fa-circle me-1"></i> 12 Idle
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="map" class="map-container"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dashboard-card">
                        <h5 class="mb-3">Active Rides</h5>
                        <div class="active-rides-list" style="max-height: 400px; overflow-y: auto;">
                            <!-- Sample active rides -->
                            <div class="border rounded p-3 mb-2">
                                <div class="d-flex justify-content-between mb-2">
                                    <small class="text-muted">#RD12345</small>
                                    <span class="badge bg-success">In Progress</span>
                                </div>
                                <div class="d-flex gap-2 mb-2">
                                    <img src="<?php echo base_url() ?>assets/images/default-avatar.png" 
                                         class="rounded-circle" 
                                         width="32" 
                                         height="32" 
                                         alt="Driver">
                                    <div>
                                        <h6 class="mb-0">Ibrahim M.</h6>
                                        <small class="text-muted">Driver</small>
                                    </div>
                                </div>
                                <div class="ride-route small">
                                    <div class="d-flex mb-1">
                                        <i class="fas fa-circle text-success me-2 mt-1"></i>
                                        <span>Central Market</span>
                                    </div>
                                    <div class="d-flex">
                                        <i class="fas fa-map-marker-alt text-danger me-2 mt-1"></i>
                                        <span>Emir Palace</span>
                                    </div>
                                </div>
                            </div>

                            <div class="border rounded p-3 mb-2">
                                <div class="d-flex justify-content-between mb-2">
                                    <small class="text-muted">#RD12346</small>
                                    <span class="badge bg-warning">Picking Up</span>
                                </div>
                                <div class="d-flex gap-2 mb-2">
                                    <img src="<?php echo base_url() ?>assets/images/default-avatar.png" 
                                         class="rounded-circle" 
                                         width="32" 
                                         height="32" 
                                         alt="Driver">
                                    <div>
                                        <h6 class="mb-0">Yusuf A.</h6>
                                        <small class="text-muted">Driver</small>
                                    </div>
                                </div>
                                <div class="ride-route small">
                                    <div class="d-flex mb-1">
                                        <i class="fas fa-circle text-success me-2 mt-1"></i>
                                        <span>Federal Polytechnic</span>
                                    </div>
                                    <div class="d-flex">
                                        <i class="fas fa-map-marker-alt text-danger me-2 mt-1"></i>
                                        <span>General Hospital</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row">
                <div class="col-12">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Recent Activity</h5>
                            <div class="d-flex gap-2">
                                <select class="form-select form-select-sm" id="activityTypeFilter">
                                    <option value="all">All Activities</option>
                                    <option value="rides">Rides</option>
                                    <option value="users">Users</option>
                                    <option value="payments">Payments</option>
                                </select>
                                <select class="form-select form-select-sm" id="activityTimeFilter">
                                    <option value="today">Today</option>
                                    <option value="yesterday">Yesterday</option>
                                    <option value="week">Last 7 Days</option>
                                    <option value="month">This Month</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="activityTable">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Activity</th>
                                        <th>User</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sample activities will be populated by JavaScript -->
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
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="<?php echo base_url() ?>assets/js/map-manager.js"></script>
    <script>
        let mapManager;

        // Sample activity data
        const activities = [
            {
                time: '10:45 AM',
                type: 'users',
                activity: 'New Registration',
                user: 'Ahmed Ibrahim',
                details: 'Registered as Driver',
                status: { text: 'Pending Approval', class: 'bg-warning' }
            },
            {
                time: '10:30 AM',
                type: 'rides',
                activity: 'Completed Ride',
                user: 'Fatima S.',
                details: 'Ride #RD12340 - ₦500',
                status: { text: 'Completed', class: 'bg-success' }
            },
            {
                time: '10:15 AM',
                type: 'payments',
                activity: 'Support Ticket',
                user: 'Mohammed Y.',
                details: 'Payment Issue',
                status: { text: 'Open', class: 'bg-danger' }
            }
        ];

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map
            mapManager = new MapManager('map');

            // Add sample active drivers
            const activeDrivers = [
                { id: 1, name: "Ibrahim's Tricycle", rating: 4.5, lat: 12.4539, lng: 4.1975 },
                { id: 2, name: "Yusuf's Tricycle", rating: 4.8, lat: 12.4559, lng: 4.1995 },
                { id: 3, name: "Abubakar's Tricycle", rating: 4.2, lat: 12.4519, lng: 4.1955 },
                { id: 4, name: "Musa's Tricycle", rating: 4.6, lat: 12.4529, lng: 4.1985 }
            ];

            // Add drivers to map
            activeDrivers.forEach(driver => {
                mapManager.addTricycleMarker(driver.lat, driver.lng, driver);
            });

            // Simulate driver movement
            setInterval(() => {
                activeDrivers.forEach(driver => {
                    // Add small random movement
                    driver.lat += (Math.random() - 0.5) * 0.001;
                    driver.lng += (Math.random() - 0.5) * 0.001;
                    mapManager.updateMarkerPosition(driver.id - 1, driver.lat, driver.lng);
                });
            }, 5000);

            // Load user data
            const userData = JSON.parse(localStorage.getItem('userData') || '{}');
            if (userData.name) {
                document.getElementById('userName').textContent = userData.name;
            }

            // Populate activity table
            populateActivityTable();

            // Add filter event listeners
            document.getElementById('activityTypeFilter').addEventListener('change', filterActivities);
            document.getElementById('activityTimeFilter').addEventListener('change', filterActivities);
        });

        function populateActivityTable(filter = 'all') {
            const tbody = document.getElementById('activityTable').querySelector('tbody');
            const filteredActivities = filter === 'all' 
                ? activities 
                : activities.filter(activity => activity.type === filter);

            tbody.innerHTML = filteredActivities.map(activity => `
                <tr>
                    <td>${activity.time}</td>
                    <td>${activity.activity}</td>
                    <td>${activity.user}</td>
                    <td>${activity.details}</td>
                    <td>
                        <span class="badge ${activity.status.class}">
                            ${activity.status.text}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" 
                                onclick="handleAction('${activity.type}', '${activity.user}')">
                            ${activity.type === 'users' ? 'Review' : 
                              activity.type === 'rides' ? 'View' : 'Handle'}
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        function filterActivities() {
            const typeFilter = document.getElementById('activityTypeFilter').value;
            populateActivityTable(typeFilter);
        }

        function handleAction(type, user) {
            // This would be replaced with actual action handlers
            alert(`Handling ${type} action for ${user}`);
        }
    </script>
</body>
</html>