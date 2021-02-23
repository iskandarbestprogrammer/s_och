<?php
include_once 'conn.php';
$sql = "DELETE FROM ochered WHERE id_ochered='" . $_GET["id_ochered"] . "'";
if (mysqli_query($conn, $sql)) {
    // <script>alert('Record deleted successfully')</script>
    echo "Record deleted successfully";
    header("Location: org_list.php");

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>