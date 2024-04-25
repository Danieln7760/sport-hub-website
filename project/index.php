<!-- daniel Nkemdirim worked on this page -->
<?php 
session_start(); 
if (isset($_SESSION['username'])) {
    header("Location: website.php");
    exit();
}
?>
<!DOCTYPE html>
<HTML lang="en">
    <HEAD>
        <TITLE>EcoMotion</TITLE>
        <LINK rel="stylesheet" href="style.css">
    </HEAD>
    <BODY>
        <DIV class="gridcontainer">        
            <?PHP include("VGHheader.php"); ?>
            <?PHP include("VGHnav.php"); ?>
            
            <DIV class="content">
                welcome
            </DIV>
            <?PHP include("blog.php"); ?>
            <DIV class="sidebar">
                Play a game today!
            </DIV>
            
            <?PHP include("VGHfoot.php"); ?>
        </DIV>
    </BODY>
</HTML>
