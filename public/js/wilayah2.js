document.addEventListener("DOMContentLoaded", function () {
    const provinceSelect = document.querySelector('select[name="province"]');
    const citySelect = document.querySelector('select[name="city"]');
    const districtSelect = document.querySelector('select[name="district"]');
    const villageSelect = document.querySelector('select[name="village"]');

    const API_BASE_URL =
        "https://adityabayu1231.github.io/api-wilayah-indonesia/api/";

    // Disable dropdown awalnya
    citySelect.disabled = true;
    districtSelect.disabled = true;
    villageSelect.disabled = true;

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
            populateSelect(provinceSelect, data, "Select Province");
        })
        .catch((error) => console.error("Error fetching provinces:", error));

    // Ketika provinsi dipilih
    provinceSelect.addEventListener("change", function () {
        const provinceId = provinceSelect.value;

        // Reset & Disable dropdown setelahnya
        citySelect.innerHTML =
            '<option value="" disabled selected>Select City</option>';
        districtSelect.innerHTML =
            '<option value="" disabled selected>Select District</option>';
        villageSelect.innerHTML =
            '<option value="" disabled selected>Select Village</option>';
        citySelect.disabled = true;
        districtSelect.disabled = true;
        villageSelect.disabled = true;

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
        districtSelect.innerHTML =
            '<option value="" disabled selected>Select District</option>';
        villageSelect.innerHTML =
            '<option value="" disabled selected>Select Village</option>';
        districtSelect.disabled = true;
        villageSelect.disabled = true;

        if (cityId) {
            // Ambil data kecamatan dari API
            fetch(`${API_BASE_URL}districts/${cityId}.json`)
                .then((response) => {
                    if (!response.ok)
                        throw new Error("Network response was not ok");
                    return response.json();
                })
                .then((data) => {
                    populateSelect(districtSelect, data, "Select District");
                })
                .catch((error) =>
                    console.error("Error fetching districts:", error)
                );
        }
    });

    // Ketika kecamatan dipilih
    districtSelect.addEventListener("change", function () {
        const districtId = districtSelect.value;

        // Reset & Disable dropdown setelahnya
        villageSelect.innerHTML =
            '<option value="" disabled selected>Select Village</option>';
        villageSelect.disabled = true;

        if (districtId) {
            // Ambil data kelurahan dari API
            fetch(`${API_BASE_URL}villages/${districtId}.json`)
                .then((response) => {
                    if (!response.ok)
                        throw new Error("Network response was not ok");
                    return response.json();
                })
                .then((data) => {
                    populateSelect(villageSelect, data, "Select Village");
                })
                .catch((error) =>
                    console.error("Error fetching villages:", error)
                );
        }
    });
});
