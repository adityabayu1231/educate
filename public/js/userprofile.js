document.addEventListener("DOMContentLoaded", function () {
    const studentDataSection = document.getElementById("userDataSection");
    const parentDataSection = document.getElementById("parentDataSection");

    const switchToUserDataButton = document.getElementById("switchToUserData");
    const switchToParentDataButton =
        document.getElementById("switchToParentData");

    const changeStudentDataButton =
        document.getElementById("changeStudentData");
    const saveStudentDataButton = document.getElementById("saveStudentData");
    const cancelStudentDataButton =
        document.getElementById("cancelStudentData");

    const changeParentDataButton = document.getElementById("changeParentData");
    const saveParentDataButton = document.getElementById("saveParentData");
    const cancelParentDataButton = document.getElementById("cancelParentData");

    // Switch to User Data
    switchToUserDataButton.addEventListener("click", function () {
        studentDataSection.classList.remove("hidden");
        parentDataSection.classList.add("hidden");
        switchToUserDataButton.classList.add("bg-orange-500");
        switchToParentDataButton.classList.remove("bg-orange-500");
    });

    // Switch to Parent Data
    switchToParentDataButton.addEventListener("click", function () {
        parentDataSection.classList.remove("hidden");
        studentDataSection.classList.add("hidden");
        switchToParentDataButton.classList.add("bg-orange-500");
        switchToUserDataButton.classList.remove("bg-orange-500");
    });

    // Change Student Data
    changeStudentDataButton.addEventListener("click", function () {
        toggleEditMode(true);
    });

    // Save Student Data
    saveStudentDataButton.addEventListener("click", function () {
        // Handle the saving process here (e.g., AJAX to send data to the server)
        toggleEditMode(false);
    });

    // Cancel Student Data
    cancelStudentDataButton.addEventListener("click", function () {
        toggleEditMode(false);
    });

    // Change Parent Data
    changeParentDataButton.addEventListener("click", function () {
        toggleEditMode(true, true);
    });

    // Save Parent Data
    saveParentDataButton.addEventListener("click", function () {
        // Handle the saving process for parent data here
        toggleEditMode(false, true);
    });

    // Cancel Parent Data
    cancelParentDataButton.addEventListener("click", function () {
        toggleEditMode(false, true);
    });

    function toggleEditMode(isEditing, isParent = false) {
        const dataSection = isParent ? parentDataSection : studentDataSection;
        const inputs = dataSection.querySelectorAll("input");

        inputs.forEach((input) => {
            input.readOnly = !isEditing;
        });

        if (isEditing) {
            changeStudentDataButton.classList.add("hidden");
            changeParentDataButton.classList.add("hidden");
            saveStudentDataButton.classList.remove("hidden");
            saveParentDataButton.classList.remove("hidden");
            cancelStudentDataButton.classList.remove("hidden");
            cancelParentDataButton.classList.remove("hidden");
        } else {
            changeStudentDataButton.classList.remove("hidden");
            changeParentDataButton.classList.remove("hidden");
            saveStudentDataButton.classList.add("hidden");
            saveParentDataButton.classList.add("hidden");
            cancelStudentDataButton.classList.add("hidden");
            cancelParentDataButton.classList.add("hidden");
        }
    }
});
