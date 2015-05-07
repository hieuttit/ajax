var is_busy = false;
var page = 1;
var stopped = false;

$(document).ready(function() {
	// Keo scroll thi xu ly
	$(window).scroll(function() {
		$element = $('#content');
		$loadding = $('#loadding');
		
		// Neu man hinh dang o cuoi the thi thuc hien ajax
		if($(window).scrollTop() + $(window).height() >= $element.height()) {
			// neu dang gui ajax thi stop
			if(is_busy == true) {
				return false;
			}
			// neu het du lieu thi stop
			if(stopped == true) {
				return false;
			}
			
			is_busy = true;
			page++;
			
			// Hien thi loadding
			$loadding.removeClass('hidden');
			$.ajax({
				type	:	'get',
				dataType:	'text',
				data	:	{page : page},
				url		:	'2data.php',
				success	:	function(result) {
					$element.append(result);
				}
			}).always(function(){
				$loadding.addClass('hidden');
				is_busy = false;
			});
			return false;
		}
	});
});