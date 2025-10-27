<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Rides - MyRides</title>
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
 `
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-link d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="d-flex align-items-center">
                    <span class="me-2">Welcome, <span id="riderName">Sabiu</span></span>
                    <img src="<?php echo base_url(); ?>assets/images/default-avatar.png" 
                         class="rounded-circle" 
                         width="32" 
                         height="32" 
                         alt="Profile">
                </div>
            </div>
        </nav>

        <!-- Content Area -->
        <div class="container-fluid">
            <!-- Active Ride Card -->
            <div id="activeRideCard" class="dashboard-card mb-4">
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="mb-4">Active Ride</h5>
                        <div class="d-flex align-items-center mb-3">
                            <img src="<?php echo base_url(); ?>assets/images/default-avatar.png" 
                                 class="rounded-circle me-3" 
                                 width="50" 
                                 height="50" 
                                 alt="Driver">
                            <div>
                                <h6 class="mb-1">Ibrahim Mohammed</h6>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success me-2">4.8 ★</span>
                                    <span class="text-muted">Tricycle: KBB-123-XA</span>
                                </div>
                            </div>
                        </div>

                        <div class="ride-route mb-3">
                            <div class="d-flex mb-2">
                                <i class="fas fa-circle text-success me-3 mt-2"></i>
                                <div>
                                    <small class="text-muted">Pickup Location</small>
                                    <p class="mb-0">Central Market</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <i class="fas fa-map-marker-alt text-danger me-3 mt-2"></i>
                                <div>
                                    <small class="text-muted">Destination</small>
                                    <p class="mb-0">Emir Palace</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <small class="text-muted d-block">Estimated Time</small>
                                <strong>15 mins</strong>
                            </div>
                            <div class="col-4">
                                <small class="text-muted d-block">Distance</small>
                                <strong>3.2 km</strong>
                            </div>
                            <div class="col-4">
                                <small class="text-muted d-block">Fare</small>
                                <strong>₦500</strong>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary flex-grow-1" onclick="callDriver()">
                                <i class="fas fa-phone me-2"></i> Call Driver
                            </button>
                            <button class="btn btn-danger" onclick="cancelRide()">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                            <button class="btn btn-primary" onclick="shareRide()">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="activeRideMap" style="height: 300px;" class="rounded"></div>
                    </div>
                </div>
            </div>

            <!-- Rides History -->
            <div class="dashboard-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0">Ride History</h5>
                    <div class="d-flex gap-2">
                        <input type="text" class="form-control" placeholder="Search rides..." id="searchInput">
                        <select class="form-select" id="statusFilter">
                            <option value="all">All Status</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <select class="form-select" id="dateFilter">
                            <option value="all">All Time</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table" id="ridesTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Driver</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Distance</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample data - would be populated dynamically -->
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Rides pagination" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Ride Details Modal -->
    <div class="modal fade" id="rideDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ride Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Driver Information</h6>
                            <div class="d-flex align-items-center">
                                <img src="<?php echo base_url(); ?>assets/images/default-avatar.png" 
                                     class="rounded-circle me-3" 
                                     width="50" 
                                     height="50" 
                                     alt="Driver">
                                <div>
                                    <h6 class="mb-1" id="modalDriverName">Ibrahim Mohammed</h6>
                                    <div class="text-muted">
                                        <i class="fas fa-phone me-2"></i>
                                        <span id="modalDriverPhone">+234 801 234 5678</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Ride Information</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td>Date & Time:</td>
                                    <td id="modalDateTime">Oct 2, 2023 10:30 AM</td>
                                </tr>
                                <tr>
                                    <td>Vehicle:</td>
                                    <td id="modalVehicle">Tricycle (KBB-123-XA)</td>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td id="modalStatus">
                                        <span class="badge bg-success">Completed</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <h6>Route Details</h6>
                            <div id="rideMap" style="height: 200px;" class="rounded mb-3"></div>
                            <div class="ride-route">
                                <div class="d-flex mb-2">
                                    <i class="fas fa-circle text-success me-3 mt-2"></i>
                                    <div>
                                        <small class="text-muted">Pickup Location</small>
                                        <p class="mb-0" id="modalPickup">Central Market</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <i class="fas fa-map-marker-alt text-danger me-3 mt-2"></i>
                                    <div>
                                        <small class="text-muted">Destination</small>
                                        <p class="mb-0" id="modalDestination">Emir Palace</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h6>Payment Details</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td>Base Fare:</td>
                                    <td>₦300</td>
                                </tr>
                                <tr>
                                    <td>Distance (3.2 km):</td>
                                    <td>₦160</td>
                                </tr>
                                <tr>
                                    <td>Waiting Time:</td>
                                    <td>₦40</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td>Total Amount:</td>
                                    <td>₦500</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Your Rating</h6>
                            <div class="mb-3">
                                <div class="rating-stars text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <small class="text-muted d-block mt-2">
                                    Great service and very polite driver!
                                </small>
                            </div>
                            <button class="btn btn-primary-custom btn-sm" onclick="editRating()">
                                Edit Rating
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary-custom" onclick="reportIssue()">
                        <i class="fas fa-flag me-2"></i> Report Issue
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
        let activeMapManager;

        // Sample rides data
        const rides = [
            {
                id: 'RD12345',
                datetime: '2023-10-02 10:30 AM',
                driver: 'Ibrahim Mohammed',
                from: 'Central Market',
                to: 'Emir Palace',
                distance: '2.5 km',
                amount: '₦500',
                status: 'completed'
            },
            {
                id: 'RD12346',
                datetime: '2023-10-02 09:45 AM',
                driver: 'Yusuf Ahmed',
                from: 'Federal Polytechnic',
                to: 'General Hospital',
                distance: '3.2 km',
                amount: '₦600',
                status: 'completed'
            },
            {
                id: 'RD12347',
                datetime: '2023-10-02 09:00 AM',
                driver: 'Abubakar Sani',
                from: 'Ahmadu Bello Way',
                to: 'Federal Medical Center',
                distance: '4.0 km',
                amount: '₦700',
                status: 'cancelled'
            }
        ];

        document.addEventListener('DOMContentLoaded', function() {
            // Load rider data
            const riderData = JSON.parse(localStorage.getItem('riderData') || '{}');
            if (riderData.name) {
                document.getElementById('riderName').textContent = riderData.name;
            }

            // Initialize maps
            activeMapManager = new MapManager('activeRideMap');
            // Add markers for active ride
            activeMapManager.addTricycleMarker(12.4539, 4.1975, { name: 'Pickup' });
            activeMapManager.addTricycleMarker(12.4559, 4.1995, { name: 'Destination' });
            activeMapManager.showRoute(12.4539, 4.1975, 12.4559, 4.1995);

            // Add event listeners for filters
            document.getElementById('searchInput').addEventListener('input', filterRides);
            document.getElementById('statusFilter').addEventListener('change', filterRides);
            document.getElementById('dateFilter').addEventListener('change', filterRides);

            // Populate initial ride history
            populateRideHistory();
        });

        function populateRideHistory(filteredRides = rides) {
            const tbody = document.getElementById('ridesTable').querySelector('tbody');
            tbody.innerHTML = filteredRides.map(ride => `
                <tr>
                    <td>${ride.datetime}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="<?php echo base_url(); ?>assets/images/default-avatar.png" 
                                 class="rounded-circle me-2" 
                                 width="24" 
                                 height="24" 
                                 alt="${ride.driver}">
                            ${ride.driver}
                        </div>
                    </td>
                    <td>${ride.from}</td>
                    <td>${ride.to}</td>
                    <td>${ride.distance}</td>
                    <td>${ride.amount}</td>
                    <td>
                        <span class="badge bg-${
                            ride.status === 'completed' ? 'success' : 'danger'
                        }">
                            ${ride.status.charAt(0).toUpperCase() + ride.status.slice(1)}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary-custom" 
                                onclick="viewRideDetails('${ride.id}')">
                            View
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        function filterRides() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;

            const filtered = rides.filter(ride => {
                const matchesSearch = Object.values(ride).some(value => 
                    String(value).toLowerCase().includes(searchTerm)
                );
                const matchesStatus = statusFilter === 'all' || ride.status === statusFilter;
                // In a real app, you would implement proper date filtering
                const matchesDate = dateFilter === 'all' || true;

                return matchesSearch && matchesStatus && matchesDate;
            });

            populateRideHistory(filtered);
        }

        function viewRideDetails(rideId) {
            // In a real app, you would fetch the ride details from the server
            const ride = rides.find(r => r.id === rideId);
            
            // Initialize the map in the modal
            const modal = new bootstrap.Modal(document.getElementById('rideDetailsModal'));
            modal.show();

            modal._element.addEventListener('shown.bs.modal', function () {
                if (!mapManager) {
                    mapManager = new MapManager('rideMap');
                }
                // Add markers for the ride
                mapManager.addTricycleMarker(12.4539, 4.1975, { name: 'Pickup' });
                mapManager.addTricycleMarker(12.4559, 4.1995, { name: 'Destination' });
                mapManager.showRoute(12.4539, 4.1975, 12.4559, 4.1995);
            });
        }

        function callDriver() {
            // In a real app, you would initiate a call to the driver
            alert('Calling driver...');
        }

        function cancelRide() {
            if (confirm('Are you sure you want to cancel this ride?')) {
                // In a real app, you would send the cancellation to the server
                alert('Ride cancelled successfully');
            }
        }

        function shareRide() {
            // In a real app, you would implement ride sharing functionality
            alert('Sharing ride details...');
        }

        function editRating() {
            // In a real app, you would show a rating edit form
            alert('Rating edit functionality will be implemented here');
        }

        function reportIssue() {
            // In a real app, you would show an issue reporting form
            alert('Issue reporting functionality will be implemented here');
        }
    </script>
</body>
</html>