<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Dashboard - MyRides</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
   <?php  echo view('rider/includes/sidebar.php'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-link d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="d-flex align-items-center">
                    <span class="me-2">Welcome, <span id="userName">John Doe</span></span>
                    <img src="<?php echo base_url(); ?>assets/images/default-avatar.png" 
                         class="rounded-circle" 
                         width="32" 
                         height="32" 
                         alt="Profile">
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4 class="mb-3">Request a Ride</h4>
                    <div class="dashboard-card">
                        <form id="rideRequestForm">
                            <div class="mb-3">
                                <label for="pickup" class="form-label">Pickup Location</label>
                                <div class="input-group">
                                    <input type="text" 
                                           class="form-control" 
                                           id="pickup" 
                                           placeholder="Enter pickup location">
                                    <button class="btn btn-outline-secondary" 
                                            type="button"
                                            onclick="useCurrentLocation('pickup')">
                                        <i class="fas fa-location-crosshairs"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="destination" class="form-label">Destination</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="destination" 
                                       placeholder="Enter your destination">
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Additional Notes</label>
                                <textarea class="form-control" 
                                         id="notes" 
                                         rows="2"
                                         placeholder="Any special instructions?"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-custom">
                                Find Nearby Tricycles
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-3">Available Tricycles</h4>
                    <div class="dashboard-card p-0">
                        <div id="map" class="map-container"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h4 class="mb-3">Recent Rides</h4>
                    <div class="custom-table">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Driver</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="ridesTableBody">
                                <!-- Rides will be populated by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ride Request Modal -->
    <div class="modal fade" id="rideRequestModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Ride Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="driver-info mb-3">
                        <div class="d-flex align-items-center">
                            <img src="<?php echo base_url(); ?>assets/images/default-avatar.png" 
                                 class="rounded-circle me-3" 
                                 width="50" 
                                 height="50" 
                                 alt="Driver">
                            <div>
                                <h6 class="mb-1">Driver Name</h6>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <span>4.5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ride-details">
                        <div class="mb-2">
                            <small class="text-muted">Pickup Location</small>
                            <p class="mb-0" id="confirmPickup"></p>
                        </div>
                        <div class="mb-2">
                            <small class="text-muted">Destination</small>
                            <p class="mb-0" id="confirmDestination"></p>
                        </div>
                        <div class="mb-2">
                            <small class="text-muted">Estimated Fare</small>
                            <p class="mb-0">₦300 - ₦500</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary-custom" onclick="confirmRide()">
                        Confirm Ride
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/map-manager.js"></script>
    <script>
        let mapManager;

        // Sample ride data
        const recentRides = [
            {
                date: '2023-10-02 14:30',
                driver: 'Ibrahim M.',
                from: 'Ahmadu Bello Way',
                to: 'Federal Medical Center',
                status: 'Completed',
                amount: '₦500'
            },
            {
                date: '2023-10-01 09:15',
                driver: 'Yusuf A.',
                from: 'Central Market',
                to: 'Emir Palace',
                status: 'Completed',
                amount: '₦300'
            }
        ];

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map
            mapManager = new MapManager('map');

            // Add some sample tricycles
            const sampleDrivers = [
                { id: 1, name: "Ibrahim's Tricycle", rating: 4.5, lat: 12.4539, lng: 4.1975 },
                { id: 2, name: "Yusuf's Tricycle", rating: 4.8, lat: 12.4559, lng: 4.1995 },
                { id: 3, name: "Abubakar's Tricycle", rating: 4.2, lat: 12.4519, lng: 4.1955 }
            ];

            sampleDrivers.forEach(driver => {
                mapManager.addTricycleMarker(driver.lat, driver.lng, driver);
            });

            // Handle form submission
            document.getElementById('rideRequestForm').addEventListener('submit', function(e) {
                e.preventDefault();
                showRideRequestModal();
            });

            // Load user data from localStorage
            const userData = JSON.parse(localStorage.getItem('userData') || '{}');
            if (userData.name) {
                document.getElementById('userName').textContent = userData.name;
            }

            // Populate rides table
            populateRidesTable();
        });

        // Populate rides table
        function populateRidesTable() {
            const tbody = document.getElementById('ridesTableBody');
            tbody.innerHTML = recentRides.map(ride => `
                <tr>
                    <td>${ride.date}</td>
                    <td>${ride.driver}</td>
                    <td>${ride.from}</td>
                    <td>${ride.to}</td>
                    <td>
                        <span class="badge bg-success">
                            ${ride.status}
                        </span>
                    </td>
                    <td>${ride.amount}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" 
                                onclick="viewRideDetails()">
                            View Details
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Use current location
        async function useCurrentLocation(inputId) {
            try {
                const location = await mapManager.getUserLocation();
                // In a real app, you would reverse geocode the coordinates
                document.getElementById(inputId).value = `${location.lat}, ${location.lng}`;
            } catch (error) {
                alert('Could not get your location. Please enter it manually.');
            }
        }

        // Show ride request modal
        function showRideRequestModal() {
            const pickup = document.getElementById('pickup').value;
            const destination = document.getElementById('destination').value;

            document.getElementById('confirmPickup').textContent = pickup;
            document.getElementById('confirmDestination').textContent = destination;

            new bootstrap.Modal(document.getElementById('rideRequestModal')).show();
        }

        // Confirm ride
        function confirmRide() {
            // Here you would make an API call to your backend
            alert('Ride confirmed! Driver is on the way.');
            bootstrap.Modal.getInstance(document.getElementById('rideRequestModal')).hide();
        }

        // View ride details
        function viewRideDetails() {
            // Implement ride details view
            alert('Viewing ride details...');
        }

        // Request ride from map marker
        function requestRide(driverId) {
            // Here you would pre-fill the form with the selected driver
            document.getElementById('rideRequestModal').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>