 //Variables para registrar paciente
 var nombre, apellido, edad, telefono,
     alergias, tipoSangre, padecimientosPrevios,
     intervencionesPrevias, accion, sexos, sexo,
     formularioRegistro, datosUsuario, formularioCita, id, formularioInicioSesion;

 //Variables para registrar Cita 
 var id, fecha, hora, doctor, datosCita;

 //variables para inicio sesion
 var datosSesion;
 $(function() {
     if (document.getElementById("ubicacion")) {
         var map = L.map('ubicacion').setView([21.138547, -86.83362], 13);

         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
             attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
         }).addTo(map);

         L.marker([21.138547, -86.83362]).addTo(map)
             .bindPopup('Instituto Tecnológico de Cancún')
             .openPopup();
     } else {

     }



 })
 $(function() {
     $(".info-especialidad main h1").lettering();
     asignarEventos();

     function asignarEventos() {
         $(".registroUsuario").submit(eventoRegistrar);
         $("#formularioCita").submit(eventoCita);
         $("#inicioSesion").submit(eventoInicioSesion);
     }

     function eventoInicioSesion(e) {
         e.preventDefault();
         obtenerDatosInicioSesion();
         meterDatosSesionEnFormData();
         iniciarSesion();
     }

     function obtenerDatosInicioSesion() {
         nombre = $("#nombre");
         id = $("#id");
         accion = $("#accion");
         formularioInicioSesion = document.getElementById("inicioSesion");
     }

     function meterDatosSesionEnFormData() {
         datosSesion = new FormData();
         datosSesion.append("nombre", nombre.val());
         datosSesion.append("id", id.val());
         datosSesion.append("accion", accion.val());
     }

     function iniciarSesion() {
         var xhr = new XMLHttpRequest();
         xhr.open("POST", "inc/consultas/consultas.php", true);
         xhr.onload = function() {
             var respuesta = JSON.parse(xhr.responseText);
             console.log(respuesta["respuesta"]);
             if (respuesta["respuesta"] == "bien") {
                 var url = 'http://localhost/hospitalRomero/perfil.php';
                 var form = $('<form action="' + url + '" method="post">' +
                     '<input type="text" name="usuario" value="' + respuesta["resultado"] + '" />' +
                     '</form>');
                 $('body').append(form);
                 form.hide();
                 form.submit();
             } else {
                 notificar("No se encontro el usuario", "mal", formularioInicioSesion);
             }




         }
         xhr.send(datosSesion);
     }

     function eventoCita(e) {
         e.preventDefault();
         obtenerDatosCita();
         meterDatosCitaEnFormData();
         agendarCita();

     }

     function obtenerDatosCita() {
         nombre = $("#nombre");
         apellido = $("#apellido");
         id = $("#id");
         fecha = $("#fecha");
         hora = $("#hora");
         doctor = $("#doctor");
         accion = $("#accion");
         formularioCita = document.getElementById("formularioCita");
     }

     function meterDatosCitaEnFormData() {
         datosCita = new FormData();
         datosCita.append("nombre", nombre.val());
         datosCita.append("apellido", apellido.val());
         datosCita.append("id", id.val());
         datosCita.append("fecha", fecha.val());
         datosCita.append("hora", hora.val());
         datosCita.append("doctor", doctor.val());
         datosCita.append("accion", accion.val());
     }

     function agendarCita() {
         var xhr = new XMLHttpRequest();

         xhr.open("POST", "inc/consultas/consultas.php", true);
         xhr.onload = function() {
             var texto = JSON.parse(xhr.responseText);
             console.log(texto);
             if (texto["respuesta"] == "bien") {
                 notificar("Cita agendada con exito", "bien", formularioCita);
                 formularioCita.reset();
             } else {
                 notificar("Error al agendar cita", "mal", formularioCita);
             }
         }
         xhr.send(datosCita);

     }

     function eventoRegistrar(e) {
         e.preventDefault();
         obtenerDatosRegistro();
         if (faltaNombreOApellido()) {
             notificar("El nombre y apellido es obligatorio", "mal");
         } else {
             meterDatosUsuarioEnFormData();
             registrarUsuario(datosUsuario);
         }
     }

     function obtenerDatosRegistro() {
         nombre = $("#nombre");
         apellido = $("#apellido");
         edad = $("#edad");
         telefono = $("#telefono");
         sexos = document.getElementsByName('sexo');
         sexo = "";
         alergias = $("#alergias");
         tipoSangre = $("#tipoSangre");
         padecimientosPrevios = $("#padecimientosPrevios");
         intervencionesPrevias = $("#intervencionesPrevias");
         accion = $('#accion');
         formularioRegistro = document.getElementById("formulario-registro");
         for (var i = 0, length = sexos.length; i < length; i++) {
             if (sexos[i].checked) {
                 // do whatever you want with the checked radio

                 sexo = sexos[i].value;
                 // only one radio can be logically checked, don't check the rest
                 break;
             }
         }
     }

     function meterDatosUsuarioEnFormData() {
         datosUsuario = new FormData();
         datosUsuario.append("nombre", nombre.val());
         datosUsuario.append("apellido", apellido.val());
         datosUsuario.append("edad", edad.val());
         datosUsuario.append("telefono", telefono.val());
         datosUsuario.append("sexo", sexo);
         datosUsuario.append("alergias", alergias.val());
         datosUsuario.append("tipoSangre", tipoSangre.val());
         datosUsuario.append("intervencionesPrevias", intervencionesPrevias.val());
         datosUsuario.append("padecimientosPrevios", padecimientosPrevios.val());
         datosUsuario.append("accion", accion.val());

         // for (var value of datosUsuario.values()) {
         //     console.log(value);
         // }

         /*Registro en la base de datos*/
     }

     function faltaNombreOApellido() {
         return (nombre.val() == "" || apellido.val() == "");
     }

     function registrarUsuario(datosUsuario) {
         var xhr = new XMLHttpRequest();
         xhr.open("post", 'inc/consultas/consultas.php', true);
         xhr.onload = function() {
             //var texto = JSON.parse(xhr.responseText);
             var texto = JSON.parse(xhr.responseText);
             console.log(texto["resultado"]);
             formularioRegistro.reset();
             console.log(texto["resultado"] == "bien");
             if (texto["resultado"] == "bien") {
                 notificar("Se registro con exito", "bien", formularioRegistro);
                 console.log("holas");
             } else {
                 notificar("Fallo el registro", "mal", formularioRegistro);
             }
         }
         xhr.send(datosUsuario);



     }
 })



 function notificar(texto, tipo, formulario) {
     var notificacion = document.createElement("a");
     notificacion.innerText = texto;
     notificacion.classList.add("notificacion");
     notificacion.classList.add(tipo);
     formulario.appendChild(notificacion)
     setTimeout(() => {
         notificacion.classList.add("visible");
         setTimeout(() => {
             notificacion.classList.remove("visible");
             setTimeout(() => {
                 notificacion.remove();
             }, 1000);

         }, 2000);
     }, 100);
 }