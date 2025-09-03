setInterval(() => {
  fetch("datos_esp32.php")
    .then(res => res.json())
    .then(data => {
      document.getElementById("temp").textContent = data.temperatura;
      document.getElementById("humedad").textContent = data.humedad;
      document.getElementById("ph").textContent = data.ph;
      document.getElementById("nivel-agua").textContent = data.nivel_agua;
    });
}, 2000); // cada 2 segundos
document.getElementById("agregar-cultivo").addEventListener("click", () => {
  document.getElementById("formulario-cultivo").style.display = "block";
});

document.getElementById("guardar-cultivo").addEventListener("click", () => {
  const cultivo = document.getElementById("nuevo-cultivo").value;
  const temp = document.getElementById("param-temp").value;
  const humedad = document.getElementById("param-humedad").value;
  const ph = document.getElementById("param-ph").value;

  if (cultivo === "" || temp === "" || humedad === "" || ph === "") {
    alert("Por favor, complete todos los parámetros");
    return;
  }

  fetch("guardar_cultivo.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ cultivo, temp, humedad, ph })
  })
  .then(res => res.text())
  .then(msg => {
    console.log("Cultivo guardado:", msg);
    const select = document.getElementById("cultivo-select");

    const opciones = select.options;
      for (let i = 0; i < opciones.length; i++) {
        if (opciones[i].value === cultivo) {
          alert("El cultivo ya existe");
          return;
        }
      }
    const option = document.createElement("option");
    option.value = cultivo;
    option.textContent = cultivo;
    select.appendChild(option);
    
    document.getElementById("formulario-cultivo").style.display = "none";
 document.getElementById("mensaje-agradecimiento").style.display = "block";

 document.getElementById("nuevo-cultivo").value = "";
      document.getElementById("param-temp").value = "";
      document.getElementById("param-humedad").value = "";
      document.getElementById("param-ph").value = "";
});
});

document.getElementById("volver").addEventListener("click", () => {
  document.getElementById("mensaje-agradecimiento").style.display = "none";
  document.getElementById("formulario-cultivo").style.display = "block";
});

document.getElementById("cultivo-select").addEventListener("change", () => {
  const cultivo = document.getElementById("cultivo-select").value;
  fetch(`parametros_cultivo.php?cultivo=${cultivo}`)
    .then(res => res.json())
    .then(parametros => {
      // No enviar parámetros al ESP32 automáticamente
    });
});

document.getElementById("enviar-parametros").addEventListener("click", () => {
  const cultivo = document.getElementById("cultivo-select").value;
  fetch(`parametros_cultivo.php?cultivo=${cultivo}`)
    .then(res => res.json())
    .then(parametros => {
      fetch("enviar_parametros.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(parametros)
      });
    });
});
