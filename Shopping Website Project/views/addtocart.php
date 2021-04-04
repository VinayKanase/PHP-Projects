<?php

use app\Database;

if (count($_POST) === 0) {
 header('Location:/');
 exit;
} else if (count($_POST) !== 0) {
 $id = $_POST['id'] ?? null;
 $name = $_POST['name'] ?? null;
}
if (!$id || !$name) {
 header('Location:/');
 exit;
} else {
 echo "Loading";
}
$db = new Database();
$db->AddtoCart($id, $name);

?>

<?php require_once "footer.php" ?>