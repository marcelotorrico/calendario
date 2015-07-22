<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de tareas</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">

	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/datepicker.css">

	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/bootstrap.js"></script>
	<script src="../../js/bootstrap-datepicker.js"></script>
	
    <link rel="stylesheet" href="../../css/jquery1-10.css" />
    <script src="../../dist/jquery-datepicker.js"></script>
    <script src="jquery.ui.datepicker-es.js"></script>
    <script type="text/javascript" src="../../js/validacionFechas.js"></script>
        
</head>

<body>
	<div class="container">
		<h1> Registro de una nueva tarea</h1>
		<form method="post" action="/tareas/nueva.php">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label class="sr-only" for="date">Ingrese fecha de inicio</label>
						<input class="datepicker" type="text" name="fechaInicioE" id="fechaInicioE" placeholder="Fecha de Inicio" readonly="readonly">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label class="sr-only" for="date">Ingrese fecha de entrega limite</label>
						<input class="datepicker" type="text" name="fechaFinalE" id="fechaFinalE" placeholder="Fecha Limite" readonly="readonly">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<div class="clearfix">
							<div class="input-group clockpicker pull-center" data-align="top" data-autoclose="true">
								<input type="text" class="form-control" name="horaIni" id="horaIni" placeholder="Ingrese la hora de entrega">
								<span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-time"></span>
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<div class="clearfix">
							<div class="input-group clockpicker pull-center" data-align="top" data-autoclose="true">
								<input type="text" class="form-control" name="horaFin" id ="horaFin" placeholder="Ingrese la hora limite de entrega">
								<span class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
								</span>
							</div>
						</div>

					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-md-4">
					<div class="form-group">
						<label class="sr-only" for="name" class=" col-lg-2 control-label">Nombre</label>
						<input type="tex" class="form-control" id="name" placeholder="Nombre de la tarea", name = "name">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label  for="name" class=" col-lg-2 control-label">materia</label>
						<input type="tex" class="form-control" id="materia" name="materia" placeholder="Materia">
					</div>
				</div>
			</div>


			<div class="form-group">
				<textarea class="form-control" rows="3" placeholder="Descripcion " name = "descripcion"></textarea>
			</div>
			<div class="form-group">

				<button type="submit" class="btn btn-primary">Enviar</button>

			</div>
		</form>
	</div>







	<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../dist/bootstrap-clockpicker.min.js"></script>
	<script type="text/javascript">
		$('.clockpicker').clockpicker()
			.find('input').change(function() {
				console.log(this.value);
			});
		var input = $('#single-input').clockpicker({
			placement: 'bottom',
			align: 'left',
			autoclose: true,
			'default': 'now'
		});

		$('.clockpicker-with-callbacks').clockpicker({
				donetext: 'Done',
				init: function() {
					console.log("colorpicker initiated");
				},
				beforeShow: function() {
					console.log("before show");
				},
				afterShow: function() {
					console.log("after show");
				},
				beforeHide: function() {
					console.log("before hide");
				},
				afterHide: function() {
					console.log("after hide");
				},
				beforeHourSelect: function() {
					console.log("before hour selected");
				},
				afterHourSelect: function() {
					console.log("after hour selected");
				},
				beforeDone: function() {
					console.log("before done");
				},
				afterDone: function() {
					console.log("after done");
				}                   
			})
			.find('input').change(function() {
				console.log(this.value);
			});

		// Manually toggle to the minutes view
		$('#check-minutes').click(function(e) {
			// Have to stop propagation here
			e.stopPropagation();
			input.clockpicker('show')
				.clockpicker('toggleView', 'minutes');
		});
		if (/mobile/i.test(navigator.userAgent)) {
			$('input').prop('readOnly', true);
		}
	</script>
	<script type="text/javascript" src="../../assets/js/highlight.min.js"></script>




</body>

</html>