let imagesToDelete = [];
let newImageFiles = []; // Track new images
const MAX_IMAGES = 3;

function deleteImage(imageId) {
    if (!imagesToDelete.includes(imageId)) {
        imagesToDelete.push(imageId);
    }

    // DOM'dan image'ni o'chir (visual effect)
    const imageContainer = event.target.closest(".col-md-3");
    if (imageContainer) {
        imageContainer.style.transition = "opacity 0.3s ease";
        imageContainer.style.opacity = "0";
        setTimeout(() => {
            imageContainer.remove();
            updateImageCounts();
        }, 300);
    }
}

function updateImageCounts() {
    const currentImages = document.querySelectorAll(
        ".existing-images .col-md-3"
    ).length;
    const newImages = newImageFiles.length;
    const totalImages = currentImages + newImages;

    // Update UI to show current status
    const statusElement = document.getElementById("imageCountStatus");
    if (statusElement) {
        statusElement.textContent = `${totalImages}/3 images`;

        if (totalImages >= MAX_IMAGES) {
            statusElement.classList.add("text-warning");
            document.getElementById("fileUploadArea").style.display = "none";
        } else {
            statusElement.classList.remove("text-warning");
            document.getElementById("fileUploadArea").style.display = "block";
        }
    }
}

function removeNewImage(index) {
    newImageFiles.splice(index, 1);
    updateImagePreview();
    updateImageCounts();
}

function updateImagePreview() {
    const previewContainer = document.getElementById("imagePreview");
    previewContainer.innerHTML = "";

    newImageFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const previewItem = document.createElement("div");
            previewItem.className = "image-preview-item";
            previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                    <button type="button" class="remove-btn" onclick="removeNewImage(${index})">×</button>
                `;
            previewContainer.appendChild(previewItem);
        };
        reader.readAsDataURL(file);
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("jobEditForm");
    const imageInput = document.getElementById("imageInput");

    // Handle new image selection
    imageInput.addEventListener("change", function (e) {
        const files = Array.from(e.target.files);
        const currentImages = document.querySelectorAll(
            ".existing-images .col-md-3"
        ).length;
        const totalPossibleImages =
            currentImages + newImageFiles.length + files.length;

        if (totalPossibleImages > MAX_IMAGES) {
            const allowedCount =
                MAX_IMAGES - (currentImages + newImageFiles.length);
            alert(
                `Maksimal ${MAX_IMAGES} ta rasm yuklash mumkun. Siz ${allowedCount} ta rasm qo'sha olasiz.`
            );

            // Only add allowed number of files
            if (allowedCount > 0) {
                newImageFiles.push(...files.slice(0, allowedCount));
            }
        } else {
            newImageFiles.push(...files);
        }

        updateImagePreview();
        updateImageCounts();

        // Clear the input
        e.target.value = "";
    });

    form.addEventListener("submit", function (e) {
        console.log("=== FORM SUBMISSION ===");

        // Add deleted images to form
        imagesToDelete.forEach((imageId) => {
            const hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "delete_images[]";
            hiddenInput.value = imageId;
            form.appendChild(hiddenInput);
        });

        // Update file input with new images
        const dataTransfer = new DataTransfer();
        newImageFiles.forEach((file) => {
            dataTransfer.items.add(file);
        });
        imageInput.files = dataTransfer.files;

        const subcategorySelect = document.querySelector(
            'select[name="subcategory_id"]'
        );
        console.log("Selected subcategory:", subcategorySelect.value);

        console.log("Latitude:", document.getElementById("latitude").value);
        console.log("Longitude:", document.getElementById("longitude").value);
        console.log("Images to delete:", imagesToDelete);
        console.log("New images count:", newImageFiles.length);
    });

    // Initial count update
    updateImageCounts();
});

    let map, marker;

    document.addEventListener('DOMContentLoaded', function() {
        const existingLat = {
            {
                $job - > latitude ?? 'null'
            }
        };
        const existingLng = {
            {
                $job - > longitude ?? 'null'
            }
        };

        // Map container mavjudligini tekshirish
        const mapContainer = document.getElementById('map');
        if (!mapContainer) {
            console.error('Map container topilmadi');
            return;
        }

        // Map initialization
        try {
            // Default location (Nukus)
            const defaultLocation = [42.4611, 59.6166];
            const initialLocation = (existingLat && existingLng) ? [existingLat, existingLng] :
                defaultLocation;

            // Initialize map
            map = L.map('map').setView(initialLocation, 12);

            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Map click event
            map.on('click', function(e) {
                placeMarker(e.latlng);
                updateCoordinates(e.latlng.lat, e.latlng.lng);
                reverseGeocode(e.latlng.lat, e.latlng.lng);
            });

            // Agar coordinates mavjud bo'lsa, marker qo'sh
            if (existingLat && existingLng) {
                placeMarker(L.latLng(existingLat, existingLng));
                updateCoordinates(existingLat, existingLng);
            }
        } catch (error) {
            console.error('Map initialization error:', error);
        }
    });

    // Place marker function
    function placeMarker(location) {
        if (marker) {
            marker.setLatLng(location);
        } else {
            marker = L.marker(location, {
                draggable: true
            }).addTo(map);

            marker.on('dragend', function(e) {
                const position = marker.getLatLng();
                updateCoordinates(position.lat, position.lng);
                reverseGeocode(position.lat, position.lng);
            });
        }
        map.setView(location, 14);
    }

    // Update coordinates function
    function updateCoordinates(lat, lng) {
        document.getElementById('latitude').value = lat.toFixed(8);
        document.getElementById('longitude').value = lng.toFixed(8);
        document.getElementById('latDisplay').textContent = lat.toFixed(6);
        document.getElementById('lngDisplay').textContent = lng.toFixed(6);
    }

    // Reverse geocode function
    function reverseGeocode(lat, lng) {
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&accept-language=uz`)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    document.getElementById('address').value = data.display_name;
                }
            })
            .catch(error => console.error('Reverse geocoding error:', error));
    }

    // getCurrentLocation, searchAddress, clearLocation funksiyalari main.js'dan keladi
// summernote
$(document).ready(function() {
    $('#description').summernote({
        placeholder: 'Job tavsifini kiriting...',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['font', ['bold', 'italic', 'underline', 'clear']]
        ]
    });
});

L.Icon.Default.mergeOptions({
    iconUrl: '/assets/user/images/leaflet/marker-icon.png',
    iconRetinaUrl: '/assets/user/images/leaflet/marker-icon-2x.png',
    shadowUrl: '/assets/user/images/leaflet/marker-shadow.png'
});