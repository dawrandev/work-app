document.addEventListener("DOMContentLoaded", function () {
    const imageManager = new ImageUploadManager({
        maxImages: 3,
        containerId: "jobImageContainer",
        inputId: "imageInput",
        previewContainerId: "imagePreview",
        statusElementId: "imageCountStatus",
        uploadAreaId: "fileUploadArea",
        modelType: "job",
        existingImagesSelector: ".existing-images .col-md-3",
        formId: "jobEditForm",
        deleteImageCallback: function (imageId) {
            console.log("Job image marked for deletion:", imageId);
        },
    });
    imageManager.init();

    // Job-specific form handling
    const form = document.getElementById("jobEditForm");
    form.addEventListener("submit", function (e) {
        console.log("=== JOB FORM SUBMISSION ===");
        // ... existing job logic (e.g., map, Livewire, etc.)
    });
    // ... integrate with map and Livewire as needed
});
