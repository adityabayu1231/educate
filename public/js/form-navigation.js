let currentStep = 1;
const stepCount = 5;
const progressBar = document.getElementById("progress-bar");
const stepIndicators = [
    document.getElementById("step1"),
    document.getElementById("step2"),
    document.getElementById("step3"),
    document.getElementById("step4"),
    document.getElementById("step5"),
];

function updateProgress() {
    const progressPercentage = ((currentStep - 1) / (stepCount - 1)) * 100;
    progressBar.style.width = `${progressPercentage}%`;

    stepIndicators.forEach((step, index) => {
        if (index < currentStep) {
            step.classList.add("bg-blue-500", "text-white");
            step.classList.remove("text-gray-500", "bg-white");
        } else {
            step.classList.add("text-gray-500", "bg-white");
            step.classList.remove("bg-blue-500", "text-white");
        }
    });

    // Show/Hide form steps
    document.querySelectorAll('[id^="form-step-"]').forEach((step) => {
        if (step.id === `form-step-${currentStep}`) {
            step.classList.remove("hidden");
        } else {
            step.classList.add("hidden");
        }
    });

    // Update buttons
    document
        .getElementById("prevBtn")
        .classList.toggle("hidden", currentStep === 1);
    const nextBtn = document.getElementById("nextBtn");
    if (currentStep === stepCount) {
        nextBtn.classList.add("hidden");
    } else {
        nextBtn.classList.remove("hidden");
        nextBtn.textContent = "Next";
    }
}

function selectBrand(label) {
    // Remove selected class from all brand select boxes
    document.querySelectorAll(".brand-select-box").forEach((box) => {
        box.classList.remove("bg-blue-500", "text-white");
        box.classList.add("text-gray-500", "bg-white");
    });

    // Add selected class to the clicked brand box
    label.classList.add("bg-blue-500", "text-white");
    label.classList.remove("text-gray-500", "bg-white");
}

function selectProgram(label) {
    // Remove selected class from all program select boxes
    document.querySelectorAll(".program-select-box").forEach((box) => {
        box.classList.remove("bg-blue-500", "text-white");
        box.classList.add("text-gray-500", "bg-white");
    });

    // Add selected class to the clicked program box
    label.classList.add("bg-blue-500", "text-white");
    label.classList.remove("text-gray-500", "bg-white");
}

function validateFields() {
    const requiredFields = document.querySelectorAll(".required-field");
    const allFilled = Array.from(requiredFields).every((field) => {
        if (field.type === "radio") {
            return (
                document.querySelector(
                    `input[name="${field.name}"]:checked`
                ) !== null
            );
        } else {
            return field.value.trim() !== "";
        }
    });

    if (!allFilled) {
        alert("Harap isi semua kolom yang diperlukan sebelum melanjutkan.");
    }

    return allFilled;
}

function validateStep4() {
    const requiredField = document.querySelectorAll(".required-form");
    const allFilleds = Array.from(requiredField).every((field) => {
        return field.value.trim() !== "";
    });

    if (!allFilleds) {
        alert("Harap isi semua kolom yang diperlukan sebelum melanjutkan.");
    }

    return allFilleds;
}

document.getElementById("nextBtn").addEventListener("click", () => {
    const selectedBrand = document.querySelector(
        'input[name="brand_id"]:checked'
    );
    const selectedProgram = document.querySelector(
        'input[name="program_id"]:checked'
    );

    // Validation for step 1 and step 2
    if (currentStep === 1 && !selectedBrand) {
        alert("Silakan pilih Brand sebelum melanjutkan.");
        return;
    }

    if (currentStep === 2 && !selectedProgram) {
        alert("Silakan pilih program sebelum melanjutkan.");
        return;
    }

    // Validation for step 3
    if (currentStep === 3 && !validateFields()) {
        return; // Stop if not all fields are filled
    }

    // Validation for step 4
    if (currentStep === 4 && !validateStep4()) {
        return; // Stop if not all fields in step 4 are filled
    }

    if (currentStep < stepCount) {
        currentStep++;
        updateProgress();
    }
});

document.getElementById("prevBtn").addEventListener("click", () => {
    if (currentStep > 1) {
        currentStep--;
        updateProgress();
    }
});

// Keyboard navigation
document.addEventListener("keydown", (event) => {
    if (event.key === "ArrowRight") {
        const selectedBrand = document.querySelector(
            'input[name="brand_id"]:checked'
        );
        const selectedProgram = document.querySelector(
            'input[name="program_id"]:checked'
        );

        // Check for validations before proceeding
        if (currentStep === 1 && !selectedBrand) {
            alert("Please select a brand before proceeding.");
            event.preventDefault();
        } else if (currentStep === 2 && !selectedProgram) {
            alert("Please select a program before proceeding.");
            event.preventDefault();
        } else if (currentStep === 3 && !validateFields()) {
            event.preventDefault();
        } else if (currentStep < stepCount) {
            currentStep++;
            updateProgress();
        }
    } else if (event.key === "ArrowLeft") {
        if (currentStep > 1) {
            currentStep--;
            updateProgress();
        }
    } else if (event.key === "Enter" && currentStep === stepCount) {
        document.getElementById("nextBtn").click();
    }
});

// Fungsi konfirmasi sebelum pengiriman
function confirmGoToDashboard() {
    return confirm("Apakah Anda yakin telah mengisi semua data dengan benar?");
}

// Handle Go to Dashboard button confirmation
document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("goToDashboardBtn")
        .addEventListener("click", function (event) {
            event.preventDefault(); // Mencegah form dikirim langsung
            if (confirm("Apakah Anda yakin ingin mengirim data?")) {
                document.getElementById("multi-step-form").submit(); // Kirim form jika user mengkonfirmasi
            }
        });
});

// Initialize
updateProgress();
