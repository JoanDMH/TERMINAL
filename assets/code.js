alert("hello world!");

const app = new (function () {
    this.tbody = document.getElementById("tbody");

    this.listado=()=>{
        fetch("../controllers/listado.php")
        .then(res => res.json())
        .then((data)=>{
            this.tbody.innerHTML = data;
            data.forEach((item) => {
                this.tbody.innerHTML += `<tr>
                <td>${item.id_ruta}</td>
                <td>${item.fecha}</td>
                <td>${item.hora_sal}</td>
                <td>${item.precio}</td>
                <td>${item.origen_ciudad}</td>
                <td>${item.destino_ciudad}</td>
                <td><a href="javascript:;" class="btn btn-warning btn-sm" onclick="app.editar(${item.id_ruta})">Editar</a></td>
                <td><a href="javascript:;" class="btn btn-danger btn-sm" onclick="app.eliminar(${item.id_ruta})">Eliminar</a></td>
                </tr>`;
            });
        })
        .catch((error)=>console.log(error));
    }
})();
app.listado();