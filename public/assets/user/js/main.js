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
    // Initialize Leaflet Map for jobs.create
    if (document.getElementById("map")) {
        initMap();
        setupFileUpload();
    }

    // Initialize Jobs Show functionality
    if (document.getElementById("jobMap")) {
        initJobShowMap();
    }

    // Initialize Image Gallery for jobs.show
    if (document.querySelectorAll(".job-image-thumb").length > 0) {
        initImageGallery();
    }
});

// ==================== JOBS.CREATE FUNCTIONS ====================

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
    let uploadedFiles = [];
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

    // Check if adding new files would exceed the limit
    const totalFiles = uploadedFiles.length + imageFiles.length;
    if (totalFiles > 3) {
        alert("Maksimal 3 ta rasm yuklash mumkin!");
        return;
    }

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

// ==================== JOBS.SHOW FUNCTIONS ====================

// Job Show Map Initialization
function initJobShowMap() {
    const mapContainer = document.getElementById("jobMap");

    if (!mapContainer) return;

    const lat = parseFloat(mapContainer.dataset.lat);
    const lng = parseFloat(mapContainer.dataset.lng);
    const title = mapContainer.dataset.title;
    const address = mapContainer.dataset.address;
    const phone = mapContainer.dataset.phone;

    if (!lat || !lng) return;

    // Initialize map
    const jobMap = L.map("jobMap").setView([lat, lng], 15);

    // Add tile layer
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "© OpenStreetMap contributors",
    }).addTo(jobMap);

    // Create custom popup content
    let popupContent = `<div class="map-popup">
        <h6 class="mb-2">${title}</h6>
        <p class="mb-2"><i class="lni lni-map-marker"></i> ${address}</p>`;

    if (phone) {
        popupContent += `<p class="mb-0"><i class="lni lni-phone"></i> <a href="tel:${phone}">${phone}</a></p>`;
    }

    popupContent += `</div>`;

    // Add marker with popup
    const jobMarker = L.marker([lat, lng])
        .addTo(jobMap)
        .bindPopup(popupContent)
        .openPopup();

    // Add click event to center map on marker
    jobMarker.on("click", function () {
        jobMap.setView([lat, lng], 16);
    });
}

// Image Gallery/Lightbox Functions
function initImageGallery() {
    // Create lightbox overlay
    createLightboxOverlay();

    // Add click events to all job images
    const imageThumbails = document.querySelectorAll(".job-image-thumb");
    imageThumbails.forEach((img, index) => {
        img.addEventListener("click", () => {
            openLightbox(img.src, index);
        });
    });
}

function createLightboxOverlay() {
    const lightboxHTML = `
        <div id="lightbox-overlay" class="lightbox-overlay">
            <div class="lightbox-container">
                <button class="lightbox-close" onclick="closeLightbox()">×</button>
                <button class="lightbox-prev" onclick="previousImage()">‹</button>
                <img id="lightbox-image" class="lightbox-image" src="" alt="">
                <button class="lightbox-next" onclick="nextImage()">›</button>
                <div class="lightbox-counter">
                    <span id="lightbox-current">1</span> / <span id="lightbox-total">1</span>
                </div>
            </div>
        </div>
    `;

    document.body.insertAdjacentHTML("beforeend", lightboxHTML);
}

let currentImageIndex = 0;
let allImages = [];

function openLightbox(imageSrc, index) {
    // Get all job images
    allImages = Array.from(document.querySelectorAll(".job-image-thumb")).map(
        (img) => img.src
    );
    currentImageIndex = index;

    const lightbox = document.getElementById("lightbox-overlay");
    const lightboxImage = document.getElementById("lightbox-image");
    const currentSpan = document.getElementById("lightbox-current");
    const totalSpan = document.getElementById("lightbox-total");

    lightboxImage.src = imageSrc;
    currentSpan.textContent = currentImageIndex + 1;
    totalSpan.textContent = allImages.length;

    lightbox.style.display = "flex";
    document.body.style.overflow = "hidden";

    // Add keyboard events
    document.addEventListener("keydown", handleLightboxKeydown);
}

function closeLightbox() {
    const lightbox = document.getElementById("lightbox-overlay");
    lightbox.style.display = "none";
    document.body.style.overflow = "";

    // Remove keyboard events
    document.removeEventListener("keydown", handleLightboxKeydown);
}

