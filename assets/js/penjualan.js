
$(function() {
	
	var q       = clearNumber($('#q').val());
	var hpp     = clearNumber($('#hpp').val());
	var invoice = clearNumber($('#invoice').val());
	var fee     = clearNumber($('#fee').val());
	var persen  = parseFloat($('#persen').val() / 100 );
	doCount(q, hpp, invoice, fee, persen);
	count();


});
function clearNumber(element) 
{
	if (element == 0) {
		return 0;
	}
	var result = element.replace(/\D/g, '');
	return result;
}
function count()
{
	$('.input-change').on('input change paste', function() 
	{
		var q       = clearNumber($('#q').val());
		var hpp     = clearNumber($('#hpp').val());
		var invoice = clearNumber($('#invoice').val());
		var fee     = clearNumber($('#fee').val());
		var persen  = parseFloat($('#persen').val() / 100 );
		doCount(q, hpp, invoice, fee, persen);
	});
}
function doCount(q, hpp, invoice, fee, persen){
	var nta = parseInt(parseInt(hpp) * parseFloat(persen));
	var harga_jual = parseInt(hpp) + parseInt(nta);
	var up_salling = parseInt(invoice) - parseInt(harga_jual);
	var profit_1 = parseInt(nta) + parseInt(up_salling);
	var adm_fee = parseInt(fee) * parseInt(q);
	var profit_2 = parseInt(profit_1) - parseInt(adm_fee);
	var jumlah = parseInt(hpp) + parseInt(adm_fee);


	$('#nta').val(nta);
	$('#harga_jual').val(harga_jual);
	$('#up_salling').val(up_salling);
	$('#profit_1').val(profit_1);
	$('#adm_fee').val(adm_fee);
	$('#profit_2').val(profit_2);
	$('#jumlah').val(jumlah);

	formatuang();
}

function formatuang()
{
	$('.format-uang').priceFormat({
		centsLimit: 0,
		clearPrefix: true,
		prefix: '',
		thousandsSeparator: '.',
		allowNegative: true,

	});

}
