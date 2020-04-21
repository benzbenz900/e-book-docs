<?php
function smarty_modifier_getUrlTocode($params)
{
	$params = strip_tags($params);
	$urlembed = false;
	preg_match('/(.*):\/\/(.*)\/(.*)\//', $params, $findomain);
	if(empty($findomain)){
		preg_match('/(.*):\/\/(.*)\/(.*)/', $params, $findomain);
	}
	if($findomain['2'] == 'youtube.com' || $findomain['2'] == 'www.youtube.com' || $findomain['2'] == 'youtu.be'){
		$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
		$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

		if (preg_match($longUrlRegex, $params, $matches)) {
			$youtube_id = $matches[count($matches) - 1];
		}

		if (preg_match($shortUrlRegex, $params, $matches)) {
			$youtube_id = $matches[count($matches) - 1];
		}

		$urlembed = 'https://www.youtube.com/embed/' . $youtube_id ;
	}

	return ($urlembed == false) ? $params : $urlembed;
}