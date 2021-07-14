<?php  
/*  
=============  
This file is part of a Microsoft SQL Server Shared Source Application.  
Copyright (C) Microsoft Corporation.  All rights reserved.  
  
THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY  
KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE  
IMPLIED WARRANTIES OF MERCHANTABILITY AND/OR FITNESS FOR A  
PARTICULAR PURPOSE.  
=============  
*/  
$serverName = "YOUR_SERVER_HERE";  
  
/* Connect using Windows Authentication. */  
try  
{  
$conn = new PDO( "sqlsrv:server=$serverName ; Database=YOUR_DB", "sa", "password");  
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
}  
catch(Exception $e)  
{   
die( print_r( $e->getMessage() ) );   
}  
  
/* Get the product picture for a given product ID. */  
try  
{  
$tsql = "SELECT TOP (1000) [DomainUserName]
,[EmailAddress]
,[OfficeLocation]
FROM [EAI_PeopleUpdate].[dbo].[tADData]";  
$stmt = $conn->prepare($tsql);  
$stmt->execute(array());  
// $stmt->bindColumn(1, $, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);  
// $stmt->fetch(PDO::FETCH_BOUND);  
$result = $stmt->fetchAll();
var_dump($result);  
}  
catch(Exception $e)  
{   
die( print_r( $e->getMessage() ) );   
}  
?>  
