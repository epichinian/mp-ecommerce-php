<?php
	require ('mercadopago.php');
	
	$mp = new MP ("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

	$json_event = file_get_contents('php://input');
	$event = json_decode($json_event);

	$_GET['event'] = $event;

	if ($event->type == 'payment'){
		$payment_info = $mp->get('/v1/payments/'.$event->data->id);
		var_dump($payment_info);
		$_GET['payment'] = $payment_info;
	}