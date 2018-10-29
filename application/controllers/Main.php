<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
			parent::__construct();		
			$this->load->library('simple_html_dom');
	 }


	 public function Index() {
	 	$this->load->view('v_main');
	 }

	public function Find()
	{
		$Store = $this->input->post('UrlStoreName');

		$html = file_get_html($Store);

		$saves = [];

		$i = 1;
		foreach ($html->find('li.col-12--2') as $save) {
		        if ($i > 10) {
		                break;
		        }

		        //Product Name
		        $Scrape_product_name = $save->find('a.product__name', 0);
		        $Product_name = $Scrape_product_name->title;

		        //Product Price
		        $Scrape_price = $save->find('span.amount', 0);
		        $Price = $Scrape_price->innertext;

		        //Product Image
		        $Scrape_img = $save->find('img.product-media__img', 0);
		        $Img = $Scrape_img->src;

		        $saves[] = [
		                'Product_name' => $Product_name,
						'Price' => $Price,
						'Image' => $Img
		        ]; 

		        $i++;
		}
		
		$result['Print_product'] = $saves;
		$this->load->view('v_result',$result);
	}
}
