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

let selectedBrandId = null; // Untuk menyimpan brand_id
let selectedProgramId = null; // Untuk menyimpan program_id

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
    // Menyimpan brand_id yang dipilih
    selectedBrandId = label.querySelector('input[name="brand_id"]').value;

    // Call fetchSubprograms to get subprograms based on selected brand
    fetchSubprograms();

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
    // Menyimpan program_id yang dipilih
    selectedProgramId = label.querySelector('input[name="program_id"]').value;

    // Call fetchSubprograms to get subprograms based on selected brand and program
    fetchSubprograms();

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

// Fetch subprograms from API
async function fetchSubprograms() {
    // Ensure brand_id and program_id are selected
    if (!selectedBrandId || !selectedProgramId) {
        return; // Do nothing if brand_id or program_id are not selected
    }

    try {
        // Fetch subprograms based on brand_id and program_id using the new endpoint
        const response = await fetch(
            `http://educate_to.test/api/subprograms/search?brand_id=${selectedBrandId}&program_id=${selectedProgramId}`
        );

        // Check if response status is not 200
        if (!response.ok) {
            console.error("Failed to fetch subprograms:", response.status);
            return;
        }

        const subprograms = await response.json();

        // Log the fetched subprograms
        console.log("Fetched subprograms:", subprograms); // Console log data from API

        // Log status 200 if successful
        console.log("Successfully fetched subprograms:", response.status);

        // Get the select element
        const selectElement = document.getElementById("subprogram-select");

        // Clear any existing options (except the default one)
        selectElement.innerHTML =
            '<option value="" disabled selected>Select Subprogram</option>';

        // Check if any subprograms were found
        if (subprograms.length === 0) {
            console.error(
                "No subprograms found for the selected Brand and Program."
            );
            alert("Tidak ada subprogram yang ditemukan untuk pilihan Anda.");
            return;
        }

        // Loop through the fetched subprograms and create option elements
        subprograms.forEach((subprogram) => {
            const option = document.createElement("option");
            option.value = subprogram.id;
            option.textContent = subprogram.name_sub_program;
            selectElement.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching subprograms:", error);
    }
}

// Initial call to populate the select box
// Note: This will only execute when the selectedBrandId and selectedProgramId are set
