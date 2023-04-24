<?php
//Crear una clase conexion
class Conexion{
	//atributos
	private $usuario="root";
	private $password="";
	private $servidor="localhost";
	private $base="universidad";

	//métodos
	public function conectar(){
		//Código a evaluar para errores que pueda existir try catch
		try{
			//conexion usando PDO
			$con=new PDO("mysql:host=$this->servidor;dbname=$this->base;",$this->usuario,$this->password);
			$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $con;
		}catch(Exception $e){
			echo "Se encontro un error: ".$e->getMessage();
		}
	}

	//métodos para listar Departamento
	public function DepartamentoList(){
		$arr_filas=null;
		$cn=$this->conectar();
		//$sql="select * from departamento";
		$sql="call CursoList()";
		$rs=$cn->prepare($sql); //conexion a la base de datos
		$rs->execute();

		//Encabezado de la tabla   //esto es una clase
		echo "<table class='table table-hover table-bordered'>";
		echo "<tr bgcolor=#009C8C align=center>";
		echo "<th style='color:white;'>Código</th><th style='color:white;'>Curso</th></tr>";

		$i=1; //contador
		while ($arr_filas=$rs->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr align=center>".
				 "<td>".$arr_filas["id"]."</td>".
				 "<td>".$arr_filas["nombre"]."</td>".
				 "</tr>";
			$i++;
		}
		echo "</table>";
		$cn=null;
	}

	//métodos para listar Persona
	public function PersonaList(){
		$arr_filas=null;
		$cn=$this->conectar();
		//$sql="select * from persona";
		$sql="call PersonaList()";
		$rs=$cn->prepare($sql); //conexion a la base de datos
		$rs->execute();

		//Encabezado de la tabla   //esto es una clase
		echo "<table class='table table-hover table-bordered'>";
		echo "<tr bgcolor=#009C8C align=center>";
		echo "<th style='color:white;'>ID</th><th style='color:white;'>Código</th><th style='color:white;'>Nombre</th><th style='color:white;'>Apellido Paterno</th><th style='color:white;'>Apellido Materno</th><th style='color:white;'>Ciudad</th><th style='color:white;'>Dirección</th><th style='color:white;'>Teléfono</th><th style='color:white;'>Fecha de Nacimiento</th><th style='color:white;'>Sexo</th><th style='color:white;'>Tipo</th></tr>";

		$i=1; //contador
		while ($arr_filas=$rs->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr align=center>".
				 "<td>".$arr_filas["id"]."</td>".
				 "<td>".$arr_filas["nif"]."</td>".
				 "<td>".$arr_filas["nombre"]."</td>".
				 "<td>".$arr_filas["apellido1"]."</td>".
				 "<td>".$arr_filas["apellido2"]."</td>".
				 "<td>".$arr_filas["ciudad"]."</td>".
				 "<td>".$arr_filas["direccion"]."</td>".
				 "<td>".$arr_filas["telefono"]."</td>".
				 "<td>".$arr_filas["fecha_nacimiento"]."</td>".
				 "<td>".$arr_filas["sexo"]."</td>".
				 "<td>".$arr_filas["tipo"]."</td>".
				 "</tr>";
			$i++;
		}
		echo "</table>";
		$cn=null;
	}

	//métodos para listar Docente
	public function DocenteList(){
		$arr_filas=null;
		$cn=$this->conectar();
		//$sql="select * from profesor";
		$sql="call ProfesorList()";
		$rs=$cn->prepare($sql); //conexion a la base de datos
		$rs->execute();

		//Encabezado de la tabla   //esto es una clase
		echo "<table class='table table-hover table-bordered'>";
		echo "<tr bgcolor=#009C8C align=center>";
		echo "<th style='color:white;'>ID de profesor</th><th style='color:white;'>Código de Curso</th></tr>";

		$i=1; //contador
		while ($arr_filas=$rs->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr align=center>".
				 "<td>".$arr_filas["id_profesor"]."</td>".
				 "<td>".$arr_filas["id_departamento"]."</td>".
				 "</tr>";
			$i++;
		}
		echo "</table>";
		$cn=null;
	}

