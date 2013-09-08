function get_dimensions() 
{
	var dims = {width:0,height:0};
	
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    dims.width = window.innerWidth;
    dims.height = window.innerHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    dims.width = document.documentElement.clientWidth;
    dims.height = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    dims.width = document.body.clientWidth;
    dims.height = document.body.clientHeight;
  }
  
  return dims;
}

function set_feedback(text, classname, keep_displayed)
{
	if(text!='')
	{
		$('#feedback_bar').removeClass();
		$('#feedback_bar').addClass(classname);
		$('#feedback_bar').text(text);
		$('#feedback_bar').css('opacity','1');

		if(!keep_displayed)
		{
			$('#feedback_bar').fadeTo(5000, 1);
			$('#feedback_bar').fadeTo("fast",0);
		}
	}
	else
	{
		$('#feedback_bar').css('opacity','0');
	}
}

function capitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function saveVoto(lugar_id)
{
     $.ajax({
       type: "POST",
       url: 'mobil/save_vote',
       data: {"id_lugar":lugar_id, 'voto':1},
       
       success: function(msg){
           if(msg.success==true)
            alert( "Su Voto ha sido registrado"); //Anything you want
        else
            alert("Fallo al registrar su voto. Error "  + msg);
       },
       dataType:'json'
     });    
}


$(document).on('change', 'select#oferta_select', function() {
    deg(this);
});
function deg(obj) {
    var val = obj.value;
    jQuery.ajax({url: 'mobil/get_lugares/',
        data: {id: val},
        type: 'post',
        success: function(output) {
            var el = $('select#lugar_select');
            el.empty();
            el.append('<option value=0>Escoja un lugar...</option>');
            $.each(output, function() {
                var opt = '<option value="' + this.id + '">' + this.nombre + '</option>';
                el.append(opt);
            });
            $('select#lugar_select').selectmenu('refresh');
        },
        dataType: "json"
    });
}

//scrip ts flex slider
//TOP
//            $(window).scroll(function(){
//if (window.pageYOffset >= 1500) {
//$('#scroll-up:not(:visible)').fadeIn();
//} else {
//$('#scroll-up:visible').fadeOut();
//}
//}); 

var backToTop = {
    init: function() {
//                $('html, body').append('<a href="" id="backToTop" data-role="button"   data-corners="false" data-icon="arrow-u" data-theme="b">Back to top</a>');

        var section2 = '<a href="" id="backToTop" data-role="button"   data-corners="false" data-icon="arrow-u" data-theme="b">Back to top</a>';
        myClone2 = $(section2);
        myClone2.appendTo("html").trigger('create');
        $('#backToTop').click(backToTop.click);
//                $(window).bind('scrollstart', backToTop.scrollStart);
//                $(window).bind('scrollstop', backToTop.scrollStop);
        $(window).on('scrollstart', backToTop.scrollStart);
        $(window).on('scrollstop', backToTop.scrollStop);
//                $('body').trigger('create');
//                $('#oferta').trigger('pagecreate');
    },
    click: function() {
        $('html, body').animate({scrollTop: 0}, 400);
    },
    scrollStart: function() {
        $('#backToTop').hide();
    },
    scrollStop: function() {
        var windowHeight = $(window).height();
        if (window.pageYOffset > windowHeight) {
            $('#backToTop').fadeIn('slow');
        }
    }
};
$(document).on('pagecreate', '#home', function(event, ui) {
    backToTop.init();
});

//$('body').on('pageinit', '#atractivos', function( evt, ui ) {
//    $("#atractivos").lazyloader();
//    $.mobile.lazyloader.prototype.timeoutOptions.mousewheel = 300;
//    $.mobile.lazyloader.prototype.timeoutOptions.scrollstart = 700;
//    $.mobile.lazyloader.prototype.timeoutOptions.scrollstop = 100;
//    $.mobile.lazyloader.prototype.timeoutOptions.showprogress = 100;
//});
$(document).ready(function(){
//$("img.lazy").lazyload(
//        {effect : "fadeIn"});
//});
//$('body').on('pageinit', '#atractivos', function( evt, ui ) {
$("img.lazy").lazyload({
    effect : "fadeIn",
    failure_limit : 10,
//    skip_invisible : true
//    threshold : 200
});
$("img.lazy").show().lazyload();
});