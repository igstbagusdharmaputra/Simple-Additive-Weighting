<?php
if(!function_exists('atribut')){
    function atribut(){
        return [
            'cost' => 'cost',
            'benefit' => 'benefit'
        ];
    }
}
if(!function_exists('msg')){
	function msg($msg, $type = 'info', $class = 'mt-5'){
		return '
			<div class="'.$class.' alert alert-'.$type.' alert-dismissible fade show" role="alert">'.
				$msg.
				'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
				'<span aria-hidden="true">&times;</span>'.
			'</div>';
	}
}
if(!function_exists('getKelamin')){
	function getKelamin(){
		return [
			'laki-laki' => 'Laki-laki',
			'perempuan'  => 'Perempuan',
		];
	}
}
if(!function_exists('getBobot')){
	function getBobot(){
		return [
			'0.2' => 'Sangat Rendah',
            '0.4' => 'Rendah',
            '0.6' => 'Sedang',
            '0.8' => 'Tinggi',
            '1' => 'Sangat Tinggi'
		];
	}
}