	//método para listar grados
	public function GradoList(){
		$arr_filas=null;
		$cn=$this->conectar();
		//$sql="select * from grado";
		$sql="call GradoList()";
		$rs=$cn->prepare($sql); //conexion a la base de datos
		$rs->execute();

		//Encabezado de la tabla   //esto es una clase
		echo "<table class='table table-hover table-bordered'>";
		echo "<tr bgcolor=#009C8C align=center>";
		echo "<th style='color:white;'>ID</th><th style='color:white;'>Nombre</th></tr>";

		$i=1; //contador
		while ($arr_filas=$rs->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr align=center>".
				 "<td>".$arr_filas["id"]."</td>".
				 "<td>".$arr_filas["nombre"]."</td>".
				 "</tr>";
			$i++;
		}
		echo "</table>";
		$cn=null;
	}

	//método para listar asignaturas
	public function AsignaturaList(){
		$arr_filas=null;
		$cn=$this->conectar();
		//$sql="select * from asignatura";
		$sql="call AsignaturaList()";
		$rs=$cn->prepare($sql); //conexion a la base de datos
		$rs->execute();

		//Encabezado de la tabla   //esto es una clase
		echo "<table class='table table-hover table-bordered'>";
		echo "<tr bgcolor=#009C8C align=center>";
		echo "<th style='color:white;'>ID</th><th style='color:white;'>Nombre</th><th style='color:white;'>Créditos</th><th style='color:white;'>Tipos</th><th style='color:white;'>Curso</th><th style='color:white;'>Cuatrimestre</th><th style='color:white;'>ID de profesor</th><th style='color:white;'>ID de asignatura</th></tr>";

		$i=1; //contador
		while ($arr_filas=$rs->fetch(PDO::FETCH_ASSOC)) {
			echo"<tr align=center>".
				 "<td>".$arr_filas["id"]."</td>".
				 "<td>".$arr_filas["nombre"]."</td>".
				 "<td>".$arr_filas["creditos"]."</td>".
				 "<td>".$arr_filas["tipo"]."</td>".
				 "<td>".$arr_filas["curso"]."</td>".
				 "<td>".$arr_filas["cuatrimestre"]."</td>".
				 "<td>".$arr_filas["id_profesor"]."</td>".
				 "<td>".$arr_filas["id_grado"]."</td>".
				 "</tr>";
			$i++;
		}
		echo "</table>";
		$cn=null;
	}

		//método para listar el año escolar
	public function Curso_escolarList(){
		$arr_filas=null;
		$cn=$this->conectar();
		//$sql="select * from curso_escolar";
		$sql="call CursoescolarList()";
		$rs=$cn->prepare($sql); //conexion a la base de datos
		$rs->execute();

		//Encabezado de la tabla   //esto es una clase
		echo "<table class='table table-hover table-bordered'>";
		echo "<tr bgcolor=#009C8C align=center>";
		echo "<th style='color:white;'>ID</th><th style='color:white;'>Inicio del año</th><th style='color:white;'>Fin del año</th></tr>";

		$i=1; //contador
		while ($arr_filas=$rs->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr align=center>".
				 "<td>".$arr_filas["id"]."</td>".
				 "<td>".$arr_filas["anyo_inicio"]."</td>".
				 "<td>".$arr_filas["anyo_fin"]."</td>".
				 "</tr>";
			$i++;
		}
		echo "</table>";
		$cn=null;
	}

			//método para listar el año escolar
	public function MatriculaList(){
		$arr_filas=null;
		$cn=$this->conectar();
		//$sql="select * from alumno_se_matricula_asignatura";
		$sql="call MatriculaList()";
		$rs=$cn->prepare($sql); //conexion a la base de datos
		$rs->execute();

		//Encabezado de la tabla   //esto es una clase
		echo "<table class='table table-hover table-bordered'>";
		echo "<tr bgcolor=#009C8C align=center>";
		echo "<th style='color:white;'>ID de alumno</th><th style='color:white;'>ID de la asignatura</th><th style='color:white;'>ID del curso escolar</th></tr>";

		$i=1; //contador
		while ($arr_filas=$rs->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr align=center>".
				 "<td>".$arr_filas["id_alumno"]."</td>".
				 "<td>".$arr_filas["id_asignatura"]."</td>".
				 "<td>".$arr_filas["id_curso_escolar"]."</td>".
				 "</tr>";
			$i++;
		}
		echo "</table>";
		$cn=null;
	}
}
?>