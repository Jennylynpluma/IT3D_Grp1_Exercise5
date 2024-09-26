<?php
include("config.php");
if(isset($_POST['input'])){

    $input = $_POST['input'];

    $query = "SELECT * FROM people WHERE name LIKE '{$input}%' OR age LIKE '{$input}%' OR
    school LIKE '{$input}%' OR email LIKE '{$input}%' OR course LIKE '{$input}%' LIMIT 5";

    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){?>

    <table class="table table=bordered table-striped mt-4">
       <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>School</th>
            <th>email</th>
            <th>Course</th>
        </tr>
       </thead>

       <tbody>
    <!--Para ma fetch 'yong  data-->
        <?php
        while($row = mysqli_fetch_assoc($result)){
            
            $id = $row['ID'];
            $name = $row['Name'];
            $age = $row['Age'];
            $school = $row['School'];
            $email = $row['email'];
            $course = $row['Course'];

            ?>

            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $age;?></td>
                <td><?php echo $school;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $course;?></td>
            </tr>

            <?php
        }
        ?>
       </tbody>
    </table>

    <?php

    }else{
        echo "<h6 class = 'text-danger text-center mt-3'>Not available</h6>";
    }
}
?>