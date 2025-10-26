<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Requests - MyRides Driver</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/css/custom.css" rel="stylesheet">
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
            <a href="requests.html" class="sidebar-link active">
                <i class="fas fa-bell me-2"></i> Requests
            </a>
            <a href="earnings.html" class="sidebar-link">
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
                    <div class="form-check form-switch me-3">
                        <input class="form-check-input" type="checkbox" id="onlineStatus" checked>
                        <label class="form-check-label" for="onlineStatus">Online</label>
                    </div>
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
            <!-- Active Request Card -->
            <div id="activeRequestCard" class="dashboard-card mb-4" style="display: none;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center mb-3">
                            <img src="../../assets/images/default-avatar.png" 
                                 class="rounded-circle me-3" 
                                 width="50" 
                                 height="50" 
                                 alt="Rider">
                            <div>
                                <h5 class="mb-1" id="activeRiderName">John Doe</h5>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success me-2">4.8 ★</span>
                                    <span class="text-muted">250m away</span>
                                </div>
                            </div>
                        </div>

                        <div class="ride-route mb-3">
                            <div class="d-flex mb-2">
                                <i class="fas fa-circle text-success me-3 mt-2"></i>
                                <div>
                                    <small class="text-muted">Pickup Location</small>
                                    <p class="mb-0" id="activePickupLocation">Central Market</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <i class="fas fa-map-marker-alt text-danger me-3 mt-2"></i>
                                <div>
                                    <small class="text-muted">Destination</small>
                                    <p class="mb-0" id="activeDestination">Emir Palace</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-success flex-grow-1" onclick="startRide()">
                                <i class="fas fa-play me-2"></i> Start Ride
                            </button>
                            <button class="btn btn-danger" onclick="cancelRide()">
                                <i class="fas fa-times"></i>
                            </button>
                            <button class="btn btn-primary" onclick="callRider()">
                                <i class="fas fa-phone"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="activeRideMap" style="height: 200px;" class="rounded"></div>
                    </div>
                </div>
            </div>

            <!-- New Request Card -->
            <div id="newRequestCard" class="dashboard-card mb-4">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center mb-3">
                            <img src="../../assets/images/default-avatar.png" 
                                 class="rounded-circle me-3" 
                                 width="50" 
                                 height="50" 
                                 alt="Rider">
                            <div>
                                <h5 class="mb-1">Mati Bako</h5>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success me-2">4.5 ★</span>
                                    <span class="text-muted">500m away</span>
                                </div>
                            </div>
                        </div>

                        <div class="ride-route mb-3">
                            <div class="d-flex mb-2">
                                <i class="fas fa-circle text-success me-3 mt-2"></i>
                                <div>
                                    <small class="text-muted">Pickup Location</small>
                                    <p class="mb-0">Federal Polytechnic</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <i class="fas fa-map-marker-alt text-danger me-3 mt-2"></i>
                                <div>
                                    <small class="text-muted">Destination</small>
                                    <p class="mb-0">General Hospital</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <small class="text-muted d-block">Estimated Distance</small>
                                <strong>3.2 km</strong>
                            </div>
                            <div class="col-4">
                                <small class="text-muted d-block">Estimated Time</small>
                                <strong>15 mins</strong>
                            </div>
                            <div class="col-4">
                                <small class="text-muted d-block">Fare</small>
                                <strong>₦500</strong>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary-custom flex-grow-1" onclick="acceptRequest()">
                                Accept Request
                            </button>
                            <button class="btn btn-outline-danger" onclick="declineRequest()">
                                Decline
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <div class="countdown-timer">
                                <span id="countdownSeconds">15</span> seconds to respond
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="requestMap" style="height: 200px;" class="rounded"></div>
                    </div>
                </div>
            </div>

            <!-- Recent Requests -->
            <div class="dashboard-card">
                <h5 class="mb-4">Recent Requests</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Rider</th>
                                <th>Pickup</th>
                                <th>Destination</th>
                                <th>Distance</th>
                                <th>Fare</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10:30 AM</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../../assets/images/default-avatar.png" 
                                             class="rounded-circle me-2" 
                                             width="24" 
                                             height="24" 
                                             alt="Rider">
                                        Mohammed Ibrahim
                                    </div>
                                </td>
                                <td>Central Market</td>
                                <td>Emir Palace</td>
                                <td>2.5 km</td>
                                <td>₦400</td>
                                <td><span class="badge bg-success">Completed</span></td>
                            </tr>
                            <tr>
                                <td>09:45 AM</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../../assets/images/default-avatar.png" 
                                             class="rounded-circle me-2" 
                                             width="24" 
                                             height="24" 
                                             alt="Rider">
                                        John Doe
                                    </div>
                                </td>
                                <td>Ahmadu Bello Way</td>
                                <td>Federal Medical Center</td>
                                <td>3.8 km</td>
                                <td>₦600</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="../../assets/js/map-manager.js"></script>
    <script>
        let mapManager;
        let activeMapManager;
        let countdownInterval;
        const requestTimeout = 15; // seconds

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize maps
            mapManager = new MapManager('requestMap');
            activeMapManager = new MapManager('activeRideMap');

            // Load driver data
            const driverData = JSON.parse(localStorage.getItem('driverData') || '{}');
            if (driverData.name) {
                document.getElementById('driverName').textContent = driverData.name;
            }

            // Add markers for the sample request
            mapManager.addTricycleMarker(12.4539, 4.1975, { name: 'Pickup' });
            mapManager.addTricycleMarker(12.4559, 4.1995, { name: 'Destination' });
            mapManager.showRoute(12.4539, 4.1975, 12.4559, 4.1995);

            // Start countdown timer
            startCountdown();

            // Add online status change handler
            document.getElementById('onlineStatus').addEventListener('change', function(e) {
                updateOnlineStatus(e.target.checked);
            });
        });

        function startCountdown() {
            let seconds = requestTimeout;
            document.getElementById('countdownSeconds').textContent = seconds;

            countdownInterval = setInterval(() => {
                seconds--;
                document.getElementById('countdownSeconds').textContent = seconds;

                if (seconds <= 0) {
                    clearInterval(countdownInterval);
                    declineRequest();
                }
            }, 1000);
        }

        function acceptRequest() {
            clearInterval(countdownInterval);
            document.getElementById('newRequestCard').style.display = 'none';
            document.getElementById('activeRequestCard').style.display = 'block';

            // Update active ride map
            activeMapManager.addTricycleMarker(12.4539, 4.1975, { name: 'Pickup' });
            activeMapManager.addTricycleMarker(12.4559, 4.1995, { name: 'Destination' });
            activeMapManager.showRoute(12.4539, 4.1975, 12.4559, 4.1995);
        }

        function declineRequest() {
            clearInterval(countdownInterval);
            document.getElementById('newRequestCard').style.display = 'none';
            // In a real app, you would send the decline response to the server
        }

        function startRide() {
            // In a real app, you would update the ride status on the server
            alert('Ride started. Navigate to pickup location.');
        }

        function cancelRide() {
            if (confirm('Are you sure you want to cancel this ride?')) {
                document.getElementById('activeRequestCard').style.display = 'none';
                // In a real app, you would send the cancellation to the server
            }
        }

        function callRider() {
            // In a real app, you would initiate a call to the rider
            alert('Calling rider...');
        }

        function updateOnlineStatus(isOnline) {
            // In a real app, you would update the driver's status on the server
            const status = isOnline ? 'online' : 'offline';
            alert(`You are now ${status}`);
        }
    </script>
</body>
</html>