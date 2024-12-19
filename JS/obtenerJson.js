const axios = require('axios');
const fs = require('fs');
const cron = require('node-cron');


async function llamarAPI() {

	try {


		fetch("https://v3.football.api-sports.io/standings?league=265&season=2023", {
			"method": "GET",
			"headers": {
				"x-rapidapi-host": "v3.football.api-sports.io",
				"x-rapidapi-key": "c131b12d7bca0bbfbf9ff09160ef5d4c"
			}
		})

			.then(res => res.json())
			.then(salida => {

				console.log(salida);

				const fecha = new Date();
				const dia = fecha.getDate();



				// Guardar los datos en un archivo JSON en la carpeta raíz
				fs.writeFileSync('datosAPI' + (dia - 1) + '.json', JSON.stringify(salida, null, 2));
				console.log('Archivo JSON guardado correctamente.');
			})
			.catch(err => {
				console.log(err);
			});


	} catch (error) {
		console.error('Error al llamar la API: ', error.message);

	}
}


// Configurar la tarea cron para ejecutarse cada 2 minutos
cron.schedule('*/2 * * * *', async () => {
	// '*/2 * * * *' significa cada 2 minutos
	await llamarAPI();
  });


