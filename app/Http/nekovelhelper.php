<?php



if(!function_exists('word_limiter')){

	function word_limiter($value, $words = 100, $end = '...'){
		
		 return \Illuminate\Support\Str::words($value, $words, $end);
	}
}


if(!function_exists('get_page_subcat')){

	function get_page_subcat($page_ID){

		return DB::table('page_subcategories')->where('parent_page',$page_ID)->get();
	}
}

if(!function_exists('generate_clickable_tags')){

	function generate_clickable_tags($tags){

		$tag_lists = explode(",", $tags);

		$clickabletags ='';

		foreach($tag_lists as $list){
			$clickabletags.="<a class='clickable_tag_links' href='".url('/tag')."?t=$list'>".$list."</a>  &nbsp;";
		}
		return $clickabletags;
	}
}


