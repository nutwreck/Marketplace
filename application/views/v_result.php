<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Scrape Marketplace</title>
	<style>
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}

		input[type=text]:focus {
		    border: 3px solid #555;
		}

		input[type=text] {
		    width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		    border: 3px solid #ccc;
		    -webkit-transition: 0.5s;
		    transition: 0.5s;
		    outline: none;
		}

		input[type=text]:focus {
		    border: 3px solid #555;
		}

		input[type=submit] {
		    background-color: #4CAF50;
		    color: white;
		    padding: 12px 20px;
		    border: none;
		    border-radius: 4px;
		    cursor: pointer;
		    float: left;
		}

		input[type=submit]:hover {
		    background-color: #45a049;
		}

		@media screen and (max-width: 600px) {
		    .col-25, .col-75, input[type=submit] {
		        width: 100%;
		        margin-top: 0;
		    }
		}
	</style>
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
				<?php if ($Product['Star_Rating'] == NULL){ ?>
				<td> - </td>
				<?php } else { ?>
				<td><?php echo $Product['Star_Rating']; ?></td>
				<?php } ?>
				<?php if ($Product['Review_count'] == ' '){ ?>
				<td> - </td>
				<?php } else { ?>
				<td><a href='https://www.bukalapak.com<?php echo $Product['Review_link']; ?>'><?php echo $Product['Review_count']; ?></a></td>
				<?php } ?>
			</tr>
			<p><?php echo $Product['msg']; ?></p>
		<?php } ?>
	</table>
</body>
</html>