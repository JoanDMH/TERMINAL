alert("hello world!");

const app = new (function () {
    this.tbody = document.getElementById("tbody");
    this.id_ruta = document.getElementById("id_ruta");
    this.fecha = document.getElementById("fecha");
    this.hora_sal = document.getElementById("hora_sal");
    this.precio = document.getElementById("precio");
  


    this.listado=()=>{
        fetch("../controllers/listado.ruta.php")
        .then(res => res.json())
        .then((data)=>{
            this.tbody.innerHTML = data;
            data.forEach((item) => {
                this.tbody.innerHTML += `<tr>
                <td>${item.id_ruta}</td>
                <td>${item.fecha}</td>
                <td>${item.hora_sal}</td>
                <td>${item.precio}</td>
                
                <td><a href="javascript:;" class="btn btn-warning btn-sm" onclick="app.editar(${item.id_ruta})">Editar</a></td>
                <td><a href="javascript:;" class="btn btn-danger btn-sm" onclick="app.eliminar(${item.id_ruta})">Eliminar</a></td>
                </tr>`;
            });
        })
        .catch((error)=>console.log(error));
    };

    this.guardar = () => {
        var form = new FormData();
        form.append("fecha", this.fecha ? this.fecha.value : '');
        form.append("hora_sal", this.hora_sal ? this.hora_sal.value : '');
        form.append("precio", this.precio ? this.precio.value : '');
        
        form.append("id_ruta", this.id_ruta ? this.id_ruta.value : '');
    
        if (!this.id_ruta || !this.fecha || !this.hora_sal || !this.precio ) {
            // Al menos uno de los elementos es null, manejar el caso aquí según tus necesidades
            console.error("Al menos uno de los elementos es null");
            return;
        }
    
        if (this.id_ruta.value === "") {
            fetch("../controllers/guardar.ruta.php", {
                method: "POST",
                body: form,
            })
                .then((res) => res.json())
                .then((data) => {
                    alert("success");
                    this.listado();
                    this.limpiar();
                })
                .catch((error) => console.log(error));
        } else {
            fetch("../controllers/actualizar.ruta.php", {
                method: "POST",
                body: form,
            })
                .then((res) => res.json())
                .then((data) => {
                    alert("success update");
                    this.listado();
                    this.limpiar();
                })
                .catch((error) => console.log(error));
        }
    };
    

    this.editar = (id_ruta) =>{
        var form = new FormData();
        form.append("id_ruta", id_ruta);
        fetch("../controllers/editar.ruta.php", {
            method:"POST",
            body:form,
        })
        .then((res)=> res.json())
       .then((data)=>{
        this.id_ruta.value = data.id_ruta;
        this.fecha.value = data.fecha;
        this.hora_sal.value = data.hora_sal;
        this.precio.value = data.precio;
       
       })
       .catch((error)=>console.log(error));
    }
    this.eliminar = (id_ruta) =>{
        var form = new FormData();
        form.append("id_ruta", id_ruta);
        fetch("../controllers/eliminar.ruta.php", {
            method:"POST",
            body:form,
        })
        .then((data)=>res.json())
        .then((data)=>{
            alert("deleted");
            this.listado();
        })
        .catch((error)=>console.log(error));
    }
    this.limpiar=()=> {
        this.id_ruta.value = ""; 
        this.fecha.value = "";
        this.hora_sal.value = "";
        this.precio.value = "";
        
    }
})();
app.listado();