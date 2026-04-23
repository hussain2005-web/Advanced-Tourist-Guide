<?php 
@include 'conn.php';
$result = mysqli_query($conn,"SELECT * FROM users");
?>
<style>
  .form-control
  {
    border:1px solid #8e44ad;
    border-radius:8px;
  }
    .my-bookings {
    margin: 20px;
  }
  
  .my-bookings h1 {
    color: #8e44ad;
    margin-bottom: 20px;
  }
  
  .my-bookings table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  .my-bookings th,
  .my-bookings td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
  }
  
  .my-bookings th {
    background-color: #8e44ad;
    color: #fff;
  }
  
  .my-bookings tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  .my-bookings tbody tr:hover {
    background-color: #f2f2f2;
  }
  </style>

<div class="my-bookings">
 
    <h1>SEARCH USER</h1>
    <br>
    
    <input type="text" name="search" id="search" placeholder="Search By Name" class="form-control">
    <br>
    <br>
    <table class="table" id="myTable">
      <thead>
      <th>User Name</th>  
			<th>Email ID</th>  
  		<th>Mobile No.</th>
      </thead>
      <tbody>
        <?php 
          foreach ($result as $row)
          {
            ?>
            <tr>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['phone'];?></td>
          </tr>
          <?php

          }
        ?>

</tbody>		
</table>		

</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#search').keyup(function(){
      search_table($(this).val());
    });
     function search_table(value){
      $('#myTable tr').each(function(){
       var found = 'false';
       $(this).each(function(){
         if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
         {
           found='true';
         }
       });
       if(found == 'true'){
        $(this).show();
       }
       else{
        $(this).hide();
       }
      });
     }
  });
  </script>