<style>
li a {
  display: block;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  list-style-type: none;
  padding-top: 50px;
}
ul {
  list-style: none;
}

li a:visited{
  color: #00aeef;
}

</style>

<ul class="list">
<?php if ($_SESSION['AdminloggedIn'] == true) { ?>
    <?= '<li><a href="/user/logout">Logout</a></li>' ?>
    <?= ' <li><a href="/staff/portal">Dashboard</a></li>' ?>
    <?= ' <li><a href="/staff/JobsAvailable">Jobs Available</a></li>' ?>

<?php } ?>


  
  <?php  if ($_SESSION['loggedIn'] == true) { ?>
  <?= '<li> <a href="/user/logout">Logout</a></li>' ?>
  <?= '<li><a href="/user/dashboard">Dashboard</a></li>' ?>
  <?= ' <li><a href="/user/createQuery">Create a query</a></li>' ?>
 <?php  } ?>
</ul>
