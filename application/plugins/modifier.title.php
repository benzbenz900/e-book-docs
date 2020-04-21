<?php
function smarty_modifier_title($name,$url='#',$title='ดูทั้งหมด') {
	$html = '<div class="d-flex justify-content-between">
        <h1 class="h4">
          '.$name.'
        </h1>';
        if($url != false){
        	$html .= '<a class="text-warning" href="'.BASE_URL.$url.'"> '.$title.' ></a>';
        }
      	$html .= '</div>';
	return $html;
}