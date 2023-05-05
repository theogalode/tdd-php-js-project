document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("create-message-form");
    const subjectInput = document.getElementById("subject");
    const contentInput = document.getElementById("content");
    const errorElement = document.getElementById("error-message");

    form.addEventListener("submit", function (event) {
        let errors = [];

        // Vérifier le sujet
        if (subjectInput.value === "" || subjectInput.value == null) {
            errors.push("Subject is required");
        }

        // Vérifier le contenu
        if (contentInput.value === "" || contentInput.value == null) {
            errors.push("Content is required");
        }

        if (contentInput.value.length > 2048) {
            errors.push("Content should not have more than 2048 characters.");
        }

        // Vérifier le userId
        if (contentInput.value === "" || contentInput.value == null) {
            errors.push("Content is required");
        }

        if (errors.length > 0) {
            event.preventDefault();
            errorElement.innerText = errors.join(", ");
        }
    });
});
