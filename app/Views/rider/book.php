<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Ride - MyRides</title>
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
    <style>
        #bookingMap {
            height: calc(100vh - 80px);
        }
        .booking-panel {
            position: absolute;
            top: 80px;
            left: 20px;
            width: 400px;
            z-index: 1000;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .favorite-places {
            white-space: nowrap;
            overflow-x: auto;
            padding: 10px 0;
        }
        .favorite-place {
            display: inline-block;
            padding: 8px 15px;
            margin-right: 10px;
            background: #f8f9fa;
            border-radius: 20px;
            cursor: pointer;
        }
        .favorite-place:hover {
            background: #e9ecef;
        }
    </style>
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
            <a href="book.html" class="sidebar-link active">
                <i class="fas fa-car me-2"></i> Book a Ride
            </a>
            <a href="rides.html" class="sidebar-link">
                <i class="fas fa-route me-2"></i> My Rides
            </a>
            <a href="payments.html" class="sidebar-link">
                <i class="fas fa-wallet me-2"></i> Payments
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
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-0 shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-link d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="d-flex align-items-center">
                    <span class="me-2">Welcome, <span id="riderName">Sabiu</span></span>
                    <img src="../../assets/images/default-avatar.png" 
                         class="rounded-circle" 
                         width="32" 
                         height="32" 
                         alt="Profile">
                </div>
            </div>
        </nav>

        <!-- Map and Booking Panel -->
        <div class="position-relative">
            <!-- Map Container -->
            <div id="bookingMap"></div>

            <!-- Booking Panel -->
            <div class="booking-panel p-4">
                <!-- Step 1: Location Selection -->
                <div id="locationStep">
                    <h5 class="mb-4">Book a Ride</h5>
                    
                    <!-- Favorite Places -->
                    <div class="favorite-places mb-4">
                        <div class="favorite-place">
                            <i class="fas fa-home me-2"></i> Home
                        </div>
                        <div class="favorite-place">
                            <i class="fas fa-briefcase me-2"></i> Work
                        </div>
                        <div class="favorite-place">
                            <i class="fas fa-shopping-cart me-2"></i> Market
                        </div>
                        <div class="favorite-place">
                            <i class="fas fa-plus me-2"></i> Add Place
                        </div>
                    </div>

                    <!-- Location Inputs -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-circle text-success"></i>
                            </span>
                            <input type="text" class="form-control" 
                                   id="pickupLocation" 
                                   placeholder="Pickup location">
                            <button class="btn btn-outline-secondary" 
                                    type="button"
                                    onclick="useCurrentLocation()">
                                <i class="fas fa-location-arrow"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-map-marker-alt text-danger"></i>
                            </span>
                            <input type="text" class="form-control" 
                                   id="destination" 
                                   placeholder="Where to?">
                        </div>
                    </div>

                    <button class="btn btn-primary-custom w-100" onclick="confirmLocations()">
                        Confirm Locations
                    </button>
                </div>

                <!-- Step 2: Ride Options -->
                <div id="rideOptionsStep" style="display: none;">
                    <div class="d-flex align-items-center mb-4">
                        <button class="btn btn-link p-0 me-3" onclick="showLocationStep()">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <h5 class="mb-0">Choose Ride Option</h5>
                    </div>

                    <div class="ride-options mb-4">
                        <div class="ride-option mb-3 p-3 border rounded cursor-pointer">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fas fa-car fa-2x"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Regular Ride</h6>
                                    <small class="text-muted">3.2 km • 15 mins</small>
                                </div>
                                <div class="text-end">
                                    <h6 class="mb-1">₦500</h6>
                                    <small class="text-muted">Best Price</small>
                                </div>
                            </div>
                        </div>

                        <div class="ride-option mb-3 p-3 border rounded cursor-pointer">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Share Ride</h6>
                                    <small class="text-muted">3.2 km • 20 mins</small>
                                </div>
                                <div class="text-end">
                                    <h6 class="mb-1">₦300</h6>
                                    <small class="text-success">Save 40%</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6>Payment Method</h6>
                        <select class="form-select">
                            <option value="cash">Cash</option>
                            <option value="card">Card Payment</option>
                            <option value="wallet">Wallet (₦2,500)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <h6>Additional Notes</h6>
                        <textarea class="form-control" rows="2" 
                                 placeholder="Any special instructions for the driver?"></textarea>
                    </div>

                    <button class="btn btn-primary-custom w-100" onclick="confirmBooking()">
                        Book Ride Now
                    </button>
                </div>

                <!-- Step 3: Finding Driver -->
                <div id="findingDriverStep" style="display: none;">
                    <div class="text-center py-4">
                        <div class="spinner-grow text-primary mb-3" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <h5>Finding your driver...</h5>
                        <p class="text-muted mb-4">This usually takes 1-3 minutes</p>
                        <button class="btn btn-outline-danger" onclick="cancelSearch()">
                            Cancel
                        </button>
                    </div>
                </div>

                <!-- Step 4: Driver Found -->
                <div id="driverFoundStep" style="display: none;">
                    <div class="text-center mb-4">
                        <h5>Driver Found!</h5>
                        <p class="text-muted">Your ride will arrive in 3 minutes</p>
                    </div>

                    <div class="driver-info mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="../../assets/images/default-avatar.png" 
                                 class="rounded-circle me-3" 
                                 width="60" 
                                 height="60" 
                                 alt="Driver">
                            <div>
                                <h6 class="mb-1">Ibrahim Mohammed</h6>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i> 4.8 (245 rides)
                                </div>
                            </div>
                        </div>
                        <div class="vehicle-info p-3 bg-light rounded">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Vehicle</span>
                                <strong>Tricycle (Keke NAPEP)</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Plate Number</span>
                                <strong>KBB-123-XA</strong>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" onclick="callDriver()">
                            <i class="fas fa-phone me-2"></i> Call Driver
                        </button>
                        <button class="btn btn-outline-danger" onclick="cancelRide()">
                            Cancel Ride
                        </button>
                    </div>
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

        document.addEventListener('DOMContentLoaded', function() {
            // Load rider data
            const riderData = JSON.parse(localStorage.getItem('riderData') || '{}');
            if (riderData.name) {
                document.getElementById('riderName').textContent = riderData.name;
            }

            // Initialize map
            mapManager = new MapManager('bookingMap');
        });

        function useCurrentLocation() {
            // In a real app, you would use the Geolocation API
            document.getElementById('pickupLocation').value = 'Current Location';
            mapManager.addTricycleMarker(12.4539, 4.1975, { name: 'You are here' });
        }

        function showLocationStep() {
            document.getElementById('locationStep').style.display = 'block';
            document.getElementById('rideOptionsStep').style.display = 'none';
            document.getElementById('findingDriverStep').style.display = 'none';
            document.getElementById('driverFoundStep').style.display = 'none';
        }

        function confirmLocations() {
            const pickup = document.getElementById('pickupLocation').value;
            const destination = document.getElementById('destination').value;

            if (!pickup || !destination) {
                alert('Please enter both pickup and destination locations');
                return;
            }

            // Show route on map
            mapManager.addTricycleMarker(12.4539, 4.1975, { name: 'Pickup' });
            mapManager.addTricycleMarker(12.4559, 4.1995, { name: 'Destination' });
            mapManager.showRoute(12.4539, 4.1975, 12.4559, 4.1995);

            // Show ride options step
            document.getElementById('locationStep').style.display = 'none';
            document.getElementById('rideOptionsStep').style.display = 'block';
        }

        function confirmBooking() {
            document.getElementById('rideOptionsStep').style.display = 'none';
            document.getElementById('findingDriverStep').style.display = 'block';

            // Simulate finding a driver after 3 seconds
            setTimeout(() => {
                document.getElementById('findingDriverStep').style.display = 'none';
                document.getElementById('driverFoundStep').style.display = 'block';
            }, 3000);
        }

        function cancelSearch() {
            if (confirm('Are you sure you want to cancel the search?')) {
                showLocationStep();
            }
        }

        function cancelRide() {
            if (confirm('Are you sure you want to cancel this ride?')) {
                showLocationStep();
            }
        }

        function callDriver() {
            // In a real app, you would initiate a call to the driver
            alert('Calling driver...');
        }
    </script>
</body>
</html>