document.addEventListener("DOMContentLoaded", function() {

    const forms = document.querySelectorAll("form");
    const modal = document.getElementById("modal-password");
    const modalMessage = document.getElementById("modal-message");
    const modalClose = document.querySelector(".modal .close");

    // Función para abrir modal
    function showModal(message) {
        modalMessage.textContent = message;
        modal.style.display = "block";
    }

    // Función para cerrar modal
    function closeModal() {
        modal.style.display = "none";
    }

    modalClose.addEventListener("click", closeModal);
    window.addEventListener("click", function(e) {
        if (e.target === modal) closeModal();
    });

    // Evitar que Enter envíe el formulario en cualquier input
    forms.forEach(form => {
        const inputs = form.querySelectorAll("input, select, textarea");
        inputs.forEach(input => {
            input.addEventListener("keydown", function(e) {
                if (e.key === "Enter") {
                    e.preventDefault();
                    input.blur(); // quita el foco
                }
            });
        });
    });

    // Validación al enviar
    forms.forEach(form => {
        form.addEventListener("submit", function(e) {
            e.preventDefault(); // bloquea envío hasta que todo sea válido

            const passwordInputs = form.querySelectorAll('input[type="password"]');
            let valid = true;
            let message = "";

            // Validación de reglas de cada contraseña
            passwordInputs.forEach(input => {
                const value = input.value;

                if (!/[A-Z]/.test(value)) {
                    message += "- La contraseña debe tener al menos una letra mayúscula.\n";
                    valid = false;
                }
                if (!/[0-9]/.test(value)) {
                    message += "- La contraseña debe tener al menos un número.\n";
                    valid = false;
                }
                if (/[^A-Za-z0-9]/.test(value)) {
                    message += "- La contraseña no debe contener símbolos.\n";
                    valid = false;
                }
            });

            // Verificación de coincidencia (solo si hay dos inputs de contraseña)
            if (passwordInputs.length === 2 && passwordInputs[0].value !== passwordInputs[1].value) {
                message += "- Las contraseñas no coinciden.\n";
                valid = false;
            }

            if (!valid) {
                showModal(message);
                passwordInputs.forEach(input => input.value = ""); // obliga a reingresar
                passwordInputs[0].focus();
            } else {
                form.submit(); // todo correcto, enviar form
            }
        });
    });

});
