<?php 
session_start();
/**
 * 
 */
class ClassGeneral
{
  function Conexion()
  {
        require "Config.php";
        $variable = mysqli_connect($host,$username,$password,$database);
        if (mysqli_connect_errno())
        {echo "Failed to connect to MySQL: " . mysqli_connect_error();}
        return $variable;
        //$con = $this->Conexion();
  }

  function Query($query)
  {
        $con = $this->Conexion();
        $array = array();
        $result = mysqli_query($con,$query);
        while ($row = mysqli_fetch_assoc ($result)) {
           array_push($array,$row);
        }
        return $array;
  }

  function Update($query)
  {
        $con = $this->Conexion();
        mysqli_query($con,$query);
  }

  function Insert($query)
  {
  	  $con = $this->Conexion();
        mysqli_query($con,$query);
    	  $id_usuario = mysqli_insert_id($con);
        return $id_usuario;
  }

}
?>