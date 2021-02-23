<?php
include_once 'conn.php';
$sql = "DELETE FROM otdel WHERE id_otdel='" . $_GET["id_otdel"] . "'";
if (mysqli_query($conn, $sql)) {
    // <script>alert('Record deleted successfully')</script>
    echo "Record deleted successfully";
    header("Location: org_list.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>