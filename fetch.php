<?php
include "vendor/autoload.php";
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->local->students;
$result = $collection->find();
// foreach ($result as $student) {
//     var_dump($student);
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data from MongoDB</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</head>
<body>  
    <h1 style="margin-left:50px"; >Students Information Collection</h1>

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>_id</th>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birth Date</th>
                    <th>Address</th>
                    <th>Program</th>
                    <th>Contact Number</th>
                    <th>Emergency Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $student): ?>
                <tr>
                    <td><?= $student['_id'] ?></td>
                    <td><?= $student['studentId'] ?></td>
                    <td><?= $student['firstName'] ?></td>
                    <td><?= $student['lastName'] ?></td>
                    <td><?= $student['birthdate'] ?></td>
                    <td><?= $student['address'] ?></td>
                    <td><?= $student['program'] ?></td>
                    <td><?= $student['contactNumber'] ?></td>
                    <td><?= $student['emergencyContact'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>