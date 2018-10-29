<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Scrape Marketplace</title>
</head>
<body>
	
	<form action="<?=site_url('Main/Find')?>" method="post"><table class='table table-bordered'>
	    <tr>
            <td><input type="text" class="form-control" name="UrlStoreName" placeholder="Masukkan Url Toko" /></td>
	  	</tr>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary">Submit</button> 
    </table></form>

	<?php foreach ($Print_product as $Product) { ?>
			<img src='<?php echo $Product['Image']; ?>' alt="<?php echo $Product['Product_name']; ?>"><br /> 
			<p><?php echo $Product['Product_name']; ?></p>
			<p><?php echo $Product['Price']; ?></p>
	<?php } ?>

</body>
</html>