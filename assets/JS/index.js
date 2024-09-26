
document.getElementById("signupbutton").addEventListener("click", function() {
    document.getElementById("loginDiv").style.display = "none"; 
    document.getElementById("signupDiv").style.display = "block"; 
});

document.getElementById("signinbutton").addEventListener("click", function() {
    document.getElementById("signupDiv").style.display = "none"; 
    document.getElementById("loginDiv").style.display = "block";
});

function filterByDate() {
    const filterInput = document.getElementById('dateFilterInput').value.trim().toLowerCase(); // Obtiene el valor del input y lo convierte a minúsculas
    const rows = document.querySelectorAll('#dataBody tr'); // Selecciona todas las filas en el tbody

    rows.forEach(function(row) {
        const rowDate = row.getAttribute('data-date'); // Obtiene la fecha del atributo data-date
        
        // Si el filtro está vacío, muestra todas las filas
        if (filterInput === "") {
            row.style.display = ''; // Mostrar fila
        } else {
            // Verifica si el valor de entrada está en la fecha de la fila
            if (rowDate.includes(filterInput)) {
                row.style.display = ''; // Mostrar fila si incluye el valor
            } else {
                row.style.display = 'none'; // Ocultar fila si no incluye el valor
            }
        }
    });
}
