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



$(document).ready(function(){
//    backToTop.init();
//    $("img.lazy").lazyload({
//    effect : "fadeIn",
//    failure_limit : 10,
//    skip_invisible : true
//    threshold : 200
//});
//$(document).backToTop();
});
$('[data-role=page]').on('pageshow', function (event, ui) {
    $("img.lazy").show().lazyload();
});


$(window).scroll(function() {
        if($(this).scrollTop() >= 50) {
            $('#backToTop').fadeIn();    
        } else {
            $('#backToTop').fadeOut();
        }
    });
 
    $(document).on('click', '#backToTop', function() {
        try{$("html, body").animate({scrollTop:0},800);return true;}
            catch(error){console.log(error);}
        try{$("body").animate({scrollTop:0},800);return true;}
            catch(error){console.log(error);}
        try{ window.scrollTo(0,0);}
            catch(error){console.log(error);}
//        return false;
//        return false;
    });    
    $(document).on('click', '#toTop', function() {
        $('body,html').animate({scrollTop:0},800);
        return false;
    });    
    
    $(document).on('pageshow',  function() {
          // disable previous selected links
          $('[data-role=navbar] a').removeClass("ui-btn-active");
          // select link
          var menuLink = $('[data-role=navbar] a[href="#'+$.mobile.activePage.attr('id')+'"]');
          menuLink.addClass("ui-btn-active");
    });  
