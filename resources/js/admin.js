document.addEventListener("DOMContentLoaded", function () {
    const profileLink = document.querySelector(".prof");
    const dropdown = document.getElementById("dropdown-open");

    if (!profileLink || !dropdown) {
        // console.error("Dropdown ya profileLink element nahi mila!");
        return;
    }

    // Toggle dropdown on profile click
    profileLink.addEventListener("click", function (e) {
        e.stopPropagation();
        dropdown.classList.toggle("hidden");
    });

    // Close dropdown if clicked outside
    document.addEventListener("click", function () {
        if (!dropdown.classList.contains("hidden")) {
            dropdown.classList.add("hidden");
        }
    });

    // Prevent dropdown from closing when clicked
    dropdown.addEventListener("click", function (e) {
        e.stopPropagation();
    });
});


document.addEventListener("DOMContentLoaded", function () {
    // Event delegation for all elements with `data-modal-toggle`
    document.addEventListener('click', function (event) {
        const toggleButton = event.target.closest('[data-modal-toggle]');
        if (toggleButton) {
            const modalId = toggleButton.getAttribute('data-modal-toggle');
            const targetModal = document.getElementById(modalId);

            if (targetModal) {
                targetModal.classList.toggle('hidden'); // Toggle the visibility of the modal
            } else {
                console.error(`No modal found with ID: ${modalId}`);
            }
        }
    });

    // Close modal when clicking on the cancel button
    document.addEventListener('click', function (event) {
        const closeModalBtn = event.target.closest('.close-modal');
        if (closeModalBtn) {
            const modalId = closeModalBtn.getAttribute('data-modal-toggle');
            const targetModal = document.getElementById(modalId);

            if (targetModal) {
                targetModal.classList.add('hidden'); // Hide the modal
            } else {
                console.error(`No modal found with ID: ${modalId}`);
            }
        }
    });
});