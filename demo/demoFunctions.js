function cambiarHora() {
	var actual = new Date();
	var hr;
	var mn;
	var sc;

	var hora;

	//document.getElementById("mostrarHora").innerHTML(hora);

	setInterval(function(){
		var actual = new Date();
		hr = actual.getHours();
		mn = actual.getMinutes();
		sc = actual.getSeconds();

		if(mn<10){
			mn = "0"+mn;
		}
		if(sc<10){
			sc = "0"+sc;
		}
		if(hr<10){
			hr = "0"+hr;
		}

		hora = hr+":"+mn+":"+sc;
		$("#mostrarHora").html(hora);
	}, 1000);

}

/*<div class="col-md-4">
            <div class="card mb-3">
              <img class="card-img-top" src="../../img/logos/ford.png" width="25%;">
              <div class="card-body">
                <h5 class="card-title">PLATINA</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>

          <a href="#" style="text-decoration: none; color: black;"><div class="col-md-4" data-toggle="modal" data-target=".bd-example-modal-lg">
            <div class="card mb-3">
              <img class="card-img-top" src="../../img/logos/ford.png" width="25%;">
              <div class="card-body">
                <h5 class="card-title">PLATINA</h5>
                <p class="card-text">MARCO ANTONIO DIAZ DIAZ</p>
                <strong><p class="card-text">AFINACION MAYOR Y CAMBIO DE AMORTIGUADORES</p></strong>
                <p class="card-text"><small class="text-muted">FECHA: 2018-08-10 HORA: 10:52</small></p>
              </div>
            </div></a>*/