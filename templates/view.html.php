<style>
    .center-form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
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

<h1 class="headerText">View a query</h1>

<form class="center-form">
    <label for="urn">URN Number:</label>
    <input type="text" id="urn" name="urn" value="<?= $stmt['urn'] ?>" readonly>
  
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?= $stmt['title'] ?>" readonly>
  
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" value="<?= $stmt['date'] ?>" readonly>
  
    <label for="status">Status:</label>
    <input type="text" id="status" name="status" value="<?= $stmt['status'] ?>" readonly>

    <label for="notes">Notes:</label>
    <textarea id="notes" name="notes" readonly><?= $stmt['notes'] ?></textarea>
  
    <label for="category">Category:</label>
    <input type="text" id="category" name="category" value="<?= $stmt['category'] ?>" readonly>

  
    <label for="description">Description:</label>
    <textarea id="description" name="description" readonly><?= $stmt['description'] ?></textarea>
  
    <label for="casehandler">Case Handler:</label>
    <input type="text" id="casehandler" name="casehandler" value="<?= $stmt['casehandler'] ?>" readonly>
  
    <label for="assignee">Assignee:</label>
    <input type="text" id="assignee" name="assignee" value="<?= $stmt['assigner'] ?>" readonly>
  
    <button type="submit" disabled>Submit</button>
</form>





