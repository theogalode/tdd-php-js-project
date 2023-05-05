const jsdom = require("jsdom");
const { JSDOM } = jsdom;

// Créer un DOM simulé pour les tests
const dom = new JSDOM(`
<!DOCTYPE html>
<html>
<body>
    <form id="create-message-form">
        <input type="text" id="subject">
        <textarea id="content"></textarea>
        <input type="text" id="userId">
    </form>
    <p id="error-message"></p>
</body>
</html>
`);

// Get the window object out of the dom
const { window } = dom;

// Get the document out of the window
const { document } = window;

// Set the globals in Node.js to match the ones in the browser
global.window = window;
global.document = document;

// Now we can require our script
require("../src/views/js/validation");

test("form should not submit when title is empty", () => {
    const form = document.getElementById("create-message-form");
    const subjectInput = document.getElementById("subject");
    const contentInput = document.getElementById("content");
    const userIdInput = document.getElementById("userId");
    const errorElement = document.getElementById("error-message");

    // Simuler un événement de soumission du formulaire
    form.dispatchEvent(new window.Event("submit"));

    // Vérifier que le message d'erreur a été défini
    expect(errorElement.textContent).toBe(
        "Title is required, Content is required"
    );

    // Remplir le champ de contenu
    contentInput.value = "Some content";

    // Réinitialiser le message d'erreur
    errorElement.textContent = "";

    // Simuler un nouvel événement de soumission du formulaire
    form.dispatchEvent(new window.Event("submit"));

    // Vérifier que le message d'erreur a été défini
    expect(errorElement.textContent).toBe("Title is required");

    // Remplir le champ du titre
    subjectInput.value = "Some title";

    // Remplir le champ du titre
    userIdInput.value = "1";

    // Réinitialiser le message d'erreur
    errorElement.textContent = "";

    // Simuler un nouvel événement de soumission du formulaire
    form.dispatchEvent(new window.Event("submit"));

    // Vérifier que le message d'erreur est vide
    expect(errorElement.textContent).toBe("");
});
