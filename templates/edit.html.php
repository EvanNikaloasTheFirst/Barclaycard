<style>
    .center-form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  /* height: 100vh; */
}

.center-form label, 
.center-form input,
.center-form textarea,
.center-form select,
.center-form button {
  display: block;
  margin-bottom: 10px;
  width: 100%;
  max-width: 400px;
}


.headerText{
  text-align: center;
}

</style>

<h1 class="headerText">Edit a query</h1>

<form action = "edit" method = "POST"  class="center-form">
  <label for="urn">URN Number:</label>
  <input type="text" id="urn" name="urn" value="<?= $stmt['urn'] ?>">
  
  <label for="title">Title:</label>
  <input type="text" id="title" name="title" value="<?= $stmt['title'] ?>">
  
  <label for="date">Date:</label>
  <input type="date" id="date" name="date" value="<?= $stmt['date'] ?>">
  
  <label for="status">Status:</label>
  <select id="status" name="status" value="<?= $stmt['status'] ?>">

  <option value="in-progress">In Progress</option>
  <option value="Approved">Approved</option>
  <option value="Rejected">Rejected</option>
  <option value="Reviewing">Reviewing</option>
  <option value="Submitted">Submitted</option>
  </select>
  
  <label for="notes">Notes:</label>
  <textarea id="notes" name="notes"></textarea>
  
  <label for="category">Category:</label>
  <input type="category" id="category" name="category" value="<?= $stmt['category'] ?>">

  <label for="description">Description:</label>
  <textarea id="description" name="description" >
    <?= $stmt['description'] ?>
  </textarea>
  
  <label for="casehandler">Case Handler:</label>

 <?php
if ($_SESSION['SupervisorloggedIn']) {
  $readonly = ''; // make the input field editable
} else {
  $readonly = 'readonly'; // make the input field read-only
}
?>

<input type="text" id="casehandler" name="casehandler" value="<?= $stmt['casehandler'] ?>" <?= $readonly ?>>

  
  <label for="assignee">Assignee:</label>
  <input type="text" id="assignee" name="assignee" value="<?= $stmt['assigner'] ?>">
  
  <button type="submit">Submit</button>
</form>
