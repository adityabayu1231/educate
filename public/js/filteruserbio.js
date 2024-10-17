let brandId = null;
let programId = null;

function saveBrandId(selectElement) {
    brandId = selectElement.value;
    console.log("Brand ID:", brandId);
}

function saveProgramId(selectElement) {
    programId = selectElement.value;
    console.log("Program ID:", programId);

    // Panggil API untuk mendapatkan subprogram
    fetchSubPrograms();
}

function fetchSubPrograms() {
    fetch(
        `http://educate_to.test/api/subprograms?brand_id=${brandId}&program_id=${programId}`
    )
        .then((response) => response.json())
        .then((data) => {
            populateSubProgramSelect(data);
        })
        .catch((error) => {
            console.error("Error fetching subprograms:", error);
        });
}

function populateSubProgramSelect(subprograms) {
    const subprogramSelect = document.getElementById("subprogram-select");
    subprogramSelect.innerHTML =
        '<option value="" disabled selected>Select Subprogram</option>';

    subprograms.forEach((subprogram) => {
        const option = document.createElement("option");
        option.value = subprogram.id;
        option.textContent = subprogram.name;
        subprogramSelect.appendChild(option);
    });
}
