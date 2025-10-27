<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - MyRides Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4 class="mb-0">Shehubk Riders</h4>
        </div>
        <div class="sidebar-nav">
            <a href="<?php echo site_url('admin') ?>" class="sidebar-link">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
            <a href="<?php echo site_url('admin/users') ?>" class="sidebar-link active">
                <i class="fas fa-users me-2"></i> Users
            </a>
            <a href="<?php echo site_url('admin/rides') ?>" class="sidebar-link">
                <i class="fas fa-car me-2"></i> Rides
            </a>
            <a href="<?php echo site_url('admin/settings') ?>" class="sidebar-link">
                <i class="fas fa-cog me-2"></i> Settings
            </a>
            <a href="<?php echo site_url('auth/logout') ?>" class="sidebar-link">
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
            <!-- Users Overview Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Users</h6>
                                <h3 class="mb-0">2,543</h3>
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
                                <h3 class="mb-0">156</h3>
                                <small class="text-success">
                                    <i class="fas fa-car"></i> Available
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
                                <h6 class="text-muted mb-1">Active Riders</h6>
                                <h3 class="mb-0">2,387</h3>
                                <small class="text-primary">
                                    <i class="fas fa-user"></i> Registered
                                </small>
                            </div>
                            <div class="bg-info bg-opacity-10 p-3 rounded">
                                <i class="fas fa-user fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Verification Pending</h6>
                                <h3 class="mb-0">15</h3>
                                <small class="text-warning">
                                    <i class="fas fa-clock"></i> Awaiting Review
                                </small>
                            </div>
                            <div class="bg-warning bg-opacity-10 p-3 rounded">
                                <i class="fas fa-user-clock fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Management -->
            <div class="dashboard-card">
                <!-- Actions and Filters -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0">All Users</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fas fa-plus me-2"></i> Add New User
                        </button>
                        <input type="text" class="form-control" placeholder="Search users..." id="searchUsers">
                        <select class="form-select" id="roleFilter">
                            <option value="all">All Roles</option>
                            <option value="driver">Drivers</option>
                            <option value="rider">Riders</option>
                            <option value="admin">Admins</option>
                        </select>
                        <select class="form-select" id="statusFilter">
                            <option value="all">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="pending">Pending</option>
                            <option value="suspended">Suspended</option>
                        </select>
                        <button class="btn btn-outline-primary" onclick="exportUsers()">
                            <i class="fas fa-download me-2"></i> Export
                        </button>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="table-responsive">
                    <table class="table table-hover" id="usersTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Joined</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample users data - will be populated by JavaScript -->
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Users pagination" class="mt-4">
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

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" required>
                                <option value="">Select Role</option>
                                <option value="rider">Rider</option>
                                <option value="driver">Driver</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary-custom" onclick="addUser()">Add User</button>
                </div>
            </div>
        </div>
    </div>

    <!-- User Details Modal -->
    <div class="modal fade" id="userDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs mb-4" id="userDetailsTabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#rides">Rides</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#documents">Documents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#settings">Settings</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Profile Tab -->
                        <div class="tab-pane fade show active" id="profile">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo base_url() ?>assets/images/default-avatar.png" 
                                         class="rounded-circle mb-3" 
                                         width="150" 
                                         height="150" 
                                         alt="User">
                                    <h5 id="userDetailName">Sabiu Lawal</h5>
                                    <p class="text-muted" id="userDetailRole">Driver</p>
                                </div>
                                <div class="col-md-8">
                                    <h6>Contact Information</h6>
                                    <table class="table">
                                        <tr>
                                            <td>Phone:</td>
                                            <td id="userDetailPhone">+234 801 234 5678</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td id="userDetailEmail">sabiu@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td id="userDetailAddress">123 Main St, Birnin Kebbi</td>
                                        </tr>
                                    </table>

                                    <h6 class="mt-4">Account Information</h6>
                                    <table class="table">
                                        <tr>
                                            <td>Member Since:</td>
                                            <td id="userDetailJoined">October 1, 2023</td>
                                        </tr>
                                        <tr>
                                            <td>Status:</td>
                                            <td id="userDetailStatus">
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Last Login:</td>
                                            <td id="userDetailLastLogin">2 hours ago</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Rides Tab -->
                        <div class="tab-pane fade" id="rides">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userRidesTable">
                                        <!-- Will be populated by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Documents Tab -->
                        <div class="tab-pane fade" id="documents">
                            <div class="row" id="userDocuments">
                                <!-- Will be populated by JavaScript -->
                            </div>
                        </div>

                        <!-- Settings Tab -->
                        <div class="tab-pane fade" id="settings">
                            <form id="userSettingsForm">
                                <div class="mb-3">
                                    <label class="form-label">Account Status</label>
                                    <select class="form-select" id="userStatusSelect">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="suspended">Suspended</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select class="form-select" id="userRoleSelect">
                                        <option value="rider">Rider</option>
                                        <option value="driver">Driver</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Notifications</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="emailRides">
                                        <label class="form-check-label">Ride Updates</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="emailPayments">
                                        <label class="form-check-label">Payment Updates</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="emailPromotions">
                                        <label class="form-check-label">Promotions</label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary-custom" onclick="saveUserSettings()">
                                    Save Changes
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample users data
        const users = [
            {
                id: 'U12345',
                name: 'Ibrahim Mohammed',
                role: 'driver',
                phone: '+234 801 234 5678',
                email: 'ibrahim@example.com',
                joined: '2023-09-15',
                status: 'active',
                avatar: '<?php echo base_url() ?>assets/images/default-avatar.png'
            },
            {
                id: 'U12346',
                name: 'Sabiu Lawali',
                role: 'rider',
                phone: '+234 802 345 6789',
                email: 'sabiu@example.com',
                joined: '2023-09-20',
                status: 'active',
                avatar: '<?php echo base_url() ?>assets/images/default-avatar.png'
            },
            {
                id: 'U12347',
                name: 'Fahad Muhammad',
                role: 'rider',
                phone: '+234 803 456 7890',
                email: 'fahad@example.com',
                joined: '2023-09-25',
                status: 'pending',
                avatar: '<?php echo base_url() ?>assets/images/default-avatar.png'
            }
        ];

        document.addEventListener('DOMContentLoaded', function() {
            // Load user data
            const userData = JSON.parse(localStorage.getItem('userData') || '{}');
            if (userData.name) {
                document.getElementById('userName').textContent = userData.name;
            }

            // Populate users table
            populateUsersTable();

            // Add event listeners for filters
            document.getElementById('searchUsers').addEventListener('input', filterUsers);
            document.getElementById('roleFilter').addEventListener('change', filterUsers);
            document.getElementById('statusFilter').addEventListener('change', filterUsers);
        });

        function populateUsersTable(filteredUsers = users) {
            const tbody = document.getElementById('usersTable').querySelector('tbody');
            tbody.innerHTML = filteredUsers.map(user => `
                <tr>
                    <td>${user.id}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="${user.avatar}" 
                                 class="rounded-circle me-2" 
                                 width="32" 
                                 height="32" 
                                 alt="${user.name}">
                            ${user.name}
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-${
                            user.role === 'admin' ? 'danger' :
                            user.role === 'driver' ? 'primary' :
                            'info'
                        }">
                            ${user.role.charAt(0).toUpperCase() + user.role.slice(1)}
                        </span>
                    </td>
                    <td>${user.phone}</td>
                    <td>${user.email}</td>
                    <td>${user.joined}</td>
                    <td>
                        <span class="badge bg-${
                            user.status === 'active' ? 'success' :
                            user.status === 'pending' ? 'warning' :
                            'danger'
                        }">
                            ${user.status.charAt(0).toUpperCase() + user.status.slice(1)}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary-custom" 
                                    onclick="viewUserDetails('${user.id}')">
                                View
                            </button>
                            <button class="btn btn-sm btn-outline-danger" 
                                    onclick="confirmDeleteUser('${user.id}')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function filterUsers() {
            const searchTerm = document.getElementById('searchUsers').value.toLowerCase();
            const roleFilter = document.getElementById('roleFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;

            const filtered = users.filter(user => {
                const matchesSearch = Object.values(user).some(value => 
                    String(value).toLowerCase().includes(searchTerm)
                );
                const matchesRole = roleFilter === 'all' || user.role === roleFilter;
                const matchesStatus = statusFilter === 'all' || user.status === statusFilter;

                return matchesSearch && matchesRole && matchesStatus;
            });

            populateUsersTable(filtered);
        }

        function viewUserDetails(userId) {
            // In a real app, you would fetch the user details from the server
            const user = users.find(u => u.id === userId);
            if (user) {
                // Populate user details modal
                document.getElementById('userDetailName').textContent = user.name;
                document.getElementById('userDetailRole').textContent = 
                    user.role.charAt(0).toUpperCase() + user.role.slice(1);
                document.getElementById('userDetailPhone').textContent = user.phone;
                document.getElementById('userDetailEmail').textContent = user.email;

                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('userDetailsModal'));
                modal.show();
            }
        }

        function addUser() {
            // In a real app, you would validate and submit the form data to the server
            alert('User added successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
            modal.hide();
        }

        function confirmDeleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                // In a real app, you would send a delete request to the server
                alert('User deleted successfully!');
                // Refresh the table
                const updatedUsers = users.filter(u => u.id !== userId);
                populateUsersTable(updatedUsers);
            }
        }

        function exportUsers() {
            // In a real app, you would implement proper export functionality
            alert('Exporting users data...');
        }

        function saveUserSettings() {
            // In a real app, you would save the settings to the server
            alert('User settings saved successfully!');
        }
    </script>
</body>
</html>