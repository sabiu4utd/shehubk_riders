// Birnin Kebbi coordinates
const DEFAULT_LAT = 12.4539;
const DEFAULT_LNG = 4.1975;
const DEFAULT_ZOOM = 13;

// Common locations in Birnin Kebbi
const KNOWN_LOCATIONS = {
    // Key civic locations
    "federal medical center": { lat: 12.4512, lng: 4.1989, name: "Federal Medical Center" },
    "central market": { lat: 12.4531, lng: 4.1952, name: "Central Market" },
    "emir palace": { lat: 12.4556, lng: 4.1967, name: "Emir's Palace" },
    "ahmadu bello way": { lat: 12.4539, lng: 4.1975, name: "Ahmadu Bello Way" },
    "poly junction": { lat: 12.4482, lng: 4.1945, name: "Poly Junction" },
    "marina": { lat: 12.4597, lng: 4.2012, name: "Marina" },
    "haliru abdu stadium": { lat: 12.4508, lng: 4.2001, name: "Haliru Abdu Stadium" },
    "government house": { lat: 12.4572, lng: 4.1983, name: "Government House" },
    "police headquarters": { lat: 12.4545, lng: 4.1958, name: "Police Headquarters" },
    "yauri road": { lat: 12.4521, lng: 4.1932, name: "Yauri Road" },
    "supreme hotel": { lat: 12.4534, lng: 4.1965, name: "Supreme Hotel" },
    "birnin kebbi mall": { lat: 12.4547, lng: 4.1971, name: "Birnin Kebbi Mall" },

    // Government / civic
    "state secretariat": { lat: 12.4564, lng: 4.1979, name: "State Secretariat" },
    "emirs roundabout": { lat: 12.4558, lng: 4.1973, name: "Emir's Roundabout" },
    "kebbi central mosque": { lat: 12.4559, lng: 4.1960, name: "Kebbi Central Mosque" },
    "army barracks": { lat: 12.4639, lng: 4.2105, name: "Army Barracks" },
    "airport": { lat: 12.4693, lng: 4.2107, name: "Birnin Kebbi Airport" },
    "state library": { lat: 12.4548, lng: 4.1984, name: "Kebbi State Library" },
    "high court": { lat: 12.4568, lng: 4.1956, name: "Kebbi State High Court" },
    "post office": { lat: 12.4542, lng: 4.1961, name: "Post Office" },

    // Educational
    "kebbi state polytechnic": { lat: 12.4478, lng: 4.1907, name: "Kebbi State Polytechnic" },
    "sir ahmadu bello college": { lat: 12.4516, lng: 4.1996, name: "Sir Ahmadu Bello College" },
    "school of nursing": { lat: 12.4499, lng: 4.1935, name: "School of Nursing" },
    "kebbi state university liaison": { lat: 12.4671, lng: 4.2053, name: "Kebbi State University Liaison Office" },

    // Hospitals
    "ashmed hospital": { lat: 12.4525, lng: 4.2019, name: "Ashmed Hospital" },
    "sunshine hospital": { lat: 12.4536, lng: 4.1998, name: "Sunshine Hospital" },
    "al-ameen clinic": { lat: 12.4509, lng: 4.1959, name: "Al-Ameen Clinic" },
    "hilltop hospital": { lat: 12.4492, lng: 4.1995, name: "Hilltop Hospital" },
    "kebbi medical center": { lat: 12.4519, lng: 4.2024, name: "Kebbi Medical Center" },
    "maryam hospital": { lat: 12.4523, lng: 4.2006, name: "Maryam Hospital" },
    "kebbi university teaching hospital": { lat: 12.4517, lng: 4.2009, name: "Kebbi University Teaching Hospital" },
    "nassara clinic": { lat: 12.4541, lng: 4.1988, name: "Nassara Clinic" },
    "general hospital": { lat: 12.4505, lng: 4.1978, name: "General Hospital Birnin Kebbi" },

    // Banks
    "uba bank": { lat: 12.4543, lng: 4.1963, name: "UBA Bank" },
    "gtbank": { lat: 12.4551, lng: 4.1972, name: "GTBank" },
    "zenith bank": { lat: 12.4560, lng: 4.1980, name: "Zenith Bank" },
    "first bank": { lat: 12.4540, lng: 4.1958, name: "First Bank" },
    "union bank": { lat: 12.4536, lng: 4.1957, name: "Union Bank" },
    "access bank": { lat: 12.4548, lng: 4.1968, name: "Access Bank" },
    "ecobank": { lat: 12.4553, lng: 4.1969, name: "Ecobank" },
    "keystone bank": { lat: 12.4550, lng: 4.1959, name: "Keystone Bank" },
    "jaiz bank": { lat: 12.4537, lng: 4.1979, name: "Jaiz Bank" },
    "fidelity bank": { lat: 12.4559, lng: 4.1975, name: "Fidelity Bank" },

    // Markets / commercial
    "old market": { lat: 12.4549, lng: 4.1943, name: "Old Market" },
    "bakin kasuwa": { lat: 12.4540, lng: 4.1949, name: "Bakin Kasuwa" },
    "danmama roundabout": { lat: 12.4562, lng: 4.2018, name: "Danmama Roundabout" },
    "motor park": { lat: 12.4495, lng: 4.1962, name: "Birnin Kebbi Motor Park" },

    // Residential
    "dakin gari quarters": { lat: 12.4602, lng: 4.2024, name: "Dakin Gari Quarters" },
    "aliero quarters": { lat: 12.4527, lng: 4.1909, name: "Aliero Quarters" },
    "badariya area": { lat: 12.4625, lng: 4.2060, name: "Badariya Area" },
    "gwadangaji area": { lat: 12.4487, lng: 4.1919, name: "Gwadangaji Area" },
    "nassara quarters": { lat: 12.4505, lng: 4.1950, name: "Nassara Quarters" },
    "uwarku junction": { lat: 12.4491, lng: 4.1990, name: "Uwarku Junction" },
    "commissioners quarters": { lat: 12.4585, lng: 4.2021, name: "Commissioners’ Quarters" },
    "gulumbe area": { lat: 12.4651, lng: 4.2077, name: "Gulumbe Area" },
    "rafin atiku": { lat: 12.4469, lng: 4.1927, name: "Rafin Atiku" },
    "sabuwar kasa": { lat: 12.4546, lng: 4.2031, name: "Sabuwar Kasa Area" },
    "makera": { lat: 12.4577, lng: 4.1934, name: "Makera Area" },

    // Hotels & recreation
    "royal guest inn": { lat: 12.4515, lng: 4.1973, name: "Royal Guest Inn" },
    "kebbi hotel": { lat: 12.4528, lng: 4.1969, name: "Kebbi Hotel" },
    "marina resort": { lat: 12.4592, lng: 4.2029, name: "Marina Resort" },

    // Roads & squares
    "independent square": { lat: 12.4523, lng: 4.1984, name: "Independent Square" }
};

