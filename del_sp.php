<?php
include_once 'conn.php';
$sql = "DELETE FROM sp WHERE id_sp='" . $_GET["id_sp"] . "'";
if (mysqli_query($conn, $sql)) {
    // <script>alert('Record deleted successfully')</script>
    echo "Record deleted successfully";
    header("Location: org_list.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>