<?php
$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

public function update($name, $email){

}

//delets the joke category and joke
if (isset($_POST['action']) and $_POST['action'] == 'Delete')

{

 // Delete category assignments for this topic

 try

 {

 $sql = 'DELETE FROM topic WHERE Topic_Id = :id';

 $s = $pdo->prepare($sql);

 $s->bindValue(':id', $_POST['id']);

 $s->execute();

 }

 catch (PDOException $e)

 {

 $error = 'Error removing topic from categories.';


 exit();

 }

 // Delete the joke

 try

 {

 $sql = 'DELETE FROM idea WHERE Idea_Id = :id';

 $s = $pdo->prepare($sql);

 $s->bindValue(':id', $_POST['id']);

 $s->execute();

 }

 catch (PDOException $e)

 {

 $error = 'Error deleting idea.';

 exit();

 }



 exit();

}

?>