	$(function(){
	$('.news a').bind({
		'mouseover' : function(){
			url=$(this).attr('data-url');
			title = $(this).attr('data-title');
			$('.news').css('background','url('+url+')');
		},
		'mouseout' : function(){
			$('.news').css('background','url(media/img/fruits.jpg)');
		}
	})
}
)