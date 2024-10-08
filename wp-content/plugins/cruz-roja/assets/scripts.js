const provincias = {
    sierra: ["Azuay", "Bolivar", "Cañar", "Carchi", "Cotopaxi", "Imbabura", "Pichincha", "Tungurahua"],
    costa: ["Esmeraldas", "El Oro", "Guayas", "los Rios", "Manabi", "Santa Elena", "Santo Domingo de los Tsáchilas"],
    amazonia: ["Morona Santiago", "Napo", "Orellana", "Pastaza", "Sucumbios", "Zamora Chinchipe"],
    regioninsular: ["Galápagos - Santa Cruz"],
};

function updateProvincias() {
    const region = document.getElementById("region").value;
    const provinciaSelect = document.getElementById("provincia");

    provinciaSelect.innerHTML = '<option value="">--Selecciona una Provincia--</option>';

    if (region) {
        provincias[region].forEach(function (provincia) {
            let option = document.createElement("option");
            option.value = provincia.toLowerCase();
            option.text = provincia;
            provinciaSelect.add(option);
        });
    }

    document.querySelectorAll(".info").forEach(function (div) {
        div.style.display = "none";
    });
}

function showInfo() {
    
    const region = document.getElementById("region").value;
    const provincia = document.getElementById("provincia").value;
    const infoDiv = document.getElementById(`info-${region}-${provincia}`);

    document.querySelectorAll(".info").forEach(function (div) {
        div.style.display = "none";
    });


    if (infoDiv) {
        infoDiv.style.display = "block";
        
        
    }
}