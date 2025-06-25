/*
Template Name: Massive
Author: GrayGrids
*/

(function () {
    //===== Prealoder

    window.onload = function () {
        window.setTimeout(fadeout, 500);
    };

    function fadeout() {
        document.querySelector("#loading-area").style.opacity = "0";
        document.querySelector("#loading-area").style.display = "none";
    }

    /*=====================================
    Sticky
    ======================================= */
    window.onscroll = function () {
        var header_navbar = document.querySelector(".navbar-area");
        var sticky = header_navbar.offsetTop;

        if (window.pageYOffset > sticky) {
            header_navbar.classList.add("sticky");
        } else {
            header_navbar.classList.remove("sticky");
        }

        // show or hide the back-top-top button
        var backToTo = document.querySelector(".scroll-top");
        if (
            document.body.scrollTop > 50 ||
            document.documentElement.scrollTop > 50
        ) {
            backToTo.style.display = "flex";
        } else {
            backToTo.style.display = "none";
        }
    };

    // for menu scroll
    var pageLink = document.querySelectorAll(".page-scroll");

    pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
            e.preventDefault();
            document.querySelector(elem.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
                offsetTop: 1 - 60,
            });
        });
    });

    //===== close navbar-collapse when a  clicked
    let navbarToggler = document.querySelector(".navbar-toggler");
    var navbarCollapse = document.querySelector(".collapse");

    document.querySelectorAll(".page-scroll").forEach((e) =>
        e.addEventListener("click", () => {
            navbarToggler.classList.remove("active");
            navbarCollapse.classList.remove("show");
        })
    );
    navbarToggler.addEventListener("click", function () {
        navbarToggler.classList.toggle("active");
    });
    // WOW active
    new WOW().init();
})();

// jobs.create
// Leaflet Map variables
let map, marker;
let uploadedFiles = [];

document.addEventListener("DOMContentLoaded", function () {
    // Initialize Leaflet Map
    initMap();

    // File upload handling
    setupFileUpload();
});

// Leaflet Map functions
function initMap() {
    // Nukus coordinates
    const defaultLocation = [42.4611, 59.6166];

    // Initialize map
    map = L.map("map").setView(defaultLocation, 12);

    // Add tile layer (OpenStreetMap)
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "© OpenStreetMap contributors",
    }).addTo(map);

    // Map click event
    map.on("click", function (e) {
        placeMarker(e.latlng);
        updateCoordinates(e.latlng.lat, e.latlng.lng);
        reverseGeocode(e.latlng.lat, e.latlng.lng);
    });

    // Check for old values
    const oldLat = document.getElementById("latitude").value;
    const oldLng = document.getElementById("longitude").value;

    if (oldLat && oldLng) {
        const location = L.latLng(parseFloat(oldLat), parseFloat(oldLng));
        placeMarker(location);
        updateCoordinates(parseFloat(oldLat), parseFloat(oldLng));
    }
}

function placeMarker(location) {
    if (marker) {
        marker.setLatLng(location);
    } else {
        marker = L.marker(location, {
            draggable: true,
        }).addTo(map);

        marker.on("dragend", function (e) {
            const position = marker.getLatLng();
            updateCoordinates(position.lat, position.lng);
            reverseGeocode(position.lat, position.lng);
        });
    }
    map.setView(location, 14);
}

function updateCoordinates(lat, lng) {
    document.getElementById("latitude").value = lat.toFixed(8);
    document.getElementById("longitude").value = lng.toFixed(8);
    document.getElementById("latDisplay").textContent = lat.toFixed(6);
    document.getElementById("lngDisplay").textContent = lng.toFixed(6);
}

function reverseGeocode(lat, lng) {
    // Using Nominatim for reverse geocoding
    fetch(
        `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&accept-language=uz`
    )
        .then((response) => response.json())
        .then((data) => {
            if (data.display_name) {
                document.getElementById("address").value = data.display_name;
            }
        })
        .catch((error) => console.error("Reverse geocoding error:", error));
}

