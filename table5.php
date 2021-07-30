
<!DOCTYPE html>
<html>
<head>
  <title>Email_table</title>
  <style type ="text/css">
    table {
        border-collapse: collapse;
        width:100%;
        color: #131821;
        font-family: monospace;
        font-size:25px;
        text-align: left;
    }
    th {
        background-color:#588c7e;
        color:white;
    }
    tr:nth-child(even) {background-color:#f2f2f2}

    </style>
  
</head>
<body>
<form method="POST">
<select name="email123">
<option selected disabled>--select--</option>
<option value="Outlook">Outlook</option>
<option value="Gmail">Gmail</option>
<option value="Yahoo">Yahoo</option>
</select>
<input type="submit" name="submit" value="get selected email" />
 </form>
<div class="container">
 
<?php
 
$mysqli = new mysqli("localhost", "root", "root", "Email2");
   
  if($mysqli === false){
  die("ERROR: Could not connect. " . $mysqli->connect_error);
}
  $emailLike="1=1";
  if(isset($_POST['submit']))
{
    $email123=strtolower($_POST['email123']);
    echo 'selected email:'.$email123;
    $emailLike="lower(email123) like '%@$email123%'";
}

    $orderBy = !empty($_GET["orderby"]) ? $_GET["orderby"] : "date";
    $order = !empty($_GET["order"]) ? $_GET["order"] : "desc"; 
    $sql = "SELECT email123, date from Email_list where $emailLike ORDER BY " . $orderBy." " . $order;

    $result = $mysqli->query($sql);
  
    $email123Order = "asc";
    $dateOrder = "desc";
  
    if($orderBy == "email123" && $order == "asc") {
      $email123Order = "desc";
    }
    if($orderBy == "date" && $order == "desc") {
      $dateOrder = "asc";
    }
  ?>  
  
<table class="table table-bordered">
  <thead>  
    <tr>
      <th><a href="?orderby=email123&order=<?php echo $email123Order; ?>">Email</a></th>
      <th><a href="?orderby=date&order=<?php echo $dateOrder; ?>">Date</a></th>
    <th>Delete</th>    
    </tr>
  </thead>
  <tbody>
  
    <?php
    while($row = mysqli_fetch_assoc($result)){
    $email123=$row['email123'];
    ?>  
      <tr>
        <td><?php echo $row['email123']; ?></td>
        <td><?php echo $row['date']; ?>    
    <td> <a href="delete.php?Del=<?php echo $email123 ?>">Delete</a></td>
    
  </td>    
      </tr>    
    <?php    
    }
    ?>  
  </tbody>
</table>
</div>
  
</body>
</html>