function previousImage() {
    if (allImages.length > 1) {
        currentImageIndex =
            (currentImageIndex - 1 + allImages.length) % allImages.length;
        updateLightboxImage();
    }
}

function nextImage() {
    if (allImages.length > 1) {
        currentImageIndex = (currentImageIndex + 1) % allImages.length;
        updateLightboxImage();
    }
}

function updateLightboxImage() {
    const lightboxImage = document.getElementById("lightbox-image");
    const currentSpan = document.getElementById("lightbox-current");

    lightboxImage.src = allImages[currentImageIndex];
    currentSpan.textContent = currentImageIndex + 1;
}

function handleLightboxKeydown(e) {
    switch (e.key) {
        case "Escape":
            closeLightbox();
            break;
        case "ArrowLeft":
            previousImage();
            break;
        case "ArrowRight":
            nextImage();
            break;
    }
}

// Legacy function for backward compatibility (from your original code)
function showImage(imageSrc) {
    const allImages = Array.from(document.querySelectorAll(".job-image-thumb"));
    const index = allImages.findIndex((img) => img.src === imageSrc);
    openLightbox(imageSrc, index >= 0 ? index : 0);
}
// offers.show
// Offers.show - Image Gallery functionality
// Main.js faylining oxiriga qo'shing (mavjud kodlar ostiga)

// Offers Image Gallery - Lightbox functionality
let currentOfferImageIndex = 0;
let offerImageGallery = [];

function initOfferImageGallery() {
    const images = document.querySelectorAll(".offer-image-thumb");
    offerImageGallery = Array.from(images).map((img) => img.src);

    images.forEach((img, index) => {
        img.addEventListener("click", () => openOfferLightbox(index));
    });

    // Keyboard navigation
    document.addEventListener("keydown", handleOfferKeyPress);
}

function openOfferLightbox(index) {
    currentOfferImageIndex = index;
    updateOfferLightboxImage();
    document.getElementById("imageLightbox").style.display = "flex";
    document.body.style.overflow = "hidden"; // Prevent scrolling
}

function updateOfferLightboxImage() {
    const lightboxImg = document.getElementById("lightboxImage");
    const counter = document.getElementById("imageCounter");

    lightboxImg.src = offerImageGallery[currentOfferImageIndex];
    counter.textContent = `${currentOfferImageIndex + 1} / ${
        offerImageGallery.length
    }`;

    // Update navigation buttons
    document.getElementById("prevBtn").style.display =
        currentOfferImageIndex === 0 ? "none" : "block";
    document.getElementById("nextBtn").style.display =
        currentOfferImageIndex === offerImageGallery.length - 1
            ? "none"
            : "block";
}

function previousOfferImage() {
    if (currentOfferImageIndex > 0) {
        currentOfferImageIndex--;
        updateOfferLightboxImage();
    }
}

function nextOfferImage() {
    if (currentOfferImageIndex < offerImageGallery.length - 1) {
        currentOfferImageIndex++;
        updateOfferLightboxImage();
    }
}

function handleOfferKeyPress(e) {
    if (document.getElementById("imageLightbox").style.display === "flex") {
        switch (e.key) {
            case "Escape":
                closeLightbox();
                break;
            case "ArrowLeft":
                if (offerImageGallery.length > 0) {
                    previousOfferImage();
                } else {
                    previousImage(); // fallback for jobs
                }
                break;
            case "ArrowRight":
                if (offerImageGallery.length > 0) {
                    nextOfferImage();
                } else {
                    nextImage(); // fallback for jobs
                }
                break;
        }
    }
}

