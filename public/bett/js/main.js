var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

$(document).ready(function(){



//init func`s
dropdownFunc();

});
//$(document).ready * end

//$(window).load
$(window).load(function(){



//init func`s
bannerSideSticky();
popupbase();
listdropdownFunc();

});
//$(window).load * end

//
function dropdownFunc(){
	$('.js-dropdown-button').click(function(){
		var dropdownButton = $(this);
		var activeClass = '_active';
		var activeNoanimateClass = '_show';
		var dropdownContent = $('#' + dropdownButton.attr('aria-controls'));

		if(!dropdownButton.hasClass(activeClass)){
			dropdownButton.addClass(activeClass).attr('aria-expanded', 'true');
			if(!dropdownContent.hasClass('_noanimate')){
				dropdownContent.addClass(activeClass).stop(true,true).slideDown(250).attr('aria-hidden', 'false');
			}
			else if(dropdownContent.hasClass('_noanimate')){
				dropdownContent.addClass(activeNoanimateClass).attr('aria-hidden', 'false');
			}
		}
		else{
			dropdownButton.removeClass(activeClass).attr('aria-expanded', 'false');
			if(!dropdownContent.hasClass('_noanimate')){
				dropdownContent.removeClass(activeClass).stop(true,true).slideUp(250).attr('aria-hidden', 'true');
			}
			else if(dropdownContent.hasClass('_noanimate')){
				dropdownContent.removeClass(activeNoanimateClass).attr('aria-hidden', 'true');
			}
		}
		return false
	})
}

//
function bannerSideSticky(){
	var bannerBlock = $('.js-bannerSideSticky');
	var bannerAnchor = $('.bannerSideSticky-anchor');
	var bannerWork;

	if(!bannerBlock.find('.sidespot').eq(1).is(':hidden')){
		bannerWork = bannerBlock.find('.sidespot').eq(1);
	}
	else if(!bannerBlock.find('.sidespot').eq(2).is(':hidden')){
		bannerWork = bannerBlock.find('.sidespot').eq(2);
	}
	// else if(!bannerBlock.find('.sidespot').eq(3).is(':hidden')){
	// 	bannerWork = bannerBlock.find('.sidespot').eq(3);
	// }
	// else{

	// }
	// console.log(bannerWork.index());

	var bannerWorkHeight = bannerWork.innerHeight();
	var bannerAnchorPos = bannerAnchor.offset().top;
	var footerPos = $('.footer').offset().top - $(window).height();
	$(window).resize(function(){
		bannerAnchorPos = bannerAnchor.offset().top;
	});
	$(window).scroll(function(){
		if($('.bannerSideSticky-sticky').get(0)){
			bannerAnchorPos = bannerAnchor.offset().top + bannerWorkHeight;
		}
		else{
			bannerAnchorPos = bannerAnchor.offset().top;
		}
		// console.log('start ' + bannerAnchorPos);//detect bannerAnchorPos
		var scrollWInTop = $(this).scrollTop();
		if(scrollWInTop > bannerAnchorPos && scrollWInTop < footerPos){
			bannerWork.addClass('bannerSideSticky-sticky');
			// console.log('add ' + bannerAnchorPos);//detect bannerAnchorPos
		}
		else if(scrollWInTop <= bannerAnchorPos){
			bannerWork.removeClass('bannerSideSticky-sticky');
			// console.log('remove ' + bannerAnchorPos);//detect bannerAnchorPos
		}
		else if(scrollWInTop > footerPos){
			bannerWork.removeClass('bannerSideSticky-sticky');
			// console.log('remove ' + bannerAnchorPos);//detect bannerAnchorPos
		}
	});
}

//
function popupbase(){
	$(document).on('click', '.popupbase-link', function(){
		popupbaseShow($(this).attr('data-popupbase'));
		return false
	});

	//.popupbase-close
	$(document).on('click', '.popupbase-close', function(){
		$('.popupbase-view').removeClass('popupbase-view');
		if($('.mode-blur').get(0)){
			$('.mode-blur').removeClass('mode-blur');
		}
		return false
	});

	$(document).on('keyup', function(e){
		if(e.keyCode == 27){
			$('.popupbase-close').click();
		}
	});
}
function popupbaseShow($popupitem){
	$('.popupbase-close').click();
	$('#page').addClass('mode-blur');
	var popupbaseData = $popupitem,
		popupbaseActive = $('.popupbase.' + popupbaseData);
	if($('.' + popupbaseData).get(0)){
		$('body').addClass('popupbase-view');
		popupbaseActive.addClass('popupbase-view');
	}
}

//
function listdropdownFunc(){
    $('.js-listdropdown__button').click(function(){
        var parentBlock = $('#' + $(this).attr('aria-controls'));
        parentBlock.addClass('_show');
        return false
    })
}

}
/*
     FILE ARCHIVED ON 06:30:52 Aug 28, 2019 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 09:17:14 Oct 01, 2020.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  LoadShardBlock: 130.772 (3)
  RedisCDXSource: 9.179
  esindex: 0.011
  captures_list: 162.067
  exclusion.robots.policy: 0.118
  exclusion.robots: 0.128
  CDXLines.iter: 19.262 (3)
  PetaboxLoader3.resolve: 149.031 (2)
  PetaboxLoader3.datanode: 150.861 (5)
  load_resource: 252.032 (2)
*/