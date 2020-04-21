<?php
function smarty_modifier_number_short($params)
{
	if ($params < 900) {
		$params_format = number_format($params, 1);
		$suffix = '';
	} else if ($params < 900000) {
		$params_format = number_format($params / 1000, 1);
		$suffix = 'K';
	} else if ($params < 900000000) {
		$params_format = number_format($params / 1000000, 1);
		$suffix = 'M';
	} else if ($params < 900000000000) {
		$params_format = number_format($params / 1000000000, 1);
		$suffix = 'B';
	} else {
		$params_format = number_format($params / 1000000000000, 1);
		$suffix = 'T';
	}
	if ( 1 > 0 ) {
		$dotzero = '.' . str_repeat( '0', 1 );
		$params_format = str_replace( $dotzero, '', $params_format );
	}
	return $params_format . $suffix;
}