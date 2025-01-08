<?php
require '../db_connect.php';
echo "<h1>Welcome to the Visa Application System</h1>";
echo "
<ul>
    <li><a href='Admin/view_admin.php'>Manage Admins</a></li>
    <li><a href='Applicants/view_applicants.php'>Manage Applicants</a></li>
    <li><a href='Applications/view_application.php'>Manage Applications</a></li>
    <li><a href='Documents/view_documents.php'>Manage Documents</a></li>
    <li><a href='Visatypes/view_visatype.php'>Manage Visa Types</a></li>
</ul>
";
?>
