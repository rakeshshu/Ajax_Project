<?php

$conn = mysqli_connect("localhost", "root", "", "project1") or die("Connection Failed");

$limit = 5;
if (isset($_POST["page_no"])) {
    $page = $_POST["page_no"];
} else {
    $page = 0;
}

$sql = "SELECT * FROM person LIMIT {$page},$limit";
$query =  mysqli_query($conn, $sql) or die("Query Failed.");

if (mysqli_num_rows($query) > 0) {
    $output = "";
    $output .= "<tbody>";

    while ($row = mysqli_fetch_assoc($query)) {
        $last_id = $row["id"];
        $output .= "<tr>
                     <td>{$row['id']}</td>
                     <td>{$row['sname']}</td>
                     <td>{$row['fname']}</td>
                     <td>{$row['mname']}</td>
                     <td>{$row['dob']}</td>
                     <td>{$row['category']}</td>
                     <td>{$row['address']}</td>
                    </tr>";
    }

    $output .= "</tbody>;
                 <tbody id='pagination'>
                   <tr>
                     <td colspan='7'>
                       <div class='text-center'>
                        <button id='ajaxbtn' class='btn btn-success' data-id='{$last_id}'>Load More</button>
                       </div>
                     </td>
                      </tr>
                   </tbody>";

      echo $output;               
}else{
    echo "";
}

?>