<?php  
session_start();
session_destroy();
session_unset();
header("Location:index.php");
?>
$allunseencomplaints = "SELECT tblcomplans.COUNTER, tblcomplans.CATEGORY, tblcomplans.COMPLAINT,tblcomplans.CATEGORYID,tblcomplans.DATEADDED, tblcategory.CATEGORY  FROM tblcomplans , tblcategory WHERE tblcomplans.STATUS = 1 AND tblcategory.ID  = tblcomplans.CATEGORYID";