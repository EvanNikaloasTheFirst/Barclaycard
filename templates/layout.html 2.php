<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="/style.css"/>
		<title><?php use as2\DatabaseTable;

            echo $title ?? ""?></title>
</head>
<body>
    <div id="header">
        <img src="../barclaycard.png" alt="barclaycard image" id="barclayLogo">
        <img src="../secure.png" alt="Secure authorization" id="padlock">
    </div>
    <div id="side-bar-left">
        <?php 
       if ( $_SESSION['loggedIn'] == true ||  $_SESSION['AdminloggedIn'] == true){
        require "../sideBar.php"; } 
         ?>
    </div>
    <div id="main">

  <?=$output ?? ""?>

    </div>
    <div id="side-bar-right">
    <?php 
        if ($_SESSION['loggedIn'] == true ||  $_SESSION['AdminloggedIn'] == true){
            require "../sideBarRight.php";
        } 
         ?>
    </div>
    <div id="footer">
        <p class="footerText">Barclaycard is a trading name of Barclays Bank UK PLC. Barclays Bank UK PLC is authorised by the Prudential Regulation Authority and regulated by the Financial Conduct Authority and the Prudential Regulation Authority (Financial Services Register number: 759676). Registered in England. Registered No. 9740322. Registered office: 1 Churchill Place, London E14 5HP</p>
        <p class="footerText">Barclays Bank UK PLC adheres to The Standards of Lending Practice which are monitored and enforced by the LSB: www.lendingstandardsboard.org.uk</p>
        <p class="footerText">© Barclaycard 2023.

        </p>
    </div>
</body>
</html>