// Update existing DOMContentLoaded event listener
document.addEventListener("DOMContentLoaded", function () {
    // Existing code...
    initMap();
    setupFileUpload();

    // Jobs.show functions
    initJobShowMap();
    initImageGallery();

    // Offers.show functions
    initOfferImageGallery();
});
// Apply tugmasi bosilganda asosiy funksiya
async function handleApply(jobId) {
    console.log("handleApply chaqirildi, jobId:", jobId); // Debug uchun

    try {
        // CSRF token olish
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute("content");
        if (!csrfToken) {
            console.error("CSRF token topilmadi");
            alert("Xatolik: CSRF token topilmadi");
            return;
        }

        console.log("Request yuborilmoqda..."); // Debug uchun

        // Apply status tekshirish - locale bilan to'g'ri URL
        const locale = window.location.pathname.split("/")[1]; // URL'dan locale olish
        const response = await fetch(
            `/${locale}/job-applies/index?job_id=${jobId}`,
            {
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            }
        );

        console.log("Response status:", response.status); // Debug uchun

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        console.log("Response data:", data); // Debug uchun

        // Javobga qarab modallarni ochamiz
        switch (data.status) {
            case "no_offers":
                console.log("No offers modal ochilmoqda");
                showNoOfferModal();
                break;
            case "single_offer":
                console.log("Single offer modal ochilmoqda");
                showSingleOfferModal();
                // Job ID va Offer ID ni modal ichida saqlaymiz
                document.getElementById("jobIdInput").value = jobId;
                document.getElementById("offerIdInput").value = data.offer.id;
                break;
            case "multiple_offers":
                console.log("Multiple offers modal ochilmoqda");
                showMultipleOffersModal();
                document.getElementById("jobIdInputMultiple").value = jobId;
                populateOffers(data.offers);
                break;
            default:
                console.error("Noma'lum status:", data.status);
                alert("Noma'lum xatolik yuz berdi");
        }
    } catch (error) {
        console.error("Error in handleApply:", error);
        alert("Xatolik yuz berdi: " + error.message);
    }
}

// Modal ochish funksiyalari
function showNoOfferModal() {
    console.log("showNoOfferModal chaqirildi");
    const modal = document.getElementById("noOfferModal");
    if (modal) {
        modal.classList.add("show");
        console.log("noOfferModal show class qo'shildi");
    } else {
        console.error("noOfferModal topilmadi");
    }
}

function showSingleOfferModal() {
    console.log("showSingleOfferModal chaqirildi");
    const modal = document.getElementById("singleOfferModal");
    if (modal) {
        modal.classList.add("show");
        console.log("singleOfferModal show class qo'shildi");
    } else {
        console.error("singleOfferModal topilmadi");
    }
}

function showMultipleOffersModal() {
    console.log("showMultipleOffersModal chaqirildi");
    const modal = document.getElementById("multipleOffersModal");
    if (modal) {
        modal.classList.add("show");
        console.log("multipleOffersModal show class qo'shildi");
    } else {
        console.error("multipleOffersModal topilmadi");
    }
}

// Apply modal yopish funksiyasi
function closeApplyModal(modalId) {
    console.log("closeApplyModal chaqirildi:", modalId);
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove("show");
        console.log(modalId + " modal yopildi");
    } else {
        console.error("Modal topilmadi:", modalId);
    }
}

// Profil yaratish funksiyasi
function createProfile() {
    console.log("createProfile chaqirildi");
    // Bu yerda to'g'ri route qo'ying (locale bilan)
    const locale = window.location.pathname.split("/")[1];
    window.location.href = `/${locale}/offers/create`;
    closeApplyModal("noOfferModal");
}

// Offerlarni dropdown'ga to'ldirish
function populateOffers(offers) {
    console.log("populateOffers chaqirildi:", offers);
    const select = document.getElementById("offerSelect");
    if (!select) {
        console.error("offerSelect topilmadi");
        return;
    }

    select.innerHTML = '<option value="">Profil tanlang...</option>';

    if (offers && offers.length > 0) {
        offers.forEach((offer) => {
            const option = document.createElement("option");
            option.value = offer.id;
            option.textContent = `${offer.title || "Profil"} - ${
                offer.experience || "0"
            } yil tajriba`;
            select.appendChild(option);
        });
    }
}

