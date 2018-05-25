$(function(){
	var fx={
		'inHModal':function(){
			if($('.modal-window').length==0){
			$('<div>').attr('id','jquery-overlay').fadeIn('slow').appendTo('body');
				return $('<div>').addClass('modal-window').appendTo('body');
			}else{
				return $('modal-window')
			}

		}
	}
	$('.tovar').bind('click',function(e){
			e.preventDefault();
			data=$(this).attr('data-id');
			modal = fx.inHModal();
			$('<a>').attr('href','#').addClass('modal-close-btn').html('&times').click(function(event){
				event.preventDefault();
				modal.remove();
				$('#jquery-overlay').remove();
			}).appendTo(modal);
			$.ajax({
				'type':'POST',
				'url':'ajax.php',
				'data':'id='+data,
				'success':function(data){
					modal.append(data);
				},
				'error':function(msg){
				modal.append(msg);
				}
		});
	})
})