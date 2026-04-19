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
    <!-- Leaflet Geocoder CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <style>
        .booking-card { background: #fff; border-radius: 18px; box-shadow: 0 8px 30px rgba(0,0,0,.05); border: 1px solid #f1f3f5; }
        .current-location-card, .route-info { background: #fff; border: 1px solid #dee2e6; border-radius: 14px; padding: 14px; }
        .current-location-card { background: linear-gradient(135deg, #edf8ee, #f7fbf8); border-color: #d6ead7; margin-bottom: 16px; }
        .current-location-label, .route-metric-label { font-size: .78rem; text-transform: uppercase; letter-spacing: .06em; color: #6c757d; }
        .current-location-value, .route-metric-value { font-weight: 600; color: #1f2937; }
        .directory-summary { display: flex; justify-content: space-between; font-size: .88rem; color: #6c757d; margin-bottom: 10px; }
        .common-places, .location-groups { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 14px; }
        .common-place, .location-group-chip { background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 999px; padding: 7px 14px; font-size: 13px; cursor: pointer; }
        .common-place:hover, .location-group-chip:hover, .location-group-chip.active { background: #edf8ee; border-color: #4caf50; color: #2e7d32; }
        .location-field { position: relative; }
        .location-suggestions { position: absolute; top: 100%; left: 0; right: 0; background: #fff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 8px 24px rgba(0,0,0,.12); z-index: 1100; max-height: 220px; overflow-y: auto; }
        .suggestion-item { padding: 10px 12px; cursor: pointer; border-bottom: 1px solid #f1f3f5; }
        .suggestion-item:last-child { border-bottom: 0; }
        .suggestion-item:hover { background: #f5f5f5; }
        .route-info { margin-top: 15px; }
        .route-metadata { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; margin-top: 12px; }
        .route-metric { background: #f8f9fa; border-radius: 10px; padding: 10px 12px; }
        .map-container { height: 500px; border-radius: 18px; }
    </style>
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
                    <div class="booking-card p-4">
                        <!-- <p class="text-muted small mb-3">Calculate distance from your current location to any saved destination in Birnin Kebbi.</p> -->
                        <div class="current-location-card">
                            <div class="d-flex justify-content-between align-items-start gap-2">
                                <div>
                                    <div class="current-location-label">Current Location</div>
                                    <div class="current-location-value" id="currentLocationLabel">Tap detect to use your live pickup point.</div>
                                </div>
                                <button class="btn btn-sm btn-outline-success" type="button" onclick="useCurrentLocation()"><i class="fas fa-location-crosshairs me-1"></i>Detect</button>
                            </div>
                        </div>
                        <form id="bookingForm">
                            <div class="mb-3 location-field">
                                <label for="pickup" class="form-label">Pickup Location</label>
                                <select class="form-select mb-2" id="pickupSelect"><option value="">Choose a pickup location in Birnin Kebbi</option></select>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="pickup" placeholder="Use current location or search a Birnin Kebbi area" autocomplete="off">
                                    <button class="btn btn-outline-secondary" type="button" onclick="useCurrentLocation()"><i class="fas fa-location-crosshairs"></i></button>
                                    <button class="btn btn-outline-secondary" type="button" onclick="selectOnMap('pickup')"><i class="fas fa-map-marker-alt"></i></button>
                                </div>
                                <div id="pickup-suggestions" class="location-suggestions"></div>
                                <!-- <small class="text-muted">Pickup can come from GPS, search, or a point you click on the map.</small> -->
                            </div>
                            <div class="mb-3 location-field">
                                <label for="destination" class="form-label">Destination</label>
                                <select class="form-select mb-2" id="destinationSelect"><option value="">Choose a destination in Birnin Kebbi</option></select>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="destination" placeholder="Search all saved Birnin Kebbi landmarks and areas" autocomplete="off">
                                    <button class="btn btn-outline-secondary" type="button" onclick="selectOnMap('destination')"><i class="fas fa-map-marker-alt"></i></button>
                                </div>
                                <div id="destination-suggestions" class="location-suggestions"></div>
                            </div>
                            <div class="route-info" id="routeInfo" style="display: none;">
                                <div class="d-flex justify-content-between mb-2"><span>From:</span><strong id="routeFrom">-</strong></div>
                                <div class="d-flex justify-content-between mb-2"><span>To:</span><strong id="routeTo">-</strong></div>
                                <div class="d-flex justify-content-between mb-2"><span>Distance:</span><strong id="distance">0 km</strong></div>
                                <div class="d-flex justify-content-between mb-2"><span>Estimated Time:</span><strong id="duration">0 mins</strong></div>
                                <div class="d-flex justify-content-between"><span>Fare:</span><strong id="fare">N0</strong></div>
                            </div>
                            <button type="submit" class="btn btn-primary-custom w-100 mt-3">Find Nearby Tricycles</button>
                        </form>
                        <div id="rideOptionsStep" style="display: none;">
                            <div class="d-flex align-items-center mb-4">
                                <button class="btn btn-link p-0 me-3" onclick="showLocationStep()"><i class="fas fa-arrow-left"></i></button>
                                <h5 class="mb-0">Choose Ride Option</h5>
                            </div>
                            <div class="ride-options mb-4">
                                <div class="ride-option mb-3 p-3 border rounded cursor-pointer">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3"><i class="fas fa-car fa-2x"></i></div>
                                        <div class="flex-grow-1"><h6 class="mb-1">Regular Ride</h6><small class="text-muted">3.2 km - 15 mins</small></div>
                                        <div class="text-end"><h6 class="mb-1">N500</h6><small class="text-muted">Best Price</small></div>
                                    </div>
                                </div>
                                <div class="ride-option mb-3 p-3 border rounded cursor-pointer">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3"><i class="fas fa-users fa-2x"></i></div>
                                        <div class="flex-grow-1"><h6 class="mb-1">Share Ride</h6><small class="text-muted">3.2 km - 20 mins</small></div>
                                        <div class="text-end"><h6 class="mb-1">N300</h6><small class="text-success">Save 40%</small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h6>Payment Method</h6>
                                <select class="form-select"><option value="cash">Cash</option><option value="card">Card Payment</option><option value="wallet">Wallet (N2,500)</option></select>
                            </div>
                            <div class="mb-4"><h6>Additional Notes</h6><textarea class="form-control" rows="2" placeholder="Any special instructions for the driver?"></textarea></div>
                            <button class="btn btn-primary-custom w-100" onclick="confirmBooking()">Book Ride Now</button>
                        </div>
                        <div id="findingDriverStep" style="display: none;">
                            <div class="text-center py-4">
                                <div class="spinner-grow text-primary mb-3" role="status"><span class="visually-hidden">Loading...</span></div>
                                <h5>Finding your driver...</h5>
                                <p class="text-muted mb-4">This usually takes 1-3 minutes</p>
                                <button class="btn btn-outline-danger" onclick="cancelSearch()">Cancel</button>
                            </div>
                        </div>
                        <div id="driverFoundStep" style="display: none;">
                            <div class="text-center mb-4"><h5>Driver Found!</h5><p class="text-muted">Your ride will arrive in 3 minutes</p></div>
                            <div class="driver-info mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="<?php echo base_url(); ?>assets/images/default-avatar.png" class="rounded-circle me-3" width="60" height="60" alt="Driver">
                                    <div><h6 class="mb-1">Ibrahim Mohammed</h6><div class="text-warning"><i class="fas fa-star"></i> 4.8 (245 rides)</div></div>
                                </div>
                                <div class="vehicle-info p-3 bg-light rounded">
                                    <div class="d-flex justify-content-between mb-2"><span>Vehicle</span><strong>Tricycle (Keke NAPEP)</strong></div>
                                    <div class="d-flex justify-content-between"><span>Plate Number</span><strong>KBB-123-XA</strong></div>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" onclick="callDriver()"><i class="fas fa-phone me-2"></i>Call Driver</button>
                                <button class="btn btn-outline-danger" onclick="cancelRide()">Cancel Ride</button>
                            </div>
                        </div>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/map-manager.js"></script>
    <script>
        let mapManager;
        let routePolyline = null;
        let selectedLocations = { pickup: null, destination: null };
        const FARE_PER_KM = 500;
        const popularDestinationNames = ['Federal Medical Center', 'Central Market', "Emir's Palace", 'Haliru Abdu Stadium', 'Birnin Kebbi Airport', 'Kebbi State Polytechnic'];

        // Fetch locations from database passed from controller
        const dbLocations = <?php echo json_encode($locations ?? []); ?>;
        const birninKebbiLocations = dbLocations.map(loc => ({
            key: loc.id,
            name: loc.location,
            lat: parseFloat(loc.latitude),
            lng: parseFloat(loc.longitude)
        })).sort((a, b) => a.name.localeCompare(b.name));

        const locationLookup = birninKebbiLocations.reduce((acc, location) => { acc[location.name.toLowerCase()] = location; return acc; }, {});

        // Sample ride data for the table
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
            mapManager = new MapManager('map');
            renderDestinationOptions();
            renderPickupOptions();
            
            ['pickup', 'destination'].forEach(id => {
                const input = document.getElementById(id);
                if (input) {
                    input.addEventListener('input', () => handleLocationInput(id));
                    input.addEventListener('blur', () => setTimeout(() => clearSuggestions(id), 150));
                }
            });
            
            const pickupSelect = document.getElementById('pickupSelect');
            const destSelect = document.getElementById('destinationSelect');
            const bookingForm = document.getElementById('bookingForm');
            
            if (pickupSelect) pickupSelect.addEventListener('change', handlePickupSelect);
            if (destSelect) destSelect.addEventListener('change', handleDestinationSelect);
            if (bookingForm) bookingForm.addEventListener('submit', handleFormSubmit);
            
            const userData = JSON.parse(localStorage.getItem('userData') || '{}');
            const userNameEl = document.getElementById('userName');
            if (userData.name && userNameEl) userNameEl.textContent = userData.name;
            
            populateRidesTable();
        });

        function renderDestinationOptions() {
            const select = document.getElementById('destinationSelect');
            if (!select) return;
            const currentValue = select.value;
            select.innerHTML = '<option value="">Choose a destination in Birnin Kebbi</option>';
            birninKebbiLocations.forEach(location => {
                const option = document.createElement('option');
                option.value = location.name;
                option.textContent = location.name;
                select.appendChild(option);
            });
            select.value = currentValue;
        }

        function renderPickupOptions() {
            const select = document.getElementById('pickupSelect');
            if (!select) return;
            select.innerHTML = '<option value="">Choose a pickup location in Birnin Kebbi</option>';
            birninKebbiLocations.forEach(location => {
                const option = document.createElement('option');
                option.value = location.name;
                option.textContent = location.name;
                select.appendChild(option);
            });
        }

        function handlePickupSelect() {
            const selectedName = document.getElementById('pickupSelect').value;
            if (!selectedName) return;
            const location = locationLookup[selectedName.toLowerCase()];
            if (location) setSelectedLocation('pickup', location);
        }

        function handleLocationInput(field) {
            const input = document.getElementById(field);
            if (!input) return;
            const query = input.value.trim().toLowerCase();
            if (query.length < 2) return clearSuggestions(field);
            const matches = birninKebbiLocations.filter(location => location.name.toLowerCase().includes(query)).slice(0, 12);
            showSuggestions(field, matches);
        }

        function showSuggestions(field, suggestions) {
            const container = document.getElementById(`${field}-suggestions`);
            if (!container) return;
            container.innerHTML = '';
            suggestions.forEach(location => {
                const item = document.createElement('div');
                item.className = 'suggestion-item';
                item.innerHTML = `<strong>${location.name}</strong>`;
                item.addEventListener('click', () => { setSelectedLocation(field, location); clearSuggestions(field); });
                container.appendChild(item);
            });
        }

        function clearSuggestions(field) {
            const container = document.getElementById(`${field}-suggestions`);
            if (container) container.innerHTML = '';
        }

        function handleDestinationSelect() {
            const select = document.getElementById('destinationSelect');
            if (!select) return;
            const selectedName = select.value;
            if (!selectedName) return;
            const location = locationLookup[selectedName.toLowerCase()];
            if (location) setSelectedLocation('destination', location);
        }

        function setSelectedLocation(field, location, label = '') {
            const displayName = label || location.name;
            const input = document.getElementById(field);
            if (input) input.value = displayName;
            selectedLocations[field] = { lat: location.lat, lng: location.lng, name: displayName };
            
            if (field === 'pickup' && location.name) {
                const select = document.getElementById('pickupSelect');
                if (select) {
                    if ([...select.options].some(opt => opt.value === location.name)) {
                        select.value = location.name;
                    } else {
                        select.value = "";
                    }
                }
            }
            if (field === 'destination' && location.name) {
                const select = document.getElementById('destinationSelect');
                if (select) {
                    if ([...select.options].some(opt => opt.value === location.name)) {
                        select.value = location.name;
                    } else {
                        select.value = "";
                    }
                }
            }
            updateMapAndRoute();
        }

        async function useCurrentLocation() {
            try {
                const currentLocation = await mapManager.getUserLocation();
                const nearest = findNearestLocation(currentLocation.lat, currentLocation.lng);
                const pickupLabel = nearest ? `Current Location - near ${nearest.name}` : 'Current Location';
                const labelEl = document.getElementById('currentLocationLabel');
                if (labelEl) labelEl.textContent = pickupLabel;
                setSelectedLocation('pickup', { lat: currentLocation.lat, lng: currentLocation.lng, name: pickupLabel }, pickupLabel);
            } catch (error) {
                alert('Could not detect your current location. Please allow location access or type a pickup point manually.');
            }
        }

        function selectOnMap(field) {
            mapManager.showMessage(`Click on the map to choose the ${field} point`);
            mapManager.map.once('click', function(e) {
                const { lat, lng } = e.latlng;
                if (field === 'destination' && !mapManager.isWithinBirninKebbi(lat, lng)) {
                    alert('Destination must be within Birnin Kebbi.');
                    return;
                }
                const nearest = findNearestLocation(lat, lng);
                const label = nearest ? `Near ${nearest.name}` : `${field} point`;
                setSelectedLocation(field, { lat, lng, name: label }, label);
            });
        }

        function findNearestLocation(lat, lng) {
            if (!birninKebbiLocations.length) return null;
            let nearest = null;
            let shortestDistance = Infinity;
            birninKebbiLocations.forEach(location => {
                const distance = mapManager.calculateDistance(lat, lng, location.lat, location.lng);
                if (distance < shortestDistance) {
                    shortestDistance = distance;
                    nearest = { ...location, distance };
                }
            });
            return nearest;
        }

        function calculateTripDistance(start, end) {
            return mapManager.calculateDistance(start.lat, start.lng, end.lat, end.lng);
        }

        function formatDistance(distance) {
            return `${distance.toFixed(2)} km`;
        }

        function calculateTripFare(distance) {
            return Math.round(distance * FARE_PER_KM);
        }

        async function updateMapAndRoute() {
            mapManager.clearMarkers();
            if (routePolyline) {
                mapManager.map.removeLayer(routePolyline);
                routePolyline = null;
            }
            if (selectedLocations.pickup) await mapManager.addTricycleMarker(selectedLocations.pickup.lat, selectedLocations.pickup.lng, { name: selectedLocations.pickup.name || 'Pickup' });
            if (selectedLocations.destination) await mapManager.addTricycleMarker(selectedLocations.destination.lat, selectedLocations.destination.lng, { name: selectedLocations.destination.name || 'Destination' });
            
            const routeInfoEl = document.getElementById('routeInfo');
            if (!selectedLocations.pickup || !selectedLocations.destination) {
                if (routeInfoEl) routeInfoEl.style.display = 'none';
                return;
            }
            const distance = calculateTripDistance(selectedLocations.pickup, selectedLocations.destination);
            const regularTime = mapManager.calculateEstimatedTime(distance, 'regular');
            const regularFare = calculateTripFare(distance);
            routePolyline = L.polyline([[selectedLocations.pickup.lat, selectedLocations.pickup.lng], [selectedLocations.destination.lat, selectedLocations.destination.lng]], { color: '#2E7D32', weight: 4, opacity: 0.8 }).addTo(mapManager.map);
            mapManager.map.fitBounds(routePolyline.getBounds(), { padding: [40, 40] });
            
            if (routeInfoEl) routeInfoEl.style.display = 'block';
            const routeFromEl = document.getElementById('routeFrom');
            const routeToEl = document.getElementById('routeTo');
            const distanceEl = document.getElementById('distance');
            const durationEl = document.getElementById('duration');
            const fareEl = document.getElementById('fare');

            if (routeFromEl) routeFromEl.textContent = selectedLocations.pickup.name || 'Current Location';
            if (routeToEl) routeToEl.textContent = selectedLocations.destination.name || 'Destination';
            if (distanceEl) distanceEl.textContent = formatDistance(distance);
            if (durationEl) durationEl.textContent = `${regularTime} mins`;
            if (fareEl) fareEl.textContent = `N${regularFare}`;
        }

        function handleFormSubmit(e) {
            e.preventDefault();
            if (!selectedLocations.pickup || !selectedLocations.destination) return alert('Please select both pickup and destination locations.');
            const distance = calculateTripDistance(selectedLocations.pickup, selectedLocations.destination);
            const regularPrice = calculateTripFare(distance);
            const sharePrice = Math.round(regularPrice * 0.6);
            const regularTime = mapManager.calculateEstimatedTime(distance, 'regular');
            const sharedTime = mapManager.calculateEstimatedTime(distance, 'shared');
            const firstOptionSmall = document.querySelector('.ride-option:first-child small.text-muted');
            const firstOptionPrice = document.querySelector('.ride-option:first-child .text-end h6.mb-1');
            const lastOptionSmall = document.querySelector('.ride-option:last-child small.text-muted');
            const lastOptionPrice = document.querySelector('.ride-option:last-child .text-end h6.mb-1');
            if (firstOptionSmall) firstOptionSmall.textContent = `${distance.toFixed(2)} km - ${regularTime} mins`;
            if (firstOptionPrice) firstOptionPrice.textContent = `N${regularPrice}`;
            if (lastOptionSmall) lastOptionSmall.textContent = `${distance.toFixed(2)} km - ${sharedTime} mins`;
            if (lastOptionPrice) lastOptionPrice.textContent = `N${sharePrice}`;
            
            const bookingForm = document.getElementById('bookingForm');
            const rideOptionsStep = document.getElementById('rideOptionsStep');
            if (bookingForm) bookingForm.style.display = 'none';
            if (rideOptionsStep) rideOptionsStep.style.display = 'block';
            mapManager.showMessage('Distance calculated. Finding nearby tricycles...', 'success');
        }

        function showLocationStep() {
            const rideOptionsStep = document.getElementById('rideOptionsStep');
            const findingDriverStep = document.getElementById('findingDriverStep');
            const driverFoundStep = document.getElementById('driverFoundStep');
            const bookingForm = document.getElementById('bookingForm');

            if (rideOptionsStep) rideOptionsStep.style.display = 'none';
            if (findingDriverStep) findingDriverStep.style.display = 'none';
            if (driverFoundStep) driverFoundStep.style.display = 'none';
            if (bookingForm) bookingForm.style.display = 'block';
        }

        function confirmBooking() {
            const rideOptionsStep = document.getElementById('rideOptionsStep');
            const findingDriverStep = document.getElementById('findingDriverStep');
            const driverFoundStep = document.getElementById('driverFoundStep');

            if (rideOptionsStep) rideOptionsStep.style.display = 'none';
            if (findingDriverStep) findingDriverStep.style.display = 'block';
            setTimeout(() => {
                if (findingDriverStep) findingDriverStep.style.display = 'none';
                if (driverFoundStep) driverFoundStep.style.display = 'block';
            }, 3000);
        }

        function cancelSearch() {
            if (confirm('Are you sure you want to cancel the search?')) showLocationStep();
        }

        function cancelRide() {
            if (confirm('Are you sure you want to cancel this ride?')) showLocationStep();
        }

        function callDriver() {
            alert('Calling driver...');
        }

        // Populate rides table
        function populateRidesTable() {
            const tbody = document.getElementById('ridesTableBody');
            if (!tbody) return;
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

        function viewRideDetails() {
            alert('Viewing ride details...');
        }
    </script>
</body>
</html>