function searchAddress() {
    const address = document.getElementById("address").value;

    if (!address) {
        alert('{{ __("Please enter an address") }}');
        return;
    }

    // Using Nominatim for geocoding
    fetch(
        `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(
            address
        )}&countrycodes=uz&limit=1`
    )
        .then((response) => response.json())
        .then((data) => {
            if (data && data.length > 0) {
                const result = data[0];
                const location = L.latLng(
                    parseFloat(result.lat),
                    parseFloat(result.lon)
                );
                placeMarker(location);
                updateCoordinates(
                    parseFloat(result.lat),
                    parseFloat(result.lon)
                );
                document.getElementById("address").value = result.display_name;
            } else {
                alert('{{ __("Address not found") }}');
            }
        })
        .catch((error) => {
            console.error("Geocoding error:", error);
            alert('{{ __("Error searching address") }}');
        });
}

function getCurrentLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                const location = L.latLng(
                    position.coords.latitude,
                    position.coords.longitude
                );
                placeMarker(location);
                updateCoordinates(
                    position.coords.latitude,
                    position.coords.longitude
                );
                reverseGeocode(
                    position.coords.latitude,
                    position.coords.longitude
                );
            },
            function (error) {
                alert('{{ __("Error getting location") }}: ' + error.message);
            }
        );
    } else {
        alert('{{ __("Geolocation not supported") }}');
    }
}

function clearLocation() {
    if (marker) {
        map.removeLayer(marker);
        marker = null;
    }
    document.getElementById("latitude").value = "";
    document.getElementById("longitude").value = "";
    document.getElementById("address").value = "";
    document.getElementById("latDisplay").textContent = "-";
    document.getElementById("lngDisplay").textContent = "-";
}

// File Upload Functions
function setupFileUpload() {
    const uploadArea = document.querySelector(".upload-area");
    const fileInput = document.getElementById("imageInput");
    const previewContainer = document.getElementById("imagePreview");

    // Click to upload
    fileInput.addEventListener("change", handleFiles);

    // Drag and drop
    uploadArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        uploadArea.classList.add("drag-over");
    });

    uploadArea.addEventListener("dragleave", () => {
        uploadArea.classList.remove("drag-over");
    });

    uploadArea.addEventListener("drop", (e) => {
        e.preventDefault();
        uploadArea.classList.remove("drag-over");

        const files = e.dataTransfer.files;
        handleFilesArray(Array.from(files));
    });
}

function handleFiles(e) {
    const files = Array.from(e.target.files);
    handleFilesArray(files);
}

function handleFilesArray(files) {
    const imageFiles = files.filter((file) => file.type.startsWith("image/"));

    imageFiles.forEach((file) => {
        if (file.size > 5 * 1024 * 1024) {
            // 5MB limit
            alert(`${file.name} is too large. Maximum size is 5MB`);
            return;
        }

        uploadedFiles.push(file);
        displayPreview(file);
    });

    updateFileInput();
}

function displayPreview(file) {
    const reader = new FileReader();
    const previewContainer = document.getElementById("imagePreview");

    reader.onload = function (e) {
        const previewItem = document.createElement("div");
        previewItem.className = "image-preview-item";
        previewItem.innerHTML = `
                <img src="${e.target.result}" alt="${file.name}">
                <button type="button" class="remove-btn" onclick="removeImage('${file.name}')">×</button>
            `;
        previewContainer.appendChild(previewItem);
    };

    reader.readAsDataURL(file);
}

function removeImage(fileName) {
    uploadedFiles = uploadedFiles.filter((file) => file.name !== fileName);
    updateFileInput();

    // Update preview
    const previewContainer = document.getElementById("imagePreview");
    const previewItems = previewContainer.querySelectorAll(
        ".image-preview-item"
    );
    previewItems.forEach((item) => {
        const img = item.querySelector("img");
        if (img.alt === fileName) {
            item.remove();
        }
    });
}

function updateFileInput() {
    const fileInput = document.getElementById("imageInput");
    const dataTransfer = new DataTransfer();

    uploadedFiles.forEach((file) => {
        dataTransfer.items.add(file);
    });

    fileInput.files = dataTransfer.files;
}