// Make KNOWN_LOCATIONS available globally
window.KNOWN_LOCATIONS = KNOWN_LOCATIONS;

class MapManager {
    constructor(containerId) {
        if (!containerId) {
            throw new Error('Container ID is required');
        }

        const container = document.getElementById(containerId);
        if (!container) {
            throw new Error(`Container with ID "${containerId}" not found`);
        }

        this.map = L.map(containerId).setView([DEFAULT_LAT, DEFAULT_LNG], DEFAULT_ZOOM);
        this.markers = [];
        
        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(this.map);

        // Initialize a simple Nominatim-based geocoder as a fallback (no API key required).
        // It implements the minimal interface used elsewhere: geocode(query, callback) and reverse(coords, zoom, callback)
        try {
            this.geocoder = {
                geocode: (query, callback) => {
                    const url = 'https://nominatim.openstreetmap.org/search?format=json&limit=5&addressdetails=1&q=' + encodeURIComponent(query);
                    fetch(url, {
                        headers: {
                            'Accept': 'application/json',
                            'User-Agent': 'shehubk_riders/1.0'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        const results = (data || []).map(item => ({
                            center: { lat: parseFloat(item.lat), lng: parseFloat(item.lon) },
                            name: item.display_name
                        }));
                        callback(results);
                    })
                    .catch(err => {
                        console.warn('Nominatim geocode error', err);
                        callback([]);
                    });
                },
                reverse: (coords, zoom, callback) => {
                    const url = 'https://nominatim.openstreetmap.org/reverse?format=json&addressdetails=1&lat=' + encodeURIComponent(coords.lat) + '&lon=' + encodeURIComponent(coords.lng);
                    fetch(url, {
                        headers: {
                            'Accept': 'application/json',
                            'User-Agent': 'shehubk_riders/1.0'
                        }
                    })
                    .then(res => res.json())
                    .then(item => {
                        if (item && item.display_name) {
                            callback([{ name: item.display_name }]);
                        } else {
                            callback([]);
                        }
                    })
                    .catch(err => {
                        console.warn('Nominatim reverse error', err);
                        callback([]);
                    });
                }
            };
            console.info('Nominatim geocoder initialized as fallback.');
        } catch (e) {
            console.warn('Could not initialize fallback geocoder', e);
            this.geocoder = null;
        }

        // Initialize markers layer group
        this.markersLayer = L.layerGroup().addTo(this.map);

        // Add click handler to map for location selection
        this.map.on('click', (e) => {
            this.handleMapClick(e);
        });

        // Initialize location selection mode
        this.locationSelectionMode = null; // Can be 'pickup' or 'destination'
        this.tempMarker = null;
    }

    // Handle map clicks for location selection
    async handleMapClick(e) {
        const { lat, lng } = e.latlng;
        
        if (this.locationSelectionMode) {
            // Remove previous temporary marker if it exists
            if (this.tempMarker) {
                this.map.removeLayer(this.tempMarker);
            }

            // Create a new marker at clicked location
            this.tempMarker = L.marker([lat, lng], {
                icon: this.createTricycleIcon()
            }).addTo(this.map);

            // Get address for clicked location
            const address = await this.getAddressFromCoords(lat, lng);
            
            // Update the corresponding input field
            const input = document.getElementById(this.locationSelectionMode);
            if (input) {
                input.value = address;
            }

            // Add popup with confirm button
            const popupContent = `
                <div class="p-2">
                    <h6 class="mb-1">${address}</h6>
                    <button onclick="mapManager.confirmLocation(${lat}, ${lng}, '${address}')" 
                            class="btn btn-primary-custom btn-sm mt-2">
                        Confirm Location
                    </button>
                </div>
            `;
            this.tempMarker.bindPopup(popupContent).openPopup();
        }
    }

    // Start location selection mode
    startLocationSelection(mode) {
        this.locationSelectionMode = mode; // 'pickup' or 'destination'
        // Show helper message
        this.showMessage('Click on the map to select location');
    }

    // Confirm selected location
    confirmLocation(lat, lng, address) {
        const input = document.getElementById(this.locationSelectionMode);
        if (input) {
            input.value = address;
            // Store the coordinates as data attributes
            input.dataset.lat = lat;
            input.dataset.lng = lng;
        }

        // Clear selection mode
        this.locationSelectionMode = null;
        if (this.tempMarker) {
            this.map.removeLayer(this.tempMarker);
            this.tempMarker = null;
        }

        this.showMessage('Location confirmed!', 'success');
    }

    // Show message to user
    showMessage(message, type = 'info') {
        const messageDiv = document.createElement('div');
        messageDiv.className = `map-message ${type}`;
        messageDiv.textContent = message;
        
        // Remove any existing messages
        const existingMessages = document.getElementsByClassName('map-message');
        Array.from(existingMessages).forEach(el => el.remove());
        
        // Add new message
        this.map.getContainer().appendChild(messageDiv);
        
        // Remove message after 3 seconds
        setTimeout(() => messageDiv.remove(), 3000);
    }

    // Find known location from input text
    findKnownLocation(input) {
        const searchText = input.toLowerCase().replace(/[,.-]/g, '');
        
        // First, check for exact matches in known locations
        for (const [key, location] of Object.entries(KNOWN_LOCATIONS)) {
            if (searchText.includes(key)) {
                return location;
            }
        }

        // If no exact match, try fuzzy matching
        for (const [key, location] of Object.entries(KNOWN_LOCATIONS)) {
            const words = key.split(' ');
            for (const word of words) {
                if (word.length > 3 && searchText.includes(word)) {
                    return location;
                }
            }
        }

        return null;
    }

    // Get coordinates from address
    async getCoordinatesFromAddress(address) {
        return new Promise((resolve, reject) => {
            // First check if it's a known location
            const knownLocation = this.findKnownLocation(address);
            if (knownLocation) {
                resolve({
                    lat: knownLocation.lat,
                    lng: knownLocation.lng,
                    name: knownLocation.name
                });
                return;
            }

            // If not a known location, try geocoding (guard if geocoder is available)
            if (!this.geocoder || typeof this.geocoder.geocode !== 'function') {
                // Geocoder not initialized; surface a helpful error
                reject(new Error('Geocoding service not available'));
                return;
            }

            this.geocoder.geocode(address + ', Birnin Kebbi, Nigeria', results => {
                if (results && results.length > 0) {
                    // Verify the result is within Birnin Kebbi area
                    const lat = results[0].center.lat;
                    const lng = results[0].center.lng;
                    
                    if (this.isWithinBirninKebbi(lat, lng)) {
                        resolve({
                            lat: lat,
                            lng: lng,
                            name: results[0].name
                        });
                    } else {
                        reject(new Error('Location is outside Birnin Kebbi'));
                    }
                } else {
                    reject(new Error('Location not found'));
                }
            });
        });
    }

    // Check if coordinates are within Birnin Kebbi
    isWithinBirninKebbi(lat, lng) {
        // Define Birnin Kebbi boundaries
        const boundaries = {
            north: 12.4739,
            south: 12.4339,
            east: 4.2175,
            west: 4.1775
        };

        return lat >= boundaries.south && 
               lat <= boundaries.north && 
               lng >= boundaries.west && 
               lng <= boundaries.east;
    }

    // Get address from coordinates
    async getAddressFromCoords(lat, lng) {
        // First check if it's near a known location
        for (const location of Object.values(KNOWN_LOCATIONS)) {
            const distance = this.calculateDistance(lat, lng, location.lat, location.lng);
            if (distance < 0.2) { // Within 200 meters
                return location.name;
            }
        }

        return new Promise((resolve, reject) => {
            // If geocoder isn't available, fall back to nearest known location
            if (!this.geocoder || typeof this.geocoder.reverse !== 'function') {
                let nearest = null;
                let minDistance = Infinity;
                for (const location of Object.values(KNOWN_LOCATIONS)) {
                    const distance = this.calculateDistance(lat, lng, location.lat, location.lng);
                    if (distance < minDistance) {
                        minDistance = distance;
                        nearest = location;
                    }
                }

                if (nearest && minDistance < 1.0) { // only report nearby known places within 1km
                    resolve(`Near ${nearest.name}`);
                } else if (nearest) {
                    resolve(nearest.name);
                } else {
                    resolve("Unknown location");
                }
                return;
            }

            this.geocoder.reverse(
                { lat: lat, lng: lng },
                this.map.getZoom(),
                results => {
                    if (results && results.length > 0) {
                        resolve(results[0].name);
                    } else {
                        // Get nearest known location
                        let nearest = null;
                        let minDistance = Infinity;
                        
                        for (const location of Object.values(KNOWN_LOCATIONS)) {
                            const distance = this.calculateDistance(
                                lat, lng, location.lat, location.lng
                            );
                            if (distance < minDistance) {
                                minDistance = distance;
                                nearest = location;
                            }
                        }
                        
                        if (nearest) {
                            resolve(`Near ${nearest.name}`);
                        } else {
                            resolve("Unknown location");
                        }
                    }
                }
            );
        });
    }

    createTricycleIcon() {
        return L.divIcon({
            html: '<i class="fas fa-shuttle-van fa-lg"></i>',
            className: 'tricycle-marker',
            iconSize: [30, 30],
            iconAnchor: [15, 15]
        });
    }

    async addTricycleMarker(lat, lng, driverInfo) {
        const marker = L.marker([lat, lng], {
            icon: this.createTricycleIcon()
        });

        // Get the address for the marker location
        const address = await this.getAddressFromCoords(lat, lng);

        const popupContent = `
            <div class="p-2">
                <h6 class="mb-1">${driverInfo.name}</h6>
                <p class="mb-1"><small>${address}</small></p>
                ${driverInfo.rating ? `<p class="mb-1"><small>Rating: ${driverInfo.rating} ⭐</small></p>` : ''}
                ${driverInfo.id ? `
                    <button onclick="requestRide(${driverInfo.id})" 
                            class="btn btn-primary-custom btn-sm">
                        Request Ride
                    </button>
                ` : ''}
            </div>
        `;

        marker.bindPopup(popupContent);
        marker.addTo(this.map);
        this.markers.push(marker);
        return marker;
    }

    updateMarkerPosition(markerId, lat, lng) {
        const marker = this.markers[markerId];
        if (marker) {
            marker.setLatLng([lat, lng]);
        }
    }

    clearMarkers() {
        this.markers.forEach(marker => marker.remove());
        this.markers = [];
    }

    // Calculate distance between two points in kilometers
    calculateDistance(lat1, lon1, lat2, lon2) {
        const R = 6371; // Earth's radius in kilometers
        const dLat = this.deg2rad(lat2 - lat1);
        const dLon = this.deg2rad(lon2 - lon1);
        const a = 
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) * 
            Math.sin(dLon/2) * Math.sin(dLon/2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        const distance = R * c; // Distance in km
        return Math.round(distance * 100) / 100; // Round to 2 decimal places
    }

    // Convert degrees to radians
    deg2rad(deg) {
        return deg * (Math.PI/180);
    }

    // Calculate fare based on distance and ride type
    calculateFare(distance, rideType = 'regular') {
        const RATE_PER_KM = 500; // Base rate in Naira per kilometer
        const baseFare = Math.ceil(distance * RATE_PER_KM);
        
        // Apply discount for shared rides
        if (rideType === 'shared') {
            return Math.ceil(baseFare * 0.6); // 40% discount for shared rides
        }
        
        return baseFare;
    }

    // Calculate estimated time based on distance and ride type
    calculateEstimatedTime(distance, rideType = 'regular') {
        // Regular rides: Assume average speed of 20km/h
        // Shared rides: Assume slower due to multiple stops
        const avgSpeedKmH = rideType === 'shared' ? 15 : 20;
        return Math.ceil((distance / avgSpeedKmH) * 60); // Convert to minutes
    }

    // Add route display between two points and calculate fare
    async showRoute(startLat, startLng, endLat, endLng) {
        const routePoints = [
            [startLat, startLng],
            [endLat, endLng]
        ];
        
        const routeLine = L.polyline(routePoints, {
            color: '#2E7D32',
            weight: 4,
            opacity: 0.7
        }).addTo(this.map);

        // Get place names
        const startAddress = await this.getAddressFromCoords(startLat, startLng);
        const endAddress = await this.getAddressFromCoords(endLat, endLng);

        // Calculate distance and fares
        const distance = this.calculateDistance(startLat, startLng, endLat, endLng);
        const regularFare = this.calculateFare(distance, 'regular');
        const sharedFare = this.calculateFare(distance, 'shared');
        const regularTime = this.calculateEstimatedTime(distance, 'regular');
        const sharedTime = this.calculateEstimatedTime(distance, 'shared');

        // Create a custom control to display route information
        const routeInfo = L.control({position: 'bottomright'});
        routeInfo.onAdd = () => {
            const div = L.DomUtil.create('div', 'route-info');
            div.innerHTML = `
                <div class="bg-white p-2 rounded shadow">
                    <strong>From:</strong> ${startAddress}<br>
                    <strong>To:</strong> ${endAddress}<br>
                    <strong>Distance:</strong> ${distance} km<br>
                    <strong>Regular Ride:</strong> ₦${regularFare} (${regularTime} mins)<br>
                    <strong>Shared Ride:</strong> ₦${sharedFare} (${sharedTime} mins)
                </div>
            `;
            return div;
        };
        routeInfo.addTo(this.map);

        this.map.fitBounds(routeLine.getBounds(), { padding: [50, 50] });
        
        // Return the calculated values
        return {
            distance,
            regularFare,
            sharedFare,
            regularTime,
            sharedTime,
            startAddress,
            endAddress
        };
    }

    // Get user's current location
    getUserLocation() {
        return new Promise((resolve, reject) => {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(
                    position => resolve({
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    }),
                    error => reject(error)
                );
            } else {
                reject(new Error("Geolocation is not supported"));
            }
        });
    }
}

// Usage example:
// const map = new MapManager('map');
// map.addTricycleMarker(12.4539, 4.1975, {
//     id: 1,
//     name: "John's Tricycle",
//     rating: 4.5
// });