<?php include "../template/header_paginas.php";
?>
		<nav class="nav bg-dark" style="font-family: 'Poppins', sans-serif; justify-content: center; margin-top:20px;">
			<a class="nav-link active" href="../index.php" style="color:white;">Inicio</a>
            <a class="nav-link active" href="cursos.php" style="color:white;">Carreras</a>
            <a class="nav-link active" href="persona.php" style="color:white;">Personas</a>
            <a class="nav-link active" href="docente.php" style="color:white;">Docente</a>
            <a class="nav-link active" href="grado.php" style="color:white;">Grado</a>
            <a class="nav-link active" href="asignatura.php" style="color:white;">Asignatura</a>
            <a class="nav-link active" href="añoescolar.php" style="color:white;">Año Escolar</a>
            <a class="nav-link active" href="matricula.php" style="color:white;">Matricula</a>
		</nav>
		<h1 style="color:black; font-family: 'Maven Pro', sans-serif; text-align: center; margin-top:20px;">Lista de Personas</h1>
		<section style="font-family: 'Poppins', sans-serif; margin-top:20px;">
			<?php
				include "../modelo/conexion.php";
				$cn=new Conexion();
				$cn->PersonaList();
			?>
		</section>
	</div>
</body>
</html>