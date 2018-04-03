<?php
return array(
	//----------------------------
	// set your paypal credential
	//----------------------------

	'client_id' =>'AdQswHD5_Lstp0wxzBO4XDG03dxAeNo8LnPbQg-YVaawJPO55H2j_ZQl00PEzj-228ULsonTI7Io3o4Q',
	'secret' => 'EMd_6I63bxPy-9k1hn_-8du-3mydacNolVoi8S2O5Og3lJhQQ1yDGLS01DxjqESbXbfCqBd0-hnFM5qp',

	//----------------
	// SDK Setup
	//---------------

	'settings' => array(

	// Set Paypal Mode 2 option 'Live' or 'sandbox'

	'mode' => 'sandbox',

	// Set maximum request time

	'http.ConnectionTimeOut' => 1000,

	// Set log Enabled or not

	'log.LogEnabled' => true,

	// Specify the file that want to write on

	'log.FileName' => storage_path() . '/logs/paypal.log',

	//-----------------------------------------------------------------
	//Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
	//Logging is most verbose in the 'FINE' level and decreases as you
	//-----------------------------------------------------------------

	'log.LogLevel' => 'FINE'
	),
);
?>