// Ariza yuborish funksiyasi
async function submitApplication() {
    console.log("submitApplication chaqirildi");

    const activeModal = document.querySelector(".apply-modal.show");
    if (!activeModal) {
        console.error("Faol modal topilmadi");
        return;
    }

    console.log("Faol modal:", activeModal.id);

    const formData = new FormData();
    let jobId, offerId, coverLetter;

    // CSRF token qo'shish
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");
    if (csrfToken) {
        formData.append("_token", csrfToken);
    }

    if (activeModal.id === "singleOfferModal") {
        jobId = document.getElementById("jobIdInput").value;
        offerId = document.getElementById("offerIdInput").value;
        coverLetter =
            activeModal.querySelector('textarea[name="cover_letter"]')?.value ||
            "";

        console.log("Single modal data:", { jobId, offerId, coverLetter });
    } else if (activeModal.id === "multipleOffersModal") {
        jobId = document.getElementById("jobIdInputMultiple").value;
        offerId = document.getElementById("offerSelect").value;
        coverLetter =
            activeModal.querySelector('textarea[name="cover_letter"]')?.value ||
            "";

        console.log("Multiple modal data:", { jobId, offerId, coverLetter });

        if (!offerId) {
            alert("Iltimos, profilingizni tanlang!");
            return;
        }
    }

    if (!jobId || !offerId) {
        console.error("JobId yoki OfferId yo'q:", { jobId, offerId });
        alert("Ma'lumotlar to'liq emas!");
        return;
    }

    formData.append("job_id", jobId);
    formData.append("offer_id", offerId);
    formData.append("cover_letter", coverLetter);

    try {
        console.log("Application yuborilmoqda...");

        // Store route'i uchun locale bilan to'g'ri URL
        const locale = window.location.pathname.split("/")[1]; // URL'dan locale olish
        const response = await fetch(`/${locale}/job-applies/store`, {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                Accept: "application/json",
            },
            body: formData,
        });

        console.log("Submit response status:", response.status);

        const data = await response.json();
        console.log("Submit response data:", data);

        if (data.success) {
            alert(data.message);
            // Modallarni yopish
            document
                .querySelectorAll(".apply-modal")
                .forEach((modal) => modal.classList.remove("show"));
            // Formni tozalash
            if (activeModal.querySelector("textarea")) {
                activeModal.querySelector("textarea").value = "";
            }
            if (activeModal.querySelector("select")) {
                activeModal.querySelector("select").value = "";
            }
        } else {
            alert(data.message || "Xatolik yuz berdi");
        }
    } catch (error) {
        console.error("Submit error:", error);
        alert("Arizani yuborishda xatolik yuz berdi: " + error.message);
    }
}

// Character counter funksiyasi
function updateApplyCharCount(textarea, countId) {
    const count = textarea.value.length;
    const countElement = document.getElementById(countId);

    if (countElement) {
        countElement.textContent = count;

        if (count > 400) {
            countElement.style.color = "#ff6b6b";
        } else {
            countElement.style.color = "#999";
        }
    }
}

// Event listener'lar
document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM yuklandi, event listener'lar qo'shilmoqda");

    // ESC tugmasi bilan modal yopish
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            const modals = document.querySelectorAll(".apply-modal.show");
            modals.forEach((modal) => modal.classList.remove("show"));
        }
    });

    // Modal tashqarisiga bosganda yopish
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("apply-modal")) {
            e.target.classList.remove("show");
        }
    });

    console.log("Event listener'lar qo'shildi");
});

// Debug uchun global funksiya
window.debugApply = function (jobId = 1) {
    console.log("Debug apply ishga tushirildi");
    handleApply(jobId);
};
// Offer Apply
// ==================== OFFER APPLY FUNCTIONS ====================

// ==================== OFFER APPLY FUNCTIONS ====================

// Offer Apply tugmasi bosilganda asosiy funksiya
async function handleOfferApply(offerId) {
    console.log("handleOfferApply chaqirildi, offerId:", offerId); // Debug uchun

    try {
        // CSRF token olish
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute("content");
        if (!csrfToken) {
            console.error("CSRF token topilmadi");
            alert("Xatolik: CSRF token topilmadi");
            return;
        }

        console.log("Request yuborilmoqda..."); // Debug uchun

        // Apply status tekshirish - locale bilan to'g'ri URL
        const locale = window.location.pathname.split("/")[1]; // URL'dan locale olish
        const response = await fetch(
            `/${locale}/offer-applies/index?offer_id=${offerId}`,
            {
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            }
        );

        console.log("Response status:", response.status); // Debug uchun

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        console.log("Response data:", data); // Debug uchun

        // Javobga qarab modallarni ochamiz
        switch (data.status) {
            case "no_jobs":
                console.log("No jobs modal ochilmoqda");
                showNoJobModal();
                break;
            case "single_job":
                console.log("Single job modal ochilmoqda");
                showSingleJobModal();
                // Offer ID va Job ID ni modal ichida saqlaymiz
                document.getElementById("offerIdInput").value = offerId;
                document.getElementById("jobIdInput").value = data.job.id;
                break;
            case "multiple_jobs":
                console.log("Multiple jobs modal ochilmoqda");
                showMultipleJobsModal();
                document.getElementById("offerIdInputMultiple").value = offerId;
                populateJobs(data.jobs);
                break;
            default:
                console.error("Noma'lum status:", data.status);
                alert("Noma'lum xatolik yuz berdi");
        }
    } catch (error) {
        console.error("Error in handleOfferApply:", error);
        alert("Xatolik yuz berdi: " + error.message);
    }
}

