CREATE TABLE IF NOT EXISTS materias (
	id 			serial NOT NULL PRIMARY KEY,
	nombre		varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS tareas (
	id			serial NOT NULL PRIMARY KEY,
	tiempo_inicio 	timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	tiempo_limite 	timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	nombre		varchar(50) NOT NULL,
	descripcion varchar(500),
	materia_id 	integer REFERENCES materias
);

INSERT INTO materias 	(nombre) VALUES ('Procesos Agiles');
INSERT INTO tareas (nombre, descripcion, materia_id) VALUES ('procesos agiles', 'sprint 1', 1);