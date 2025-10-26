<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Rides - MyRides Admin</title>
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
            <a href="users.html" class="sidebar-link">
                <i class="fas fa-users me-2"></i> Users
            </a>
            <a href="rides.html" class="sidebar-link active">
                <i class="fas fa-car me-2"></i> Rides
            </a>
            <a href="settings.html" class="sidebar-link">
                <i class="fas fa-cog me-2"></i> Settings
            </a>
            <a href="../../auth/login.html" class="sidebar-link">
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
                    <span class="me-2">Welcome, <span id="userName">Admin</span></span>
                    <img src="../../assets/images/default-avatar.png" 
                         class="rounded-circle" 
                         width="32" 
                         height="32" 
                         alt="Profile">
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container-fluid">
            <!-- Rides Overview Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Rides</h6>
                                <h3 class="mb-0">5,234</h3>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 8% this month
                                </small>
                            </div>
                            <div class="bg-primary bg-opacity-10 p-3 rounded">
                                <i class="fas fa-route fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Active Rides</h6>
                                <h3 class="mb-0">42</h3>
                                <small class="text-success">
                                    <i class="fas fa-clock"></i> Live
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
                                <h6 class="text-muted mb-1">Cancelled Rides</h6>
                                <h3 class="mb-0">23</h3>
                                <small class="text-danger">
                                    <i class="fas fa-arrow-down"></i> 2% decrease
                                </small>
                            </div>
                            <div class="bg-danger bg-opacity-10 p-3 rounded">
                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Average Rating</h6>
                                <h3 class="mb-0">4.8</h3>
                                <small class="text-warning">
                                    <i class="fas fa-star"></i> Out of 5
                                </small>
                            </div>
                            <div class="bg-warning bg-opacity-10 p-3 rounded">
                                <i class="fas fa-star fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rides Management -->
            <div class="dashboard-card">
                <!-- Filters -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0">All Rides</h5>
                    <div class="d-flex gap-2">
                        <input type="text" class="form-control" placeholder="Search rides..." id="searchRides">
                        <select class="form-select" id="statusFilter">
                            <option value="all">All Status</option>
                            <option value="completed">Completed</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <select class="form-select" id="dateFilter">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="custom">Custom Range</option>
                        </select>
                        <button class="btn btn-primary-custom" onclick="exportRides()">
                            <i class="fas fa-download me-2"></i> Export
                        </button>
                    </div>
                </div>

                <!-- Rides Table -->
                <div class="table-responsive">
                    <table class="table table-hover" id="ridesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date & Time</th>
                                <th>Driver</th>
                                <th>Rider</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample rides data - will be populated by JavaScript -->
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

    <!-- View Ride Details Modal -->
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
                                <img src="../../assets/images/default-avatar.png" 
                                     class="rounded-circle me-3" 
                                     width="50" 
                                     height="50" 
                                     alt="Driver">
                                <div>
                                    <h6 class="mb-1" id="driverName">Ibrahim Mohammed</h6>
                                    <div class="text-muted">
                                        <i class="fas fa-phone me-2"></i>
                                        <span id="driverPhone">+234 801 234 5678</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Rider Information</h6>
                            <div class="d-flex align-items-center">
                                <img src="../../assets/images/default-avatar.png" 
                                     class="rounded-circle me-3" 
                                     width="50" 
                                     height="50" 
                                     alt="Rider">
                                <div>
                                    <h6 class="mb-1" id="riderName">Shehu Abubakar</h6>
                                    <div class="text-muted">
                                        <i class="fas fa-phone me-2"></i>
                                        <span id="riderPhone">+234 802 345 6789</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6>Ride Route</h6>
                            <div id="rideMap" style="height: 200px;" class="rounded mb-3"></div>
                            <div class="ride-route">
                                <div class="d-flex mb-2">
                                    <i class="fas fa-circle text-success me-3 mt-2"></i>
                                    <div>
                                        <small class="text-muted">Pickup Location</small>
                                        <p class="mb-0" id="pickupLocation">Central Market</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <i class="fas fa-map-marker-alt text-danger me-3 mt-2"></i>
                                    <div>
                                        <small class="text-muted">Destination</small>
                                        <p class="mb-0" id="destination">Emir Palace</p>
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
                                    <td>Base Fare</td>
                                    <td>₦300</td>
                                </tr>
                                <tr>
                                    <td>Distance (3.2 km)</td>
                                    <td>₦160</td>
                                </tr>
                                <tr>
                                    <td>Waiting Time</td>
                                    <td>₦40</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td>Total Amount</td>
                                    <td>₦500</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Ride Timeline</h6>
                            <div class="timeline">
                                <div class="d-flex mb-2">
                                    <div class="me-3">10:30 AM</div>
                                    <div>Ride Requested</div>
                                </div>
                                <div class="d-flex mb-2">
                                    <div class="me-3">10:32 AM</div>
                                    <div>Driver Accepted</div>
                                </div>
                                <div class="d-flex mb-2">
                                    <div class="me-3">10:35 AM</div>
                                    <div>Pickup Complete</div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-3">10:45 AM</div>
                                    <div>Ride Completed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary-custom" onclick="printRideDetails()">
                        <i class="fas fa-print me-2"></i> Print Details
                    </button>
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
        let modalMap;

        // Sample rides data
        const rides = [
            {
                id: 'RD12345',
                datetime: '2023-10-02 10:30 AM',
                driver: 'Ibrahim Mohammed',
                rider: 'Musa Hassan',
                from: 'Central Market',
                to: 'Emir Palace',
                amount: '₦500',
                status: 'completed',
                rating: 5
            },
            {
                id: 'RD12346',
                datetime: '2023-10-02 10:45 AM',
                driver: 'Yusuf Ahmed',
                rider: 'Isa Sheki',
                from: 'Federal Polytechnic',
                to: 'General Hospital',
                amount: '₦700',
                status: 'ongoing',
                rating: null
            },
            {
                id: 'RD12347',
                datetime: '2023-10-02 11:00 AM',
                driver: 'Abubakar Sani',
                rider: 'Mohammed Ibrahim',
                from: 'Ahmadu Bello Way',
                to: 'Federal Medical Center',
                amount: '₦400',
                status: 'cancelled',
                rating: null
            }
        ];

        document.addEventListener('DOMContentLoaded', function() {
            // Load user data
            const userData = JSON.parse(localStorage.getItem('userData') || '{}');
            if (userData.name) {
                document.getElementById('userName').textContent = userData.name;
            }

            // Populate rides table
            populateRidesTable();

            // Add event listeners for filters
            document.getElementById('searchRides').addEventListener('input', filterRides);
            document.getElementById('statusFilter').addEventListener('change', filterRides);
            document.getElementById('dateFilter').addEventListener('change', filterRides);
        });

        function populateRidesTable(filteredRides = rides) {
            const tbody = document.getElementById('ridesTable').querySelector('tbody');
            tbody.innerHTML = filteredRides.map(ride => `
                <tr>
                    <td>${ride.id}</td>
                    <td>${ride.datetime}</td>
                    <td>${ride.driver}</td>
                    <td>${ride.rider}</td>
                    <td>${ride.from}</td>
                    <td>${ride.to}</td>
                    <td>${ride.amount}</td>
                    <td>
                        <span class="badge bg-${
                            ride.status === 'completed' ? 'success' :
                            ride.status === 'ongoing' ? 'primary' :
                            'danger'
                        }">
                            ${ride.status.charAt(0).toUpperCase() + ride.status.slice(1)}
                        </span>
                    </td>
                    <td>
                        ${ride.rating ? 
                            `<div class="text-warning">
                                ${'★'.repeat(ride.rating)}${'☆'.repeat(5-ride.rating)}
                            </div>` : 
                            '-'
                        }
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
            const searchTerm = document.getElementById('searchRides').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;

            const filtered = rides.filter(ride => {
                const matchesSearch = Object.values(ride).some(value => 
                    String(value).toLowerCase().includes(searchTerm)
                );
                const matchesStatus = statusFilter === 'all' || ride.status === statusFilter;
                // In a real app, you would implement proper date filtering
                const matchesDate = true;

                return matchesSearch && matchesStatus && matchesDate;
            });

            populateRidesTable(filtered);
        }

        function viewRideDetails(rideId) {
            // In a real app, you would fetch the ride details from the server
            const ride = rides.find(r => r.id === rideId);
            
            // Initialize the map in the modal
            const modal = new bootstrap.Modal(document.getElementById('rideDetailsModal'));
            modal.show();

            modal._element.addEventListener('shown.bs.modal', function () {
                if (!modalMap) {
                    modalMap = new MapManager('rideMap');
                }
                // Add markers for pickup and destination
                modalMap.addTricycleMarker(12.4539, 4.1975, { name: 'Pickup' });
                modalMap.addTricycleMarker(12.4559, 4.1995, { name: 'Destination' });
                modalMap.showRoute(12.4539, 4.1975, 12.4559, 4.1995);
            });
        }

        function exportRides() {
            // In a real app, you would implement proper export functionality
            alert('Exporting rides data...');
        }

        function printRideDetails() {
            window.print();
        }
    </script>
</body>
</html>