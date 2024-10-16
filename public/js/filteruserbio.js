// Debugging: Cek nilai JSON yang diterima
console.log("{!! $subprogramsJson !!}");
var subprograms = JSON.parse("{!! $subprogramsJson !!}");

// Mendapatkan elemen select
var subprogramSelect = document.querySelector('select[name="subprogram"]');

// Mengisi select dengan opsi dari subprograms
subprograms.forEach(function (subprogram) {
    var option = document.createElement("option");
    option.value = subprogram.id;
    option.textContent = subprogram.name_sub_program; // Pastikan ini adalah nama field yang tepat
    subprogramSelect.appendChild(option);
});
