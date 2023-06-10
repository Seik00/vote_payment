$( document ).ready(function() {
	var viewport = document.querySelector("meta[name=viewport]");
    viewport.setAttribute("content", viewport.content + ", height=" + window.innerHeight+"px");
	
	$(document).on('click', '#qrcodeshare', function() {
		openqrcodeshare();
	})
	
	$(document).on('click', 'button.btn-copy', function() {
		copy();
	})
});
function gameupdate() {
	$.get('gameupdate', function($data) {
		$data = JSON.parse($data);
		
		var $gameHtml = '';
		
		$.each($data['games'], function($index, $value) {
			$gameHtml += '<div class="row no-gutters"><div class="col-4 col-sm-6 col-lg-9"><div class="text-adjust">'+$value['name']+'</div></div><div class="col-3 col-sm-3 col-lg-1 text-right"><div class="text-adjust" style="padding-right:5px;">'+$value['point']+'</div></div><div class="col-5 col-sm-3 col-lg-2"><div class="float-right"><button type="button" class="btn-out btn btn-gold" data-gameid="'+$value['id']+'">Out</button><button type="button" class="btn-in btn btn-gold" data-gameid="'+$value['id']+'">In</button></div></div></div>';
		})
		
		if ($gameHtml != '') {
			$('.game-profile-lists').html($gameHtml);
		}
		
		$('#user_main_wallet').html($data['point']['point']);
		$('#user_referral_wallet').html($data['point']['point2']);
	})
}
function dogameIn($form) {
	$('#gamein-submit').prop('disabled', true);
			
	$.post('gamein', $($form).serialize(), function($data) {
		var $data = JSON.parse($data);
		
		if ($data['status'] == 'ok') {
			$('#smessage').show().html($data['message']);
		} else {
			$('.error-message').html('<label id="amount-error" class="error" for="amount">'+$data['message']+'</label>');
		}
	})
	.fail(function() {
		alert('Request error!');
	})
	.always(function() {
		$('#gamein-submit').prop('disabled', false);
		gameupdate();
	});
}
function dogameOut($form) {
	$('#gameout-submit').prop('disabled', true);
			
	$.post('gameout', $($form).serialize(), function($data) {
		var $data = JSON.parse($data);
		
		if ($data['status'] == 'ok') {
			$('#smessage').show().html($data['message']);
		} else {
			$('.error-message').html('<label id="amount-error" class="error" for="amount">'+$data['message']+'</label>');
		}
	})
	.fail(function() {
		alert('Request error!');
	})
	.always(function() {
		$('#gameout-submit').prop('disabled', false);
		gameupdate();
	});
}
function gameIn($t) {
	var $gameId = $($t).data('gameid');
	
	$('#gameModal .content').html('');
	$('#gameModal .loading-text').show();
	$('#gameModal').modal('show');
	
	$.get('gamein?game_id='+$gameId, function($data) {
		$('#gameModal .content').html($data);
	})
	.fail(function() {
		$('#gameModal .content').html('Error: 404');
	})
	.always(function() {
		$('#gameModal .loading-text').hide();
	});
}
function gameOut($t) {
	var $gameId = $($t).data('gameid');
	
	$('#gameModal .content').html('');
	$('#gameModal .loading-text').show();
	$('#gameModal').modal('show');
	
	$.get('gameout?game_id='+$gameId, function($data) {
		$('#gameModal .content').html($data);
	})
	.fail(function() {
		$('#gameModal .content').html('Error: 404');
	})
	.always(function() {
		$('#gameModal .loading-text').hide();
	});
}
function copy() {
	var copyText = document.getElementById("referrallink");
	copyText.select();
	copyText.setSelectionRange(0, 99999);
	document.execCommand("copy");
}
function openqrcodeshare() {
	$('#qrshareModal .content').html('');
	$('#qrshareModal .loading-text').show();
	$('#qrshareModal').modal('show')
	
	$.get($app.getreferrallink , function($data) {
		
		if ($data == 'login') {
			
		} else {
			$('#qrshareModal .content').html($data);
			
			setTimeout(function(){ 
				window.__sharethis__.initialize();
			}, 400);
		}
	})
	.fail(function() {
		$('#qrshareModal .content').html('Error: 404');
	})
	.always(function() {
		$('#qrshareModal .loading-text').hide();
	});
}
function showBalance($wallet) {
	if ($wallet == 0) {
		$("#wallet_0").show();
		$("#wallet_100").hide();
	} else if ($wallet == 100) {
		$("#wallet_0").hide();
		$("#wallet_100").show();
	}
}