// Offer Apply modal ochish funksiyalari
function showNoJobModal() {
    console.log("showNoJobModal chaqirildi");
    const modal = document.getElementById("noJobModal");
    if (modal) {
        modal.classList.add("show");
        console.log("noJobModal show class qo'shildi");
    } else {
        console.error("noJobModal topilmadi");
    }
}

function showSingleJobModal() {
    console.log("showSingleJobModal chaqirildi");
    const modal = document.getElementById("singleJobModal");
    if (modal) {
        modal.classList.add("show");
        console.log("singleJobModal show class qo'shildi");
    } else {
        console.error("singleJobModal topilmadi");
    }
}

function showMultipleJobsModal() {
    console.log("showMultipleJobsModal chaqirildi");
    const modal = document.getElementById("multipleJobsModal");
    if (modal) {
        modal.classList.add("show");
        console.log("multipleJobsModal show class qo'shildi");
    } else {
        console.error("multipleJobsModal topilmadi");
    }
}

// Offer Apply modal yopish funksiyasi
function closeOfferApplyModal(modalId) {
    console.log("closeOfferApplyModal chaqirildi:", modalId);
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove("show");
        console.log(modalId + " modal yopildi");
    } else {
        console.error("Modal topilmadi:", modalId);
    }
}

// Job yaratish funksiyasi
function createJob() {
    console.log("createJob chaqirildi");
    // Bu yerda to'g'ri route qo'ying (locale bilan)
    const locale = window.location.pathname.split("/")[1];
    window.location.href = `/${locale}/jobs/create`;
    closeOfferApplyModal("noJobModal");
}

// Job'larni dropdown'ga to'ldirish
function populateJobs(jobs) {
    console.log("populateJobs chaqirildi:", jobs);
    const select = document.getElementById("jobSelect");
    if (!select) {
        console.error("jobSelect topilmadi");
        return;
    }

    select.innerHTML = '<option value="">Ish e\'lonini tanlang...</option>';

    if (jobs && jobs.length > 0) {
        jobs.forEach((job) => {
            const option = document.createElement("option");
            option.value = job.id;
            option.textContent = `${job.title || "Ish e'loni"} - ${
                job.district?.translated_name || "Hudud ko'rsatilmagan"
            }`;
            select.appendChild(option);
        });
    }
}

