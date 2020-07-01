<?php
function get_all_records(){
    $result=null;
    /*$con = getdb();
$Sql = "SELECT * FROM employeeinfo";
$result = mysqli_query($con, $Sql);
if (mysqli_num_rows($result) > 0) {*/
echo "<div class='table-responsive'>
    <table id='myTable' class='table table-striped table-bordered'>
        <thead>
            <tr>
                <th>EMP ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>";
            while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . $row['emp_id']."</td>
                <td>" . $row['firstname']."</td>
                <td>" . $row['lastname']."</td>
                <td>" . $row['email']."</td>
                <td>" . $row['reg_date']."</td>
            </tr>";
            }

            echo "</tbody>
    </table>
</div>";
/*
} else {
echo "you have no records";
}*/
}
