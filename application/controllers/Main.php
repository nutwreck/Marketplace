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

	public function FindBukalapak()
	{
		$Store = $this->input->post('UrlStoreName');
		$ShowProduct = $this->input->post('Numberappears');

		preg_match('@^(?:https://www.bukalapak.com/)?([^/]+)@i',
		$Store, $matches);
		$host = $matches[1];

		if ($host == 'u') {
			$html = file_get_html($Store);

			$saves = [];

			$i = 1;
			foreach ($html->find('li.col-12--2') as $save) {
			        if ($i > $ShowProduct) {
			                break;
			        }

			        //Product Image
			        $Scrape_img = $save->find('img.product-media__img', -1);
			        $Img = $Scrape_img->src;

			        //Product Name
			        $Scrape_product_name = $save->find('a.product__name', -1);
			        $Product_name = $Scrape_product_name->title;

			        //Product Price
			        $Scrape_price = $save->find('span.amount', -1);
			        $Price = $Scrape_price->innertext;

			        //Product Link Detail
			        $Scrape_link_detail = $save->find('a.product-media__link', -1);
			        $Link_Detail = $Scrape_link_detail->href;

			        //Product Star Rating
				    $Scrape_star_rating = $save->find('div[class=product__rating],span.rating', -1);
			        $Star_rating = $Scrape_star_rating->title;

			        //Product Star Rating
				    $Scrape_Review = $save->find('div[class=product__rating],a.review__aggregate', -1);
			        $Review_count = $Scrape_Review->innertext;
			        $Review_link = $Scrape_Review->href;

			        $saves[] = [
			                'Product_name' => $Product_name,
							'Price' => $Price,
							'Image' => $Img,
							'Link_Detail' => $Link_Detail,
							'Star_Rating' => $Star_rating,
							'Review_count' => $Review_count,
							'Review_link' => $Review_link,
							'msg' => ''
			        ]; 

			        $i++;
			}
		} else {
					$saves[] = [
					                'Product_name' => '',
									'Price' => '',
									'Image' => '',
									'Link_Detail' => '',
									'Star_Rating' => '',
									'Review_count' => '',
									'Review_link' => '',
									'msg' => 'Barang tidak ditemukan, Coba cari dari <b>Toko lain<b>.'
					        ]; 
		}
		$this->GetFindBukalapak($saves);
	}

	public function GetFindBukalapak($saves){
			$result['Print_product'] = $saves;
			$this->load->view('v_result',$result);
	}
}