// Offer Apply ariza yuborish funksiyasi
async function submitOfferApplication() {
    console.log("submitOfferApplication chaqirildi");

    const activeModal = document.querySelector(".apply-modal.show");
    if (!activeModal) {
        console.error("Faol modal topilmadi");
        return;
    }

    console.log("Faol modal:", activeModal.id);

    const formData = new FormData();
    let offerId, jobId, coverLetter;

    // CSRF token qo'shish
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");
    if (csrfToken) {
        formData.append("_token", csrfToken);
    }

    if (activeModal.id === "singleJobModal") {
        offerId = document.getElementById("offerIdInput").value;
        jobId = document.getElementById("jobIdInput").value;
        coverLetter =
            activeModal.querySelector('textarea[name="cover_letter"]')?.value ||
            "";

        console.log("Single modal data:", { offerId, jobId, coverLetter });
    } else if (activeModal.id === "multipleJobsModal") {
        offerId = document.getElementById("offerIdInputMultiple").value;
        jobId = document.getElementById("jobSelect").value;
        coverLetter =
            activeModal.querySelector('textarea[name="cover_letter"]')?.value ||
            "";

        console.log("Multiple modal data:", { offerId, jobId, coverLetter });

        if (!jobId) {
            alert("Iltimos, ish e'loningizni tanlang!");
            return;
        }
    }

    if (!offerId || !jobId) {
        console.error("OfferId yoki JobId yo'q:", { offerId, jobId });
        alert("Ma'lumotlar to'liq emas!");
        return;
    }

    formData.append("offer_id", offerId);
    formData.append("job_id", jobId);
    formData.append("cover_letter", coverLetter);

    try {
        console.log("Offer Application yuborilmoqda...");

        // Store route'i uchun locale bilan to'g'ri URL
        const locale = window.location.pathname.split("/")[1]; // URL'dan locale olish
        const response = await fetch(`/${locale}/offer-applies/store`, {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                Accept: "application/json",
            },
            body: formData,
        });

        console.log("Submit response status:", response.status);

        const data = await response.json();
        console.log("Submit response data:", data);

        if (data.success) {
            alert(data.message);
            // Modallarni yopish
            document
                .querySelectorAll(".apply-modal")
                .forEach((modal) => modal.classList.remove("show"));
            // Formni tozalash
            if (activeModal.querySelector("textarea")) {
                activeModal.querySelector("textarea").value = "";
            }
            if (activeModal.querySelector("select")) {
                activeModal.querySelector("select").value = "";
            }
        } else {
            alert(data.message || "Xatolik yuz berdi");
        }
    } catch (error) {
        console.error("Submit error:", error);
        alert("Arizani yuborishda xatolik yuz berdi: " + error.message);
    }
}

// Offer Apply Character counter funksiyasi
function updateOfferApplyCharCount(textarea, countId) {
    const count = textarea.value.length;
    const countElement = document.getElementById(countId);

    if (countElement) {
        countElement.textContent = count;

        if (count > 400) {
            countElement.style.color = "#ff6b6b";
        } else {
            countElement.style.color = "#999";
        }
    }
}

// Offer Apply Event listener'lar qo'shish
document.addEventListener("DOMContentLoaded", function () {
    console.log("Offer Apply event listener'lar qo'shilmoqda");

    // ESC tugmasi bilan modal yopish (offer apply modallari uchun)
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            const offerModals = document.querySelectorAll(
                "#noJobModal.show, #singleJobModal.show, #multipleJobsModal.show"
            );
            offerModals.forEach((modal) => modal.classList.remove("show"));
        }
    });

    // Modal tashqarisiga bosganda yopish (offer apply modallari uchun)
    document.addEventListener("click", function (e) {
        if (
            e.target.id === "noJobModal" ||
            e.target.id === "singleJobModal" ||
            e.target.id === "multipleJobsModal"
        ) {
            e.target.classList.remove("show");
        }
    });

    console.log("Offer Apply event listener'lar qo'shildi");
});

// Debug uchun global funksiya
window.debugOfferApply = function (offerId = 1) {
    console.log("Debug offer apply ishga tushirildi");
    handleOfferApply(offerId);
};
// login modal

document.addEventListener("DOMContentLoaded", function () {
    // Login modaldan register modalga o'tish
    const openSignupLink = document.getElementById("open-signup-modal");

    if (openSignupLink) {
        openSignupLink.addEventListener("click", function (e) {
            e.preventDefault();

            // Login modalni yopish
            const loginModal = bootstrap.Modal.getInstance(
                document.getElementById("login")
            );
            if (loginModal) {
                loginModal.hide();
            }

            // Qisqa kutish (login modal yopilishi uchun)
            setTimeout(function () {
                // Register modalni ochish
                const signupModal = new bootstrap.Modal(
                    document.getElementById("signup")
                );
                signupModal.show();
            }, 300);
        });
    }

    // Agar register modalda ham login modalga qaytish tugmasi bo'lsa
    const backToLoginLink = document.getElementById("back-to-login");

    if (backToLoginLink) {
        backToLoginLink.addEventListener("click", function (e) {
            e.preventDefault();

            // Register modalni yopish
            const signupModal = bootstrap.Modal.getInstance(
                document.getElementById("signup")
            );
            if (signupModal) {
                signupModal.hide();
            }

            // Qisqa kutish
            setTimeout(function () {
                // Login modalni ochish
                const loginModal = new bootstrap.Modal(
                    document.getElementById("login")
                );
                loginModal.show();
            }, 300);
        });
    }
});
