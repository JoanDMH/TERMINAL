/*const app = new (function () {
  this.tbody = document.getElementById("tbody");
  this.id_pac = document.getElementById("id_pac");
  this.nomb_pac = document.getElementById("nomb_pac");
  this.apel_pac = document.getElementById("apel_pac");
  this.genero = document.getElementById("genero");
  this.fecha_nac_pac = document.getElementById("fecha_nac_pac");
  this.tel_pac = document.getElementById("tel_pac");

  this.listado = () => {
    fetch("../controllers/listado.php")
      .then((res) => res.json())
      .then((data) => {
        this.tbody.innerHTML = "";
        data.forEach((item) => {
          this.tbody.innerHTML += `
            <tr>
              <td>${item.id_pac}</td>
              <td>${item.nomb_pac}</td>
              <td>${item.apel_pac}</td>
              <td>${item.genero}</td>
              <td>${item.fecha_nac_pac}</td>
              <td>${item.tel_pac}</td>
              <td>
                <a href="javascript:;" class="btn btn-warning btn-sm" onclick="app.editar(${item.id_pac})">Editar</a>
                <a href="javascript:;" class="btn btn-danger btn-sm" onclick="app.eliminar(${item.id_pac})">Eliminar</a>
              </td>
            </tr>
          `;
        });
      })
      .catch((error) => console.log(error));
  };

  this.guardar = () => {
    var form = new FormData();
    form.append("id_pac", this.id_pac.value);
    form.append("nomb_pac", this.nomb_pac.value);
    form.append("apel_pac", this.apel_pac.value);
    form.append("genero", this.genero.value);
    form.append("fecha_nac_pac", this.fecha_nac_pac.value);
    form.append("tel_pac", this.tel_pac.value);
  
    if (this.id_pac.value !== "") {
      // Verificar si el paciente ya existe
      fetch("../controllers/existe.php", {
          method: "POST",
          body: form,
      })
      .then((res) => res.json())
      .then((data) => {
          if (data.existe) {
              // Si el paciente existe, actualizar
              fetch("../controllers/actualizar.php", {
                  method: "POST",
                  body: form,
              })
              .then((res) => res.json())
              .then((data) => {
                  alert("Actualizado con éxito");
                  this.listado();
                  this.limpiar();
              })
              .catch((error) => console.log(error));
          } else {
              // Si el paciente no existe,//waza crear
              fetch("../controllers/guardar.php", {
                  method: "POST",
                  body: form,
              })
              .then((res) => res.json())
              .then((data) => {
                  alert("Creado con éxito");
                  this.listado();
                  this.limpiar();
              })
              .catch((error) => console.log(error));
          }
      })
      .catch((error) => console.log(error));
  }
  
  };

  
  this.editar = (id_pac) => {
    var form = new FormData();
    form.append("id_pac", id_pac);
    fetch("../controllers/editar.php", {
      method: "POST",
      body: form,
    })
      .then((res) => res.json())
      .then((data) => {
        this.id_pac.value = data.id_pac;
        this.nomb_pac.value = data.nomb_pac;
        this.apel_pac.value = data.apel_pac;
        this.genero.value = data.genero;
        this.fecha_nac_pac.value = data.fecha_nac_pac;
        this.tel_pac.value = data.tel_pac;
      })
      .catch((error) => console.log(error));
  };
  this.eliminar = (id_pac) => {
    var form = new FormData();
    form.append("id_pac", id_pac);
    fetch("../controllers/eliminar.php", {
      method: "POST",
      body: form,
    })
      .then((res) => res.json())
      .then((data) => {
        alert("Eliminado con exito");
        this.listado();
      })
      .catch((error) => console.log(error));
  };
  this.limpiar = () => {
    this.id_pac.value = "";
    this.nomb_pac.value = "";
    this.apel_pac.value = "";
    this.genero.value = "";
    this.fecha_nac_pac.value = "";
    this.tel_pac.value = "";
  };
})();
app.listado();*/