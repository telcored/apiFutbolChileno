
// Aqui comienza la hoja 2 del codigo.

let datosJason;
const fecha = new Date();
const dia = fecha.getDate();

fetch('/llamarApi/datosAPI'+(dia-1)+'.json')
    .then(res => res.json())
    .then((salida) => {
        datosJason = salida;
     


        //Obtener fecha del json
        const fecha = datosJason.response[0].league.standings[0][0].update;
        const fechaOriginal = new Date(fecha);
        const dia = String(fechaOriginal.getDate() + 1);
        const mes = String(fechaOriginal.getMonth() + 1);
        const anio = String(fechaOriginal.getFullYear());

        const fechaFormateada = `${dia}/${mes}/${anio}`;
        
    
        console.log(fechaFormateada);
        
        const elementoFecha = document.getElementById("fecha")

        elementoFecha.textContent = `Tabla de Posiciones Nacional: ${fechaFormateada}`

        



        //Obtener arreglo principal
        const ranking = datosJason.response[0].league.standings[0];
       


        //Obtener posicion en ranking de cada equipo
        const elementoPosicion = document.getElementById("posicion");

        for (let objeto of ranking) {
            elementoPosicion.innerHTML += '<p>' + objeto.rank + '</p>';
        }



        //Obtener logo de cada equipo
        const elementoLogo = document.getElementById("logo");

        for (let objeto of ranking) {

            let elementoParrafo = document.createElement("p");

            let elementoImagen = document.createElement("img");
            elementoImagen.setAttribute('src', objeto.team.logo);

            elementoParrafo.appendChild(elementoImagen);
            
            elementoLogo.appendChild(elementoParrafo);
        }






        //Obtener nombre de cada club
        const elementoNombre = document.getElementById("club");

        for (let objeto of ranking) {
            elementoNombre.innerHTML += '<p>' + objeto.team.name + '</p>';
        }



        //Puntos de cada equipos

        const elementoPuntos = document.getElementById("puntos");

        for (let objeto of ranking) {
            elementoPuntos.innerHTML += '<p>' + objeto.points + '</p>';
        }



        //Partidos jugados

        const elementoJugados = document.getElementById("jugados");
        for (let objeto of ranking) {
            elementoJugados.innerHTML += '<p>' + objeto.all.played + '</p>';
        }


        //Partidos ganados

        const elementoGanados = document.getElementById("ganados");
        for (let objeto of ranking) {
            elementoGanados.innerHTML += '<p>' + objeto.all.win + '</p>';
        }


        //Partidos empatados

        const elementoEmpatados = document.getElementById("empatados");
        for (let objeto of ranking) {
            elementoEmpatados.innerHTML += '<p>' + objeto.all.draw + '</p>';
        }

        //Partidos Perdidos

        const elementoPerdidos = document.getElementById("perdidos");
        for (let objeto of ranking) {
            elementoPerdidos.innerHTML += '<p>' + objeto.all.lose + '</p>';
        }


        //Gol a favor

        const elementoFavor = document.getElementById("favor");
        for (let objeto of ranking) {
            elementoFavor.innerHTML += '<p>' + objeto.all.goals.for + '</p>';
        }


        //Gol en contra

        const elementoContra = document.getElementById("contra");
        for (let objeto of ranking) {
            elementoContra.innerHTML += '<p>' + objeto.all.goals.against + '</p>';
        }



        //Diferencia de goles

        const elementoDiferencia = document.getElementById("diferencia");
        for (let objeto of ranking) {
            elementoDiferencia.innerHTML += '<p>' + (objeto.all.goals.for - objeto.all.goals.against) + '</p>';
        }

     })





     
