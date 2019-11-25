<?php
	//----------------------------------------------------
	//  デバイス判定
	//----------------------------------------------------
	function is_device()
	{
		$device_info = '';
		// ユーザーエージェントを変数に格納する。
		$ua = $_SERVER['HTTP_USER_AGENT'];
		//  スマートフォンで判定したい端末のUAを配列に入れる
		$spes = array(
			'iPhone',         // Apple iPhone
			'iPod',           // Apple iPod touch
			//'iPad',			//Apple iPad
			'Android',        // Android
			'dream',          // Pre 1.5 Android
			'CUPCAKE',        // 1.5+ Android
			'blackberry',     // blackberry
			'webOS',          // Palm Pre Experimental
			'incognito',      // Other iPhone browser
			'webmate'         // Other iPhone browser
		);
		// ガラケーで判定したい端末のUAを配列に入れる。
		$mbes = array(
			'DoCoMo',
			'KDDI',
			'DDIPOKET',
			'UP.Browser',
			'J-PHONE',
			'Vodafone',
			'SoftBank',
		);

		// デバイス変数が空だったら判定する
		if(empty($device_info)) {
			// スマートフォン判定
			foreach($spes as $sp) {
				$str = '/'.$sp.'/i';
				// ユーザーエージェントにstrが含まれていたらスマートフォン
				if (preg_match($str,$ua)) {
					$device_info = 'sp';
				}
			}
		}

		// デバイス変数が空だったら判定する
		if(empty($device_info)) {
			// ガラケー判定
			foreach($mbes as $mb) {
				$str = '/'.$mb.'/i';
				// ユーザーエージェントにstrが含まれていたらガラケー
				if (preg_match($str,$ua)) {
					$device_info = 'mb';
				}
			}
		}

		// どの判定にも引っかからなかった場合はPCとする
		if(empty($device_info)) {
			$device_info = 'pc';
		}
		return $device_info;
	}

	$device = is_device();

	if($device == 'sp') {
		//ホスト名も　フルURL
		//echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		//現在のページ自体
		//echo $_SERVER["REQUEST_URI"];

		// ここにスマートフォンだった場合のコンテンツなど
		header('Location: /sp'.$_SERVER["REQUEST_URI"]);
		//exit();
	} elseif($device == 'mb') {
	// ここにガラケーだった場合のコンテンツなど

	  exit;
	} else {
	// どれにも判定されなかった端末(PC)の場合のコンテンツなど

	}
?>