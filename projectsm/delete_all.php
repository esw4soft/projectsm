<?php
require_once ("db_connect.php");
$del_id=$_POST["deleteAllID"];

//echo json_encode($del_id);

for($i=0;$i<count($del_id);$i++){
    $id=$del_id[$i];
    echo json_encode($id);
$sql="UPDATE event SET event_valid=0 WHERE event_id=$id";
$result=$conn->query($sql);}
echo json_encode($result);

$conn->close();

?>



