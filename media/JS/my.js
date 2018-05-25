	$(function(){
	$('.topmenu a').bind({
		'mouseover' : function(){
			url=$(this).attr('data-url');
			title = $(this).attr('data-title');
			$('.header').css('background','url('+url+')');
			$('.logotext').text(title);
		},
		'mouseout' : function(){
			$('.header').css('background','url(media/img/razrabotka.png)');
		text='Разработка и оптимизация';
		$('.logotext').text(text);
		}
	})
}
)