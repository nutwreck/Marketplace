
<form action="<?=site_url('index.php/Main/FindBukalapak')?>" method="post">
	<table class='table table-bordered'>
	    <tr>
            <td><input type="text" class="form-control" name="UrlStoreName" placeholder="Masukkan Url Toko"/></td>
            <td><input type="text" class="form-control" name="Numberappears" placeholder="Masukkan Jumlah Tampil Produk" /></td>
	  	</tr>
	    <tr><td colspan='2'><input type="submit" value="Submit"></td></tr> 
    </table>
</form>