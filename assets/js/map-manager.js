// Birnin Kebbi coordinates
const DEFAULT_LAT = 12.4539;
const DEFAULT_LNG = 4.1975;
const DEFAULT_ZOOM = 13;

class MapManager {
    constructor(containerId) {
        this.map = L.map(containerId).setView([DEFAULT_LAT, DEFAULT_LNG], DEFAULT_ZOOM);
        this.markers = [];
        
        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(this.map);
    }

    createTricycleIcon() {
        return L.divIcon({
            html: '<i class="fas fa-shuttle-van fa-lg"></i>',
            className: 'tricycle-marker',
            iconSize: [30, 30],
            iconAnchor: [15, 15]
        });
    }

    addTricycleMarker(lat, lng, driverInfo) {
        const marker = L.marker([lat, lng], {
            icon: this.createTricycleIcon()
        });

        const popupContent = `
            <div class="p-2">
                <h6 class="mb-1">${driverInfo.name}</h6>
                <p class="mb-1"><small>Rating: ${driverInfo.rating} ⭐</small></p>
                <button onclick="requestRide(${driverInfo.id})" 
                        class="btn btn-primary-custom btn-sm">
                    Request Ride
                </button>
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

    // Add route display between two points
    showRoute(startLat, startLng, endLat, endLng) {
        // In a real application, you would use a routing service
        // For now, we'll just draw a line between points
        const routePoints = [
            [startLat, startLng],
            [endLat, endLng]
        ];
        
        const routeLine = L.polyline(routePoints, {
            color: '#2E7D32',
            weight: 4,
            opacity: 0.7
        }).addTo(this.map);

        this.map.fitBounds(routeLine.getBounds(), { padding: [50, 50] });
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