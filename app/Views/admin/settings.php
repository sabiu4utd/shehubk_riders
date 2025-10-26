<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - MyRides Admin</title>
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
            <a href="users.html" class="sidebar-link">
                <i class="fas fa-users me-2"></i> Users
            </a>
            <a href="rides.html" class="sidebar-link">
                <i class="fas fa-car me-2"></i> Rides
            </a>
            <a href="settings.html" class="sidebar-link active">
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

        <!-- Settings Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Settings Navigation -->
                    <ul class="nav nav-pills mb-4" id="settingsTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#general">
                                <i class="fas fa-cog me-2"></i> General
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pricing">
                                <i class="fas fa-money-bill me-2"></i> Pricing
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#notifications">
                                <i class="fas fa-bell me-2"></i> Notifications
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#security">
                                <i class="fas fa-shield-alt me-2"></i> Security
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#backup">
                                <i class="fas fa-database me-2"></i> Backup
                            </button>
                        </li>
                    </ul>

                    <!-- Settings Content -->
                    <div class="tab-content" id="settingsTabContent">
                        <!-- General Settings -->
                        <div class="tab-pane fade show active" id="general">
                            <div class="dashboard-card">
                                <h5 class="mb-4">General Settings</h5>
                                <form id="generalSettingsForm">
                                    <!-- Company Information -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Company Information</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Company Name</label>
                                                <input type="text" class="form-control" value="MyRides">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Contact Email</label>
                                                <input type="email" class="form-control" value="contact@myrides.com">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input type="tel" class="form-control" value="+234 803 456 7890">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" value="123 Main Street, Birnin Kebbi">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Regional Settings -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Regional Settings</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Time Zone</label>
                                                <select class="form-select">
                                                    <option value="WAT">West Africa Time (WAT)</option>
                                                    <option value="GMT">GMT</option>
                                                    <option value="UTC+1">UTC+1</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Currency</label>
                                                <select class="form-select">
                                                    <option value="NGN">Nigerian Naira (₦)</option>
                                                    <option value="USD">US Dollar ($)</option>
                                                    <option value="EUR">Euro (€)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Map Settings -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Map Settings</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Default Location</label>
                                                <input type="text" class="form-control" value="Birnin Kebbi">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Map Provider</label>
                                                <select class="form-select">
                                                    <option value="leaflet">Leaflet Maps</option>
                                                    <option value="google">Google Maps</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary-custom">
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Pricing Settings -->
                        <div class="tab-pane fade" id="pricing">
                            <div class="dashboard-card">
                                <h5 class="mb-4">Pricing Settings</h5>
                                <form id="pricingSettingsForm">
                                    <!-- Base Rates -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Base Rates</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Base Fare (₦)</label>
                                                <input type="number" class="form-control" value="300">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Per Kilometer Rate (₦)</label>
                                                <input type="number" class="form-control" value="50">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Per Minute Rate (₦)</label>
                                                <input type="number" class="form-control" value="5">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Minimum Fare (₦)</label>
                                                <input type="number" class="form-control" value="500">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Surge Pricing -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Surge Pricing</h6>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="enableSurge" checked>
                                            <label class="form-check-label" for="enableSurge">Enable Surge Pricing</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Maximum Surge Multiplier</label>
                                                <input type="number" class="form-control" value="2.5" step="0.1">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Surge Threshold (Demand/Supply Ratio)</label>
                                                <input type="number" class="form-control" value="1.5" step="0.1">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Commission Rates -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Commission Rates</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Platform Commission (%)</label>
                                                <input type="number" class="form-control" value="15">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Driver Commission (%)</label>
                                                <input type="number" class="form-control" value="85">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary-custom">
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Notification Settings -->
                        <div class="tab-pane fade" id="notifications">
                            <div class="dashboard-card">
                                <h5 class="mb-4">Notification Settings</h5>
                                <form id="notificationSettingsForm">
                                    <!-- Email Notifications -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Email Notifications</h6>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="emailNewUsers" checked>
                                            <label class="form-check-label" for="emailNewUsers">
                                                New User Registrations
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="emailNewRides" checked>
                                            <label class="form-check-label" for="emailNewRides">
                                                New Ride Bookings
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="emailCancelledRides" checked>
                                            <label class="form-check-label" for="emailCancelledRides">
                                                Cancelled Rides
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="emailPayments">
                                            <label class="form-check-label" for="emailPayments">
                                                Payment Updates
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Push Notifications -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Push Notifications</h6>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="pushNewUsers" checked>
                                            <label class="form-check-label" for="pushNewUsers">
                                                New User Registrations
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="pushNewRides" checked>
                                            <label class="form-check-label" for="pushNewRides">
                                                New Ride Bookings
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="pushCancelledRides">
                                            <label class="form-check-label" for="pushCancelledRides">
                                                Cancelled Rides
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Notification Schedule -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Daily Report Schedule</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Report Time</label>
                                                <input type="time" class="form-control" value="18:00">
                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Report Format</label>
                                                <select class="form-select">
                                                    <option value="pdf">PDF</option>
                                                    <option value="excel">Excel</option>
                                                    <option value="both">Both</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary-custom">
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Security Settings -->
                        <div class="tab-pane fade" id="security">
                            <div class="dashboard-card">
                                <h5 class="mb-4">Security Settings</h5>
                                <form id="securitySettingsForm">
                                    <!-- Password Policy -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Password Policy</h6>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="requireUppercase" checked>
                                            <label class="form-check-label" for="requireUppercase">
                                                Require Uppercase Letters
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="requireNumbers" checked>
                                            <label class="form-check-label" for="requireNumbers">
                                                Require Numbers
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="requireSpecial" checked>
                                            <label class="form-check-label" for="requireSpecial">
                                                Require Special Characters
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Minimum Password Length</label>
                                            <input type="number" class="form-control" value="8">
                                        </div>
                                    </div>

                                    <!-- Session Settings -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Session Settings</h6>
                                        <div class="mb-3">
                                            <label class="form-label">Session Timeout (minutes)</label>
                                            <input type="number" class="form-control" value="30">
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="enforceLogout" checked>
                                            <label class="form-check-label" for="enforceLogout">
                                                Enforce Single Session per User
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Two-Factor Authentication -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Two-Factor Authentication</h6>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="require2FA">
                                            <label class="form-check-label" for="require2FA">
                                                Require 2FA for Admin Accounts
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="allow2FA" checked>
                                            <label class="form-check-label" for="allow2FA">
                                                Allow 2FA for All Users
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary-custom">
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Backup Settings -->
                        <div class="tab-pane fade" id="backup">
                            <div class="dashboard-card">
                                <h5 class="mb-4">Backup Settings</h5>
                                <form id="backupSettingsForm">
                                    <!-- Automatic Backup -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Automatic Backup</h6>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="enableAutoBackup" checked>
                                            <label class="form-check-label" for="enableAutoBackup">
                                                Enable Automatic Backup
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Backup Frequency</label>
                                                <select class="form-select">
                                                    <option value="daily">Daily</option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="monthly">Monthly</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Backup Time</label>
                                                <input type="time" class="form-control" value="00:00">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Retention Policy -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Retention Policy</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Keep Backups For</label>
                                                <select class="form-select">
                                                    <option value="7">7 Days</option>
                                                    <option value="30">30 Days</option>
                                                    <option value="90">90 Days</option>
                                                    <option value="365">1 Year</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Maximum Storage (GB)</label>
                                                <input type="number" class="form-control" value="50">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Manual Backup -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-3">Manual Backup</h6>
                                        <button type="button" class="btn btn-primary-custom" onclick="startManualBackup()">
                                            <i class="fas fa-download me-2"></i> Start Backup Now
                                        </button>
                                    </div>

                                    <button type="submit" class="btn btn-primary-custom">
                                        Save Changes
                                    </button>
                                </form>
                            </div>
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
            // Load user data
            const userData = JSON.parse(localStorage.getItem('userData') || '{}');
            if (userData.name) {
                document.getElementById('userName').textContent = userData.name;
            }

            // Add form submission handlers
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    saveSettings(this.id);
                });
            });
        });

        function saveSettings(formId) {
            // In a real app, you would save the settings to the server
            alert('Settings saved successfully!');
        }

        function startManualBackup() {
            // In a real app, you would initiate the backup process
            alert('Manual backup started. You will be notified when it\'s complete.');
        }
    </script>
</body>
</html>