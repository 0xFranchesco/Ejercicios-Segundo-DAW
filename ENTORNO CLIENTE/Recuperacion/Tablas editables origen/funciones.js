window.addEventListener("load",()=>{

    let url="http://localhost:3000";  // URL base para los datos.

	// document.querySelectorAll('table:nth-of-type(2) > tbody > tr > td:not(:last-child)');  // Obtengo todas las celdas de la segunda tabla menos la última columna (que es la del botón).

    //punteros a todo lo que vamos a usar del html.
    let contenedorTabla = document.getElementById("contenedorTabla");
    let dialog = document.getElementById("dialogo");
    let tablaUsuarios = document.createElement("table");
    let tablaMover = document.getElementsByTagName("table")[0];
    console.log(tablaMover);

    //array vacio para meter los usuarios que me voy a traer.
    let usuarios = [];

    traerUsuarios();

    //funcion para traerme a los usuarios del JSON server, (Ejercicio1)
    async function traerUsuarios() {
        
        let respuesta = await fetch(`${url}/usuarios`);
          if (!respuesta.ok) {
            throw new Error("Error al traer los usuarios");
          }
          usuarios = await respuesta.json();
          //los ordeno por apellido, (Ejercicio1)
          usuarios.sort((a,b) => {
           return a.last_name.localeCompare(b.last_name);
          });
          pintarUsuarios();

    }

    function pintarUsuarios() {

        for (let usuario of usuarios) {
            
            let tdId = document.createElement("td");
            let tdEmail = document.createElement("td");
            let tdNombre = document.createElement("td");
            let tdApellidos = document.createElement("td");
            let tdDni = document.createElement("td");
            let tdEdad = document.createElement("td");
            let tdAvatar = document.createElement("td");
            let tdMover = document.createElement("td");

            let tr = document.createElement("tr");

//-----------------EVENTO QUE MUESTRE ALERT Y NO FUNCIENE AL PULSAR SOBRE BOTON (Ejercicio 6)--------------------------------------
            tr.addEventListener("click", (e) => {
                e.preventDefault();
                let elemento = e.target;
                if (elemento.closest("button")) {
                    return
                }else{
                    alert(`Has seleccionado a ${usuario.first_name} ${usuario.last_name}`);
                }
            });
//-------------------------------------------------------------------------------

            tdId.textContent = `${usuario.id}`;
            tr.appendChild(tdId);

            tdEmail.textContent = `${usuario.email}`;
            tr.appendChild(tdEmail);

            tdNombre.textContent = `${usuario.first_name}`;
            tr.appendChild(tdNombre);

            tdApellidos.textContent = `${usuario.last_name}`;
            tr.appendChild(tdEmail);

            tdDni.textContent = `${usuario.dni}`;
            tr.appendChild(tdDni);

//-------------------------EDAD, (Ejercicio2)--------------------------------------
            let fechaActual = new Date();
            let cumpleaños = new Date(usuario.birthdate);

            let edad = fechaActual - cumpleaños;
            edad = edad / (1000 * 60 * 60 * 24 * 365);
            //redondeo a lo mas cercano
            edad = edad.toFixed(0);
            console.log(edad);

            tdEdad.textContent = `${edad} años`;
            tr.appendChild(tdEdad);
//-------------------------------------------------------------------------------

            tdAvatar.textContent = `${usuario.avatar}`;
            tr.appendChild(tdAvatar);

//-------------------------BOTON DE MOVERLO (Ejercicio 3)--------------------------------------
            let btnMover = document.createElement("button");
            btnMover.textContent = "Moverlo";
            btnMover.classList.add = "boton";
            tdMover.appendChild(btnMover);
            tr.appendChild(tdMover);       
//-------------------------------------------------------------------------------
//-------------------------EVENTO DE MOVERLO-------------------------------------
            tdMover.addEventListener("click", (e) => {
                e.preventDefault(); //(Ejercicio4)
                tdMover.style.display = "none";
                tablaMover.appendChild(tr); //(Ejercicio );
                dialog.show(); //(Ejercicio 4)
                setTimeout(() => {
                    dialog.close(); //(Ejercicio 4)
                },2000);
                //falsa ilusion de que no se borra, le pongo 5 segundicos.
                setTimeout(() => {
                borrarUsuarioMovido(usuario.id); //Borramos al usuario
                },5000);
            });
//-------------------------------------------------------------------------------
            //ESTILOS CON JS DE CSS PARA QUE LA TABLA QUEDE IGUAL
            tablaUsuarios.style.border = "2px solid black";
            tdId.style.borderRight = "1px solid grey";
            tdEmail.style.borderRight = "1px solid grey";
            tdNombre.style.borderRight = "1px solid grey";
            tdApellidos.style.borderRight = "1px solid grey";
            tdDni.style.borderRight = "1px solid grey";
            tdEdad.style.borderRight = "1px solid grey";
            tdAvatar.style.borderRight = "1px solid grey";

            //añadimos todo para que no este colgando en memoria.
            tablaUsuarios.appendChild(tr);
            contenedorTabla.appendChild(tablaUsuarios)

        }

    }

    //QUE NO HAYA MENU CONTEXTUAL (Ejercicio 8)
    document.addEventListener("contextmenu", (e) => {
        e.preventDefault();
    });

    //FUNCION PARA BORRAR EL USUARIO
     function borrarUsuarioMovido(id) {

           fetch(`${url}/usuarios/${id}`,{
                        method:"DELETE"
                    })
                    .then((respuesta) => {
                        if (!respuesta.ok) {
                            throw new Error(`Error HTTP: ${respuesta.status}`)
                        }
                        console.log("RECIBIR GET")
                        return respuesta.json(); 
                    })
                    .then((dato) => {
                        console.log("ELIMINACION DELETE")
                        console.log(dato)
                    })
                    .catch((error) => console.log(error.message))

        };

        //Pa devolverlo luego que me da pena borrarlo.
        /*
        {
      "id": "7",
      "email": "michael.lawson@reqres.in",
      "first_name": "Michael",
      "last_name": "Lawson",
      "dni": 1,
      "birthdate": "1990-05-12",
      "avatar": "https://reqres.in/img/faces/7-image.jpg"
    }
        */

});

