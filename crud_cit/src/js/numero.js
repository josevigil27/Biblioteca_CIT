(function() {
    const telefonoInput = document.querySelector('#telefono');


    if(telefonoInput) {
        telefonoInput.addEventListener('keypress', formatoTelefono)

        function formatoTelefono(input) {
            // Eliminar cualquier carácter que no sea un dígito
            var phoneNumber = input.value.replace(/\D/g, '');

            // Si la longitud del número es mayor que 4, insertar una diagonal después del cuarto dígito
            if (phoneNumber.length > 4) {
                phoneNumber = phoneNumber.substring(0, 4) + '-' + phoneNumber.substring(4);
            }

            // Actualizar el valor del input con el número formateado
            input.value = phoneNumber;
        }
    }

})()