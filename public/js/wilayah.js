document.addEventListener("DOMContentLoaded", function () {
    const provinsiSelect = document.querySelector('select[name="provinsi"]');
    const citySelect = document.querySelector('select[name="city"]');
    const kecamatanSelect = document.querySelector('select[name="kecamatan"]');
    const kelurahanSelect = document.querySelector('select[name="kelurahan"]');

    const API_BASE_URL =
        "https://adityabayu1231.github.io/api-wilayah-indonesia/api/";

    // Disable dropdown awalnya
    citySelect.disabled = true;
    kecamatanSelect.disabled = true;
    kelurahanSelect.disabled = true;

    // Fungsi untuk mengisi data ke select options
    function populateSelect(selectElement, data, placeholder) {
        selectElement.innerHTML = `<option value="" disabled selected>${placeholder}</option>`;
        data.forEach((item) => {
            selectElement.innerHTML += `<option value="${item.id}">${item.name}</option>`;
        });
        selectElement.disabled = false;
    }

    // Ambil daftar provinsi
    fetch(`${API_BASE_URL}provinces.json`)
        .then((response) => {
            if (!response.ok) throw new Error("Network response was not ok");
            return response.json();
        })
        .then((data) => {
            populateSelect(provinsiSelect, data, "Select Provinsi");
        })
        .catch((error) => console.error("Error fetching provinces:", error));

    // Ketika provinsi dipilih
    provinsiSelect.addEventListener("change", function () {
        const provinceId = provinsiSelect.value;

        // Reset & Disable dropdown setelahnya
        citySelect.innerHTML =
            '<option value="" disabled selected>Select City</option>';
        kecamatanSelect.innerHTML =
            '<option value="" disabled selected>Select Kecamatan</option>';
        kelurahanSelect.innerHTML =
            '<option value="" disabled selected>Select Kelurahan</option>';
        citySelect.disabled = true;
        kecamatanSelect.disabled = true;
        kelurahanSelect.disabled = true;

        if (provinceId) {
            // Ambil data kabupaten/kota dari API
            fetch(`${API_BASE_URL}regencies/${provinceId}.json`)
                .then((response) => {
                    if (!response.ok)
                        throw new Error("Network response was not ok");
                    return response.json();
                })
                .then((data) => {
                    populateSelect(citySelect, data, "Select City");
                })
                .catch((error) =>
                    console.error("Error fetching cities:", error)
                );
        }
    });

    // Ketika kota dipilih
    citySelect.addEventListener("change", function () {
        const cityId = citySelect.value;

        // Reset & Disable dropdown setelahnya
        kecamatanSelect.innerHTML =
            '<option value="" disabled selected>Select Kecamatan</option>';
        kelurahanSelect.innerHTML =
            '<option value="" disabled selected>Select Kelurahan</option>';
        kecamatanSelect.disabled = true;
        kelurahanSelect.disabled = true;

        if (cityId) {
            // Ambil data kecamatan dari API
            fetch(`${API_BASE_URL}districts/${cityId}.json`)
                .then((response) => {
                    if (!response.ok)
                        throw new Error("Network response was not ok");
                    return response.json();
                })
                .then((data) => {
                    populateSelect(kecamatanSelect, data, "Select Kecamatan");
                })
                .catch((error) =>
                    console.error("Error fetching districts:", error)
                );
        }
    });

    // Ketika kecamatan dipilih
    kecamatanSelect.addEventListener("change", function () {
        const districtId = kecamatanSelect.value;

        // Reset & Disable dropdown setelahnya
        kelurahanSelect.innerHTML =
            '<option value="" disabled selected>Select Kelurahan</option>';
        kelurahanSelect.disabled = true;

        if (districtId) {
            // Ambil data kelurahan dari API
            fetch(`${API_BASE_URL}villages/${districtId}.json`)
                .then((response) => {
                    if (!response.ok)
                        throw new Error("Network response was not ok");
                    return response.json();
                })
                .then((data) => {
                    populateSelect(kelurahanSelect, data, "Select Kelurahan");
                })
                .catch((error) =>
                    console.error("Error fetching villages:", error)
                );
        }
    });
});
