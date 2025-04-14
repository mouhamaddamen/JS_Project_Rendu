document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const inputs = form.querySelectorAll("input[required]");
    const submitButton = form.querySelector("input[type='submit']");
    const passwordInput = document.getElementById("password");

    // Règles de validation pour le mot de passe
    const rules = {
        uppercase: /[A-Z]/,
        lowercase: /[a-z]/,
        number: /\d/,
        special: /[@$!%*?&]/,
        length: /.{8,}/
    };

    function checkFields() {
        let allValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                allValid = false;
            }
        });

        submitButton.disabled = !allValid;
        submitButton.classList.toggle("disabled", !allValid);
    }

    // Écouteur sur le champ mot de passe pour activer les règles
    passwordInput.addEventListener("input", () => {
        const value = passwordInput.value;

        Object.entries(rules).forEach(([key, regex]) => {
            const condition = document.getElementById(key);
            if (condition) {
                if (regex.test(value)) {
                    condition.classList.add("valid");
                } else {
                    condition.classList.remove("valid");
                }
            }
        });

        checkFields(); // pour réactiver ou non le bouton
    });

    // Vérification initiale
    checkFields();

    // Écouteurs sur tous les inputs
    inputs.forEach(input => {
        input.addEventListener("input", checkFields);
    });
});