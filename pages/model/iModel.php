<?php

interface iModel {
	public function getDataByKey($key);  // я решил не париться с геттерами.

	public function sendCookie();
}

?>