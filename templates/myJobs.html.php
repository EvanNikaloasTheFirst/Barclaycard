<style>

@import url('https://fonts.googleapis.com/css2?family=Anuphan:wght@200&display=swap');
  body{
    font-family: 'Anuphan', sans-serif;
}
 table {
    position: relative;
  border-collapse: collapse;
  min-width: 100%;
  /* margin: 0 auto; */
  border: 1.5px solid  #00aeef;;
  
}

  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
  
  th {
    background-color: #f2f2f2;
  }
  
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .container {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: white;
  min-height: 500px;
  top: 100px;
  border: 1px solid #f5f5f5;
  border-radius: 1%;
}
  .headerText{
  text-align: center;
}

</style>

<h1 class="headerText">My Jobs</h1>
<div class="container">


<table>
  <thead>
  <tr>
      <th>URN</th>
      <th>Title</th>
      <th>Staff assigned</th>
      <th>Edit</th>
      <th>Category</th>
      <th>Status</th>
      <th>Date created</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($stmt as $row): ?>
      <tr>
        <td><?php echo $row['urn']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php  if ( $row['casehandler'] == ''){
          echo 'Not yet assigned'; 
          
        } else {
          echo $row['casehandler']; 
        }
        ?></td>
        <td><?php echo'<a  href = "/staff/edit?urn='. $row['urn'].'"><li>'."Finish job".'</li></a>'; ?></td>
        <td><?php echo $row['category']; ?></td>
      
        <td <?php if ($row['status'] == 'In process') 
        { echo 'style="background-color: #FFC107;"'; } else if ($row['status'] == 'Approved') {
            echo 'style="background-color: #00FF00;"';  
        } 
        else if ($row['status'] == 'Submitted') {
          echo 'style="background-color: #808080;"';  
      }
      else{
            echo 'style="background-color: #FF0000;"';
        }?>>
  <?php echo $row['status']; ?>
</td>

        <td><?php echo $row['date']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>


