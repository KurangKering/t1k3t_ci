$(function(){
	$('#nta, #harga_jual, #up_salling, #profit_1, #fee, #adm_fee, #profit_2, #jumlah, #hpp, #invoice').priceFormat({
		prefix: '',
		
		centsLimit: 0,
		thousandsSeparator: '.'
	});
});