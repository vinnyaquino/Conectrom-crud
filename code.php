<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Aluno excluido com sucesso";
        header("Location: painel.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel excluir o aluno";
        header("Location: painel.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $sobrenome = mysqli_real_escape_string($con, $_POST['sobrenome']);
    $sexo = mysqli_real_escape_string($con, $_POST['sexo']);
    $data_nascimento = mysqli_real_escape_string($con, $_POST['data_nascimento']);

    $query = "UPDATE students SET name='$name', sobrenome='$sobrenome', sexo='$sexo', data_nascimento='$data_nascimento' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Aluno atualizado com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Aluno não atualizado";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $sobrenome = mysqli_real_escape_string($con, $_POST['sobrenome']);
    $sexo = mysqli_real_escape_string($con, $_POST['sexo']);
    $data_nascimento = mysqli_real_escape_string($con, $_POST['data_nascimento']);

    $query = "INSERT INTO students (name,sobrenome,sexo,data_nascimento) VALUES ('$name','$sobrenome','$sexo','$data_nascimento')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Aluno cadastrado com sucesso!";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Aluno não cadastrado";
        header("Location: student-create.php");
        exit(0);
    }
}

?>