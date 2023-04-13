
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

<h1 class="headerText">Create a query</h1>

<form action = "createQuery" method = "POST" class="center-form">

  
  <label for="title">Title:</label>
  <input type="text" id="title" name="title" value="">
  
  <label for="date">Date:</label>
  <input type="date" id="date" name="date" value="">
  
  <label for="status">Status:</label>
<select id="status" name="status">
  <option value="Submitted">Submitted</option>

</select>

  
  <label for="notes">Notes:</label>
  <textarea id="notes" name="notes"></textarea>
  
  <label for="category">Category:</label>
<select id="category" name="category">
  <option value="">Select a category</option>
  <option value="Payments">Payments</option>
  <option value="Late-fees">Late fees</option>
  <option value="Fraud">Fraud</option>
  <option value="General">General</option>
  <option value="Inquiries">Inquiries</option>
</select>

  
  <label for="description">Description:</label>
  <textarea id="description" name="description" >
  </textarea>
  
  <button type="submit">Submit</button>
</form>
