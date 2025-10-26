<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - MyRides Driver</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
            <a href="requests.html" class="sidebar-link">
                <i class="fas fa-bell me-2"></i> Requests
            </a>
            <a href="earnings.html" class="sidebar-link">
                <i class="fas fa-wallet me-2"></i> Earnings
            </a>
            <a href="history.html" class="sidebar-link">
                <i class="fas fa-history me-2"></i> History
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
            <div class="row">
                <!-- Profile Summary -->
                <div class="col-md-4 mb-4">
                    <div class="dashboard-card text-center">
                        <div class="position-relative mb-4 mx-auto" style="width: 150px;">
                            <img src="../../assets/images/default-avatar.png" 
                                 class="rounded-circle img-thumbnail" 
                                 width="150" 
                                 height="150" 
                                 alt="Profile Photo">
                            <button class="btn btn-sm btn-primary-custom position-absolute bottom-0 end-0" 
                                    onclick="document.getElementById('photoInput').click()">
                                <i class="fas fa-camera"></i>
                            </button>
                            <input type="file" id="photoInput" hidden accept="image/*">
                        </div>
                        <h5 class="mb-1">Ibrahim Mohammed</h5>
                        <p class="text-muted mb-3">Driver</p>
                        <div class="d-flex justify-content-center text-warning mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="text-dark ms-2">4.8 (245 rides)</span>
                        </div>
                        <div class="row text-center">
                            <div class="col-4">
                                <h6>245</h6>
                                <small class="text-muted">Rides</small>
                            </div>
                            <div class="col-4">
                                <h6>98%</h6>
                                <small class="text-muted">Completion</small>
                            </div>
                            <div class="col-4">
                                <h6>8.5</h6>
                                <small class="text-muted">Hours/Day</small>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicle Information -->
                    <div class="dashboard-card mt-4">
                        <h6 class="mb-4">Vehicle Information</h6>
                        <div class="mb-3">
                            <small class="text-muted d-block">Vehicle Type</small>
                            <strong>Tricycle (Keke NAPEP)</strong>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Plate Number</small>
                            <strong>KBB-123-XA</strong>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Year</small>
                            <strong>2022</strong>
                        </div>
                        <div>
                            <small class="text-muted d-block">Color</small>
                            <strong>Yellow</strong>
                        </div>
                    </div>

                    <!-- Documents -->
                    <div class="dashboard-card mt-4">
                        <h6 class="mb-4">Documents</h6>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Driver's License</span>
                                <span class="badge bg-success">Verified</span>
                            </div>
                            <small class="text-muted d-block">Expires: Dec 31, 2025</small>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Vehicle Registration</span>
                                <span class="badge bg-success">Verified</span>
                            </div>
                            <small class="text-muted d-block">Expires: Nov 15, 2025</small>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Insurance</span>
                                <span class="badge bg-success">Verified</span>
                            </div>
                            <small class="text-muted d-block">Expires: Jan 20, 2026</small>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="col-md-8">
                    <!-- Personal Information -->
                    <div class="dashboard-card mb-4">
                        <h6 class="mb-4">Personal Information</h6>
                        <form id="personalInfoForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="Ibrahim">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Mohammed">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="ibrahim@example.com">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" class="form-control" value="+234 801 234 5678">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" value="1990-05-15">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select">
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" value="123 Ahmadu Bello Way, Birnin Kebbi">
                            </div>
                            <button type="submit" class="btn btn-primary-custom">
                                Save Changes
                            </button>
                        </form>
                    </div>

                    <!-- Bank Information -->
                    <div class="dashboard-card mb-4">
                        <h6 class="mb-4">Bank Information</h6>
                        <form id="bankInfoForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Bank Name</label>
                                    <select class="form-select">
                                        <option selected>Access Bank</option>
                                        <option>First Bank</option>
                                        <option>GTBank</option>
                                        <option>UBA</option>
                                        <option>Zenith Bank</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" class="form-control" value="0123456789">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Account Name</label>
                                <input type="text" class="form-control" value="Ibrahim Mohammed">
                            </div>
                            <button type="submit" class="btn btn-primary-custom">
                                Save Changes
                            </button>
                        </form>
                    </div>

                    <!-- Security Settings -->
                    <div class="dashboard-card mb-4">
                        <h6 class="mb-4">Security Settings</h6>
                        <form id="securityForm">
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
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enable2FA">
                                    <label class="form-check-label" for="enable2FA">
                                        Enable Two-Factor Authentication
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary-custom">
                                Update Password
                            </button>
                        </form>
                    </div>

                    <!-- Notification Settings -->
                    <div class="dashboard-card">
                        <h6 class="mb-4">Notification Settings</h6>
                        <form id="notificationForm">
                            <div class="mb-3">
                                <label class="form-label">Email Notifications</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="emailNewRequests" checked>
                                    <label class="form-check-label" for="emailNewRequests">
                                        New ride requests
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="emailEarnings" checked>
                                    <label class="form-check-label" for="emailEarnings">
                                        Earnings updates
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="emailPromotions">
                                    <label class="form-check-label" for="emailPromotions">
                                        Promotions and news
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Push Notifications</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="pushNewRequests" checked>
                                    <label class="form-check-label" for="pushNewRequests">
                                        New ride requests
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="pushEarnings" checked>
                                    <label class="form-check-label" for="pushEarnings">
                                        Earnings updates
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary-custom">
                                Save Preferences
                            </button>
                        </form>
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

            // Add form submission handlers
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    saveChanges(this.id);
                });
            });

            // Photo upload handler
            document.getElementById('photoInput').addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    updateProfilePhoto(e.target.files[0]);
                }
            });
        });

        function saveChanges(formId) {
            // In a real app, you would save the changes to the server
            alert('Changes saved successfully!');
        }

        function updateProfilePhoto(file) {
            // In a real app, you would upload the photo to the server
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.img-thumbnail').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    </script>
</body>
</html>