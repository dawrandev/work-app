class ImageUploadManager {
    constructor(config) {
        this.maxImages = config.maxImages || 3;
        this.containerId = config.containerId;
        this.inputId = config.inputId;
        this.previewContainerId = config.previewContainerId || "imagePreview";
        this.statusElementId = config.statusElementId || "imageCountStatus";
        this.uploadAreaId = config.uploadAreaId || "fileUploadArea";
        this.modelType = config.modelType || "default";
        this.existingImagesSelector =
            config.existingImagesSelector || ".existing-images .col-md-3";
        this.deleteImageCallback = config.deleteImageCallback || null;
        this.formId = config.formId || null;
        this.newImageFiles = [];
        this.imagesToDelete = [];
    }

    init() {
        this.imageInput = document.getElementById(this.inputId);
        this.previewContainer = document.getElementById(
            this.previewContainerId
        );
        this.statusElement = document.getElementById(this.statusElementId);
        this.uploadArea = document.getElementById(this.uploadAreaId);
        this.form = this.formId
            ? document.getElementById(this.formId)
            : this.imageInput.closest("form");

        if (
            !this.imageInput ||
            !this.previewContainer ||
            !this.statusElement ||
            !this.uploadArea
        ) {
            console.error("ImageUploadManager: Missing required DOM elements.");
            return;
        }

        this.bindEvents();
        this.updateImageCounts();
    }

    bindEvents() {
        this.imageInput.addEventListener("change", (e) =>
            this.handleImageInput(e)
        );
        if (this.form) {
            this.form.addEventListener("submit", (e) =>
                this.handleFormSubmit(e)
            );
        }
        // Delegate delete for existing images
        document.addEventListener("click", (e) => {
            if (
                e.target.matches(
                    ".image-item .btn-danger, .image-item .remove-btn"
                )
            ) {
                const imageId = e.target
                    .closest("[data-image-id]")
                    ?.getAttribute("data-image-id");
                if (imageId) {
                    this.deleteExistingImage(
                        imageId,
                        e.target.closest(".col-md-3")
                    );
                }
            }
            if (e.target.matches(".image-preview-item .remove-btn")) {
                const index = parseInt(e.target.getAttribute("data-index"));
                if (!isNaN(index)) {
                    this.removeNewImage(index);
                }
            }
        });
    }

    handleImageInput(e) {
        const files = Array.from(e.target.files);
        const currentImages = document.querySelectorAll(
            this.existingImagesSelector
        ).length;
        const totalPossibleImages =
            currentImages + this.newImageFiles.length + files.length;
        if (totalPossibleImages > this.maxImages) {
            const allowedCount =
                this.maxImages - (currentImages + this.newImageFiles.length);
            alert(
                `Maximum ${this.maxImages} images allowed. You can add ${allowedCount} more.`
            );
            if (allowedCount > 0) {
                this.newImageFiles.push(...files.slice(0, allowedCount));
            }
        } else {
            this.newImageFiles.push(...files);
        }
        this.updateImagePreview();
        this.updateImageCounts();
        e.target.value = "";
    }

    updateImagePreview() {
        this.previewContainer.innerHTML = "";
        this.newImageFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const previewItem = document.createElement("div");
                previewItem.className = "image-preview-item";
                previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                    <button type="button" class="remove-btn" data-index="${index}">×</button>
                `;
                this.previewContainer.appendChild(previewItem);
            };
            reader.readAsDataURL(file);
        });
    }

    updateImageCounts() {
        const currentImages = document.querySelectorAll(
            this.existingImagesSelector
        ).length;
        const newImages = this.newImageFiles.length;
        const totalImages = currentImages + newImages;
        if (this.statusElement) {
            this.statusElement.textContent = `${totalImages}/${this.maxImages} images`;
            if (totalImages >= this.maxImages) {
                this.statusElement.classList.add("text-warning");
                this.uploadArea.style.display = "none";
            } else {
                this.statusElement.classList.remove("text-warning");
                this.uploadArea.style.display = "block";
            }
        }
    }

    removeNewImage(index) {
        this.newImageFiles.splice(index, 1);
        this.updateImagePreview();
        this.updateImageCounts();
    }

    deleteExistingImage(imageId, imageContainer) {
        if (!this.imagesToDelete.includes(imageId)) {
            this.imagesToDelete.push(imageId);
        }
        if (imageContainer) {
            imageContainer.style.transition = "opacity 0.3s ease";
            imageContainer.style.opacity = "0";
            setTimeout(() => {
                imageContainer.remove();
                this.updateImageCounts();
            }, 300);
        }
        if (typeof this.deleteImageCallback === "function") {
            this.deleteImageCallback(imageId);
        }
    }

    handleFormSubmit(e) {
        // Add deleted images as hidden inputs
        this.imagesToDelete.forEach((imageId) => {
            const hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "delete_images[]";
            hiddenInput.value = imageId;
            this.form.appendChild(hiddenInput);
        });
        // Update file input with new images
        const dataTransfer = new DataTransfer();
        this.newImageFiles.forEach((file) => {
            dataTransfer.items.add(file);
        });
        this.imageInput.files = dataTransfer.files;
    }
}

window.ImageUploadManager = ImageUploadManager;
