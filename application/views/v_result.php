<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Scrape Marketplace</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.css" />
</head>
<body>
	<?php $this->load->view('Form/v_form_cari')?>
	<?php $start = 1; ?>
	<table>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga Produk</th>
				<th>Gambar Produk</th>
				<th>Link Detail Produk</th>
				<th>Rating Produk</th>
				<th>Ulasan Produk</th>
			</tr>
		<?php foreach ($Print_product as $Product) { ?>
			<tr>
				<td><?php echo $start++; ?></td>
				<td><?php echo $Product['Product_name']; ?></td>
				<td>Rp<?php echo $Product['Price']; ?></td>
				<td><img src='<?php echo $Product['Image']; ?>' alt="<?php echo $Product['Product_name']; ?>"></td>
				<td><a href='https://www.bukalapak.com<?php echo $Product['Link_Detail']; ?>'>Detail Barang</a></td>			
				<td> <?php if ($Product['Star_Rating'] == NULL){ echo '-'; } else {  echo $Product['Star_Rating'];  } ?></td>
				<td> <?php if ($Product['Review_count'] == ' '){ echo '-'; } else { ?> <a href='https://www.bukalapak.com<?php echo $Product['Review_link']; ?>'><?php echo $Product['Review_count']; ?></a> <?php } ?></td>
			</tr>
			<p><?php echo $Product['msg']; ?></p>
		<?php } ?>
	</table>
</body>
</html>