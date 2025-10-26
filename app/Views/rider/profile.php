<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - MyRides</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/css/custom.css" rel="stylesheet">
    <style>
        .profile-header {
            background: linear-gradient(45deg, var(--primary-color), #4a90e2);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            border: 4px solid white;
            border-radius: 50%;
            object-fit: cover;
        }
        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
        }
        .favorite-location {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .favorite-location:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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
            <a href="book.html" class="sidebar-link">
                <i class="fas fa-car me-2"></i> Book a Ride
            </a>
            <a href="rides.html" class="sidebar-link">
                <i class="fas fa-route me-2"></i> My Rides
            </a>
            <a href="payments.html" class="sidebar-link">
                <i class="fas fa-wallet me-2"></i> Payments
            </a>
            <a href="profile.html" class="sidebar-link active">
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
                    <span class="me-2">Welcome, <span id="riderName">Sabiu</span></span>
                    <img src="../../assets/images/default-avatar.png" 
                         class="rounded-circle" 
                         width="32" 
                         height="32" 
                         alt="Profile">
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-md-auto text-center text-md-start mb-3 mb-md-0">
                        <img src="../../assets/images/default-avatar.png" 
                             class="profile-avatar mb-2" 
                             alt="Profile Picture">
                        <div>
                            <button class="btn btn-sm btn-light" onclick="document.getElementById('avatarInput').click()">
                                <i class="fas fa-camera me-2"></i>Change Photo
                            </button>
                            <input type="file" id="avatarInput" hidden accept="image/*">
                        </div>
                    </div>
                    <div class="col-md">
                        <h3 class="mb-1">Sabiu Lawali Tsafe</h3>
                        <p class="mb-2"><i class="fas fa-phone me-2"></i>+234 123 456 7890</p>
                        <p class="mb-0"><i class="fas fa-envelope me-2"></i>sabiu@example.com</p>
                    </div>
                    <div class="col-md-auto text-center text-md-end mt-3 mt-md-0">
                        <div class="mb-2">
                            <span class="badge bg-light text-dark">
                                <i class="fas fa-star text-warning me-1"></i>4.8 Rating
                            </span>
                        </div>
                        <div>Member since September 2025</div>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="row">
                <div class="col-md-3 mb-4">
                    <!-- Profile Navigation -->
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="nav flex-column nav-pills">
                                <button class="nav-link active text-start py-3 px-4" data-bs-toggle="pill" data-bs-target="#personal">
                                    <i class="fas fa-user me-2"></i>Personal Information
                                </button>
                                <button class="nav-link text-start py-3 px-4" data-bs-toggle="pill" data-bs-target="#preferences">
                                    <i class="fas fa-cog me-2"></i>Preferences
                                </button>
                                <button class="nav-link text-start py-3 px-4" data-bs-toggle="pill" data-bs-target="#security">
                                    <i class="fas fa-shield-alt me-2"></i>Security
                                </button>
                                <button class="nav-link text-start py-3 px-4" data-bs-toggle="pill" data-bs-target="#notifications">
                                    <i class="fas fa-bell me-2"></i>Notifications
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Personal Information -->
                        <div class="tab-pane fade show active" id="personal">
                            <div class="card mb-4">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0">Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" value="Sabiu">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" value="Lawali Tsafe">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" value="sabiu@example.com">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Phone Number</label>
                                                <input type="tel" class="form-control" value="+234 123 456 7890">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" rows="2">123 Main Street, Dakin Gair Quaters, B/Kebbi</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary-custom">Save Changes</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Favorite Locations -->
                            <div class="card">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Favorite Locations</h5>
                                    <button class="btn btn-sm btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addLocationModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="favorite-location p-3 mb-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">
                                                    <i class="fas fa-home me-2"></i>Home
                                                </h6>
                                                <p class="mb-0 text-muted">123 Main Street, Lagos, Nigeria</p>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="favorite-location p-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">
                                                    <i class="fas fa-briefcase me-2"></i>Work
                                                </h6>
                                                <p class="mb-0 text-muted">456 Business Avenue, Lagos, Nigeria</p>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Preferences -->
                        <div class="tab-pane fade" id="preferences">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0">Ride Preferences</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h6>Default Payment Method</h6>
                                        <select class="form-select">
                                            <option value="wallet">Wallet Balance</option>
                                            <option value="card1">Visa •••• 4242</option>
                                            <option value="card2">Mastercard •••• 8753</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <h6>Language</h6>
                                        <select class="form-select">
                                            <option>English</option>
                                            <option>Hausa</option>
                                            <option>Yoruba</option>
                                            <option>Igbo</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <h6>Ride Options</h6>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="quietMode" checked>
                                            <label class="form-check-label" for="quietMode">
                                                Quiet Mode Preferred
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="matchGender">
                                            <label class="form-check-label" for="matchGender">
                                                Prefer same gender driver
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="accessibility">
                                            <label class="form-check-label" for="accessibility">
                                                Need accessibility features
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary-custom">Save Preferences</button>
                                </div>
                            </div>
                        </div>

                        <!-- Security -->
                        <div class="tab-pane fade" id="security">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0">Security Settings</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-4">
                                            <h6>Change Password</h6>
                                            <div class="mb-3">
                                                <label class="form-label">Current Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">New Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Confirm New Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <h6>Two-Factor Authentication</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="twoFactor">
                                                <label class="form-check-label" for="twoFactor">
                                                    Enable two-factor authentication
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary-custom">Update Security Settings</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div class="tab-pane fade" id="notifications">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0">Notification Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h6>Push Notifications</h6>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="rideUpdates" checked>
                                            <label class="form-check-label" for="rideUpdates">
                                                Ride status updates
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="promos" checked>
                                            <label class="form-check-label" for="promos">
                                                Promotions and discounts
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="news">
                                            <label class="form-check-label" for="news">
                                                MyRides news and updates
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <h6>Email Notifications</h6>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="rideReceipts" checked>
                                            <label class="form-check-label" for="rideReceipts">
                                                Ride receipts
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="accountUpdates" checked>
                                            <label class="form-check-label" for="accountUpdates">
                                                Account updates
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="newsletter">
                                            <label class="form-check-label" for="newsletter">
                                                Newsletter
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary-custom">Save Notification Settings</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Location Modal -->
    <div class="modal fade" id="addLocationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Favorite Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Location Name</label>
                        <input type="text" class="form-control" placeholder="e.g., Home, Work, Gym">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Enter location address">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon</label>
                        <select class="form-select">
                            <option value="home"><i class="fas fa-home"></i> Home</option>
                            <option value="work"><i class="fas fa-briefcase"></i> Work</option>
                            <option value="gym"><i class="fas fa-dumbbell"></i> Gym</option>
                            <option value="shop"><i class="fas fa-shopping-cart"></i> Shopping</option>
                            <option value="other"><i class="fas fa-map-marker-alt"></i> Other</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary-custom">Add Location</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load rider data
            const riderData = JSON.parse(localStorage.getItem('riderData') || '{}');
            if (riderData.name) {
                document.getElementById('riderName').textContent = riderData.name;
            }

            // Handle profile picture change
            document.getElementById('avatarInput').addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('.profile-avatar').src = e.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script>
</body>
</html>