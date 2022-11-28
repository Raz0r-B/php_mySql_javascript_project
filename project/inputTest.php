<?php 
require_once "login.php";
//if (isset($_POST['delete']) && isset())

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

  if(//Collect input data from HTML form to add a new employee
    isset($_POST['employeeNumber']) &&
    isset($_POST['lastName'])       &&
    isset($_POST['firstName'])      &&
    isset($_POST['extension'])      &&
    isset($_POST['email'])          &&
    isset($_POST['officeCode'])     &&
    isset($_POST['reportsTo'])      &&
    isset($_POST['jobTitle'])
    )
    {$employeeNumber =  get_post($conn,'employeeNumber');
    $lastName       =  get_post($conn,'lastName');
    $firstName      =  get_post($conn,'firstName');
    $extension      =  get_post($conn,'extension');
    $email          =  get_post($conn,'email');
    $officeCode     =  get_post($conn,'officeCode');
    $reportsTo      =  get_post($conn,'reportsTo');
    $jobTitle       =  get_post($conn,'jobTitle');


    
    $query = "INSERT INTO employees VALUES ('$employeeNumber', '$lastName', '$firstName', '$extension', '$email', '$officeCode', '$reportsTo', '$jobTitle')";
    $result = $conn->query($query);
    }// End new employee if-function

if (isset($_POST['delete']) 
    && isset($_POST['employeeNumber'])){

    $employeeNumber = get_post($conn, 'employeeNumber');
    $query = "DELETE FROM employees where employeeNumber = '$employeeNumber'";
    $result = $conn->query($query);
}//End Delete if-function




//Create form table for input of new employee
echo <<<_END
<form action="inputTest.php" method="post"><pre>
    Employee Number     <input type="text" name= "employeeNumber"> 
    First Name          <input type="text" name= "firstName">
    Last Name           <input type="text" name= "lastName">
    job Title           <input type="text" name= "jobTitle">
    Extension           <input type="text" name= "extension">
    Email               <input type="text" name= "email">
    Office Code         <input type="text" name= "officeCode">
    Reports To(Emp. ID) <input type="text" name= "reportsTo">
                        <input type="submit" value="Add Employee">
</pre></form>
_END;



$query = "SELECT * FROM employees order by officeCode asc, employeeNumber asc";
$result = $conn->query($query);

// Create table to show query of employees with delete option
echo "<table>
        <th>|Employee Number| </th>
        <th>|First Name| </th>
        <th>|Last Name| </th>
        <th>|Job Title| </th>
        <th>|Extension| </th>
        <th>|Email| </th>
        <th>|Office Code| </th>
        <th>|Reports To| </th>
        <th>|Delete?|</th>";
while($row = $result->fetch_array()){
    echo "<tr>
            <td>".$row['employeeNumber']."</td>
            <td>".$row['firstName']."</td>
            <td>".$row['lastName']."</td>
            <td>".$row['jobTitle']."</td>
            <td>".$row['extension']."</td>
            <td>".$row['email']."</td>
            <td>".$row['officeCode']."</td>
            <td>".$row['reportsTo']."</td>
            <td><form action= 'inputTest.php' method='post'>
                <input type='hidden' name='delete' value= 'yes'>
                <input type='hidden' name='employeeNumber', value='".$row['employeeNumber']."'>
                <input type='submit' value='delete'></form></td>
        </tr>";    
}
echo "</table>";

function get_post($conn, $var){//To escape characters for security(sql injection) $conn must be a mysqli object
    return $conn->real_escape_string($_POST[$var]);
}
?>