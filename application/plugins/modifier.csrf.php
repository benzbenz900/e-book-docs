<?php
function smarty_modifier_csrf() {
	if (! isset($_SESSION['csrf_token'])) {
		$_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
	}
	return $_SESSION['csrf_token'];
}