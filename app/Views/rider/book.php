<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Ride - MyRides</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <style>
        #bookingMap { height: calc(100vh - 80px); }
        .booking-panel { position: absolute; top: 80px; left: 20px; width: min(430px, calc(100vw - 40px)); z-index: 1000; background: rgba(255,255,255,.98); border-radius: 18px; box-shadow: 0 16px 40px rgba(15,23,42,.12); }
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
        @media (max-width: 991px) { .booking-panel { position: relative; top: 0; left: 0; width: 100%; border-radius: 0; box-shadow: none; } #bookingMap { height: 420px; } .route-metadata { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <?php echo view('rider/includes/sidebar.php'); ?>
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-0 shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-link d-lg-none" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                <div class="d-flex align-items-center">
                    <span class="me-2">Welcome, <span id="riderName">Sabiu</span></span>
                    <img src="<?php echo base_url(); ?>assets/images/default-avatar.png" class="rounded-circle" width="32" height="32" alt="Profile">
                </div>
            </div>
        </nav>
        <div class="position-relative">
            <div id="bookingMap"></div>
            <div class="booking-panel p-4">
                <h5 class="mb-3">Book a Ride</h5>
                <p class="text-muted small mb-3">Calculate distance from your current location to any saved destination in Birnin Kebbi.</p>
                <div class="current-location-card">
                    <div class="d-flex justify-content-between align-items-start gap-2">
                        <div>
                            <div class="current-location-label">Current Location</div>
                            <div class="current-location-value" id="currentLocationLabel">Tap detect to use your live pickup point.</div>
                        </div>
                        <button class="btn btn-sm btn-outline-success" type="button" onclick="useCurrentLocation()"><i class="fas fa-location-crosshairs me-1"></i>Detect</button>
                    </div>
                </div>
                <div class="directory-summary">
                    <span id="locationCount">0 Birnin Kebbi locations</span>
                    <span id="groupCount">0 groups</span>
                </div>
                <div class="common-places" id="commonPlaces"></div>
                <div class="location-groups" id="locationGroups"></div>
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
                        <small class="text-muted">Pickup can come from GPS, search, or a point you click on the map.</small>
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
                        <div class="route-metadata">
                            <div class="route-metric"><span class="route-metric-label">Nearest Pickup Area</span><span class="route-metric-value" id="nearestPickup">-</span></div>
                            <div class="route-metric"><span class="route-metric-label">Nearest Destination Area</span><span class="route-metric-value" id="nearestDestination">-</span></div>
                        </div>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/map-manager.js"></script>
    <script>
        let mapManager;
        let routePolyline = null;
        let selectedLocations = { pickup: null, destination: null };
        const FARE_PER_KM = 300;
        const popularDestinationNames = ['Federal Medical Center', 'Central Market', "Emir's Palace", 'Haliru Abdu Stadium', 'Birnin Kebbi Airport', 'Kebbi State Polytechnic'];
        const areaMatchers = [
            { area: 'Health', terms: ['hospital', 'medical', 'clinic', 'teaching'] },
            { area: 'Education', terms: ['school', 'college', 'polytechnic', 'university'] },
            { area: 'Banks', terms: ['bank'] },
            { area: 'Markets', terms: ['market', 'kasuwa', 'mall'] },
            { area: 'Transport', terms: ['airport', 'motor park'] },
            { area: 'Roads', terms: ['road', 'way', 'junction', 'roundabout', 'square'] },
            { area: 'Civic', terms: ['government', 'secretariat', 'court', 'mosque', 'palace', 'police', 'barracks', 'post office'] },
            { area: 'Commercial', terms: ['hotel', 'guest inn'] },
            { area: 'Residential', terms: ['quarters', 'area', 'makera', 'rafin', 'uwarku', 'sabuwar', 'gulumbe', 'badariya', 'gwadangaji'] }
        ];

        // Fetch locations from database passed from controller
        const dbLocations = <?php echo json_encode($locations ?? []); ?>;
        const birninKebbiLocations = dbLocations.map(loc => ({
            key: loc.id,
            name: loc.location,
            lat: parseFloat(loc.latitude),
            lng: parseFloat(loc.longitude),
            area: inferArea(loc.location)
        })).sort((a, b) => a.name.localeCompare(b.name));

        const locationLookup = birninKebbiLocations.reduce((acc, location) => { acc[location.name.toLowerCase()] = location; return acc; }, {});
        const groupedLocations = birninKebbiLocations.reduce((acc, location) => { if (!acc[location.area]) acc[location.area] = []; acc[location.area].push(location); return acc; }, {});

        document.addEventListener('DOMContentLoaded', function() {
            mapManager = new MapManager('bookingMap');
            renderPopularPlaces();
            renderLocationGroups();
            renderDestinationOptions();
            renderPickupOptions();
            document.getElementById('locationCount').textContent = `${birninKebbiLocations.length} Birnin Kebbi locations`;
            document.getElementById('groupCount').textContent = `${Object.keys(groupedLocations).length} groups`;
            ['pickup', 'destination'].forEach(id => {
                const input = document.getElementById(id);
                input.addEventListener('input', () => handleLocationInput(id));
                input.addEventListener('blur', () => setTimeout(() => clearSuggestions(id), 150));
            });
            document.getElementById('pickupSelect').addEventListener('change', handlePickupSelect);
            document.getElementById('destinationSelect').addEventListener('change', handleDestinationSelect);
            document.getElementById('bookingForm').addEventListener('submit', handleFormSubmit);
            const userData = JSON.parse(localStorage.getItem('userData') || '{}');
            if (userData.name) document.getElementById('riderName').textContent = userData.name;
        });

        function inferArea(name) {
            const lowerName = name.toLowerCase();
            const match = areaMatchers.find(item => item.terms.some(term => lowerName.includes(term)));
            return match ? match.area : 'Landmarks';
        }

        function renderPopularPlaces() {
            const container = document.getElementById('commonPlaces');
            container.innerHTML = '';
            popularDestinationNames.forEach(name => {
                const location = locationLookup[name.toLowerCase()];
                if (!location) return;
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'common-place';
                button.innerHTML = `<i class="fas fa-location-dot me-1"></i>${location.name}`;
                button.addEventListener('click', () => setSelectedLocation('destination', location));
                container.appendChild(button);
            });
        }

        function renderLocationGroups() {
            const container = document.getElementById('locationGroups');
            container.innerHTML = '';
            const allButton = document.createElement('button');
            allButton.type = 'button';
            allButton.className = 'location-group-chip active';
            allButton.textContent = 'All';
            allButton.addEventListener('click', () => { setActiveGroupChip(allButton); renderDestinationOptions(); });
            container.appendChild(allButton);
            Object.keys(groupedLocations).sort().forEach(groupName => {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'location-group-chip';
                button.textContent = `${groupName} (${groupedLocations[groupName].length})`;
                button.addEventListener('click', () => { setActiveGroupChip(button); renderDestinationOptions(groupName); });
                container.appendChild(button);
            });
        }

        function setActiveGroupChip(activeChip) {
            document.querySelectorAll('.location-group-chip').forEach(chip => chip.classList.toggle('active', chip === activeChip));
        }

        function renderDestinationOptions(activeGroup = '') {
            const select = document.getElementById('destinationSelect');
            const currentValue = select.value;
            select.innerHTML = '<option value="">Choose a destination in Birnin Kebbi</option>';
            Object.keys(groupedLocations).sort().forEach(groupName => {
                if (activeGroup && groupName !== activeGroup) return;
                const optgroup = document.createElement('optgroup');
                optgroup.label = groupName;
                groupedLocations[groupName].sort((a, b) => a.name.localeCompare(b.name)).forEach(location => {
                    const option = document.createElement('option');
                    option.value = location.name;
                    option.textContent = location.name;
                    optgroup.appendChild(option);
                });
                select.appendChild(optgroup);
            });
            select.value = currentValue;
        }

        function renderPickupOptions() {
            const select = document.getElementById('pickupSelect');
            select.innerHTML = '<option value="">Choose a pickup location in Birnin Kebbi</option>';
            Object.keys(groupedLocations).sort().forEach(groupName => {
                const optgroup = document.createElement('optgroup');
                optgroup.label = groupName;
                groupedLocations[groupName].sort((a, b) => a.name.localeCompare(b.name)).forEach(location => {
                    const option = document.createElement('option');
                    option.value = location.name;
                    option.textContent = location.name;
                    optgroup.appendChild(option);
                });
                select.appendChild(optgroup);
            });
        }

        function handlePickupSelect() {
            const selectedName = document.getElementById('pickupSelect').value;
            if (!selectedName) return;
            const location = locationLookup[selectedName.toLowerCase()];
            if (location) setSelectedLocation('pickup', location);
        }

        function handleLocationInput(field) {
            const query = document.getElementById(field).value.trim().toLowerCase();
            if (query.length < 2) return clearSuggestions(field);
            const matches = birninKebbiLocations.filter(location => `${location.name} ${location.area}`.toLowerCase().includes(query)).slice(0, 12);
            showSuggestions(field, matches);
        }

        function showSuggestions(field, suggestions) {
            const container = document.getElementById(`${field}-suggestions`);
            container.innerHTML = '';
            suggestions.forEach(location => {
                const item = document.createElement('div');
                item.className = 'suggestion-item';
                item.innerHTML = `<strong>${location.name}</strong><br><small class="text-muted">${location.area}</small>`;
                item.addEventListener('click', () => { setSelectedLocation(field, location); clearSuggestions(field); });
                container.appendChild(item);
            });
        }

        function clearSuggestions(field) {
            document.getElementById(`${field}-suggestions`).innerHTML = '';
        }

        function handleDestinationSelect() {
            const selectedName = document.getElementById('destinationSelect').value;
            if (!selectedName) return;
            const location = locationLookup[selectedName.toLowerCase()];
            if (location) setSelectedLocation('destination', location);
        }

        function setSelectedLocation(field, location, label = '') {
            const displayName = label || location.name;
            document.getElementById(field).value = displayName;
            selectedLocations[field] = { lat: location.lat, lng: location.lng, name: displayName, area: location.area || inferArea(displayName) };
            if (field === 'pickup' && location.name) {
                const select = document.getElementById('pickupSelect');
                if ([...select.options].some(opt => opt.value === location.name)) {
                    select.value = location.name;
                } else {
                    select.value = "";
                }
            }
            if (field === 'destination' && location.name) {
                const select = document.getElementById('destinationSelect');
                if ([...select.options].some(opt => opt.value === location.name)) {
                    select.value = location.name;
                } else {
                    select.value = "";
                }
            }
            updateMapAndRoute();
        }

        async function useCurrentLocation() {
            try {
                const currentLocation = await mapManager.getUserLocation();
                const nearest = findNearestLocation(currentLocation.lat, currentLocation.lng);
                const pickupLabel = nearest ? `Current Location - near ${nearest.name}` : 'Current Location';
                document.getElementById('currentLocationLabel').textContent = pickupLabel;
                setSelectedLocation('pickup', { lat: currentLocation.lat, lng: currentLocation.lng, name: pickupLabel, area: nearest ? nearest.area : 'Current Area' }, pickupLabel);
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
                setSelectedLocation(field, { lat, lng, name: label, area: nearest ? nearest.area : 'Selected Area' }, label);
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
            if (!selectedLocations.pickup || !selectedLocations.destination) {
                document.getElementById('routeInfo').style.display = 'none';
                return;
            }
            const distance = calculateTripDistance(selectedLocations.pickup, selectedLocations.destination);
            const regularTime = mapManager.calculateEstimatedTime(distance, 'regular');
            const regularFare = calculateTripFare(distance);
            const nearestPickup = findNearestLocation(selectedLocations.pickup.lat, selectedLocations.pickup.lng);
            const nearestDestination = findNearestLocation(selectedLocations.destination.lat, selectedLocations.destination.lng);
            routePolyline = L.polyline([[selectedLocations.pickup.lat, selectedLocations.pickup.lng], [selectedLocations.destination.lat, selectedLocations.destination.lng]], { color: '#2E7D32', weight: 4, opacity: 0.8 }).addTo(mapManager.map);
            mapManager.map.fitBounds(routePolyline.getBounds(), { padding: [40, 40] });
            document.getElementById('routeInfo').style.display = 'block';
            document.getElementById('routeFrom').textContent = selectedLocations.pickup.name || 'Current Location';
            document.getElementById('routeTo').textContent = selectedLocations.destination.name || 'Destination';
            document.getElementById('distance').textContent = formatDistance(distance);
            document.getElementById('duration').textContent = `${regularTime} mins`;
            document.getElementById('fare').textContent = `N${regularFare}`;
            document.getElementById('nearestPickup').textContent = nearestPickup ? `${nearestPickup.name} (${nearestPickup.distance.toFixed(2)} km)` : '-';
            document.getElementById('nearestDestination').textContent = nearestDestination ? `${nearestDestination.name} (${nearestDestination.distance.toFixed(2)} km)` : '-';
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
            document.getElementById('bookingForm').style.display = 'none';
            document.getElementById('rideOptionsStep').style.display = 'block';
            mapManager.showMessage('Distance calculated. Finding nearby tricycles...', 'success');
        }

        function showLocationStep() {
            document.getElementById('rideOptionsStep').style.display = 'none';
            document.getElementById('findingDriverStep').style.display = 'none';
            document.getElementById('driverFoundStep').style.display = 'none';
            document.getElementById('bookingForm').style.display = 'block';
        }

        function confirmBooking() {
            document.getElementById('rideOptionsStep').style.display = 'none';
            document.getElementById('findingDriverStep').style.display = 'block';
            setTimeout(() => {
                document.getElementById('findingDriverStep').style.display = 'none';
                document.getElementById('driverFoundStep').style.display = 'block';
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
    </script>
</body>
</html>
