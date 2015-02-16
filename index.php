<?php
include('header.php');
include('Teachers.php');

$teacher = new Teachers();


$teachers = $teacher->getAll();
?>
<table>
    <tr>
        <th>
            id
        </th>

        <th>
            view students
        </th>
    </tr>
<?php
foreach($teachers as $key => $teacher){

?>

    <tr>
        <td>
            <?php echo $teacher['id']; ?>
        </td>
        <td>

        <td>
            <a href="view_teacher_students.php?teacherId=<?php echo $teacher['id']; ?>">view</a>
        </td>

    </tr>


<?php
}
?>
</table>