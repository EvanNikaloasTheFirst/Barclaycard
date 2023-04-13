<style>
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

#loginForm {
  display: grid;
  grid-template-columns: auto;
  grid-template-rows: repeat(3, auto);
  gap: 10px;
  justify-items: center;
  align-items: center;
}

label {
  grid-row: span 1;
}

input[type="submit"] {
  grid-row: span 1;
}

.square-middle {
  text-align: center;
}

.logo1-img {
  position: relative;
  bottom: 40px;
 
}

.form1,
.form2,
.submit-button {
  display: block;
  /* margin: 20px auto; */
  height: fit-content;
  width: 8vw;
}
</style>

<div class="container">
  <div class="square-middle">
  <img class="logo1-img" src="../barclaycard.png" alt="Barclays-Logo" width="520" height="130">
  <form action = "login" method = "POST" id="loginForm">
  <label for = "email">Email</label>
  <input type ="text"  name="email" value=""/>
  <label for = "Password">Password</label>
  <input type="Password" name="Password" />
  <input type ="submit" value ="Submit"  name="submit" />
    </form>
  </div>
</div>

        </form>
