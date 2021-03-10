$( document ).ready(function() {
    //controlamos la opacidad, lo dejamos para más adelante
    /*
    $('#opacitybg').on('change', function() {
        var value_class_icon = $('#description11_icon').attr('class');
        var is_editable = value_class_icon.includes("text-success");

        //vamos a buscar el bg al que daremos opaciodad
        if(is_editable){
            if($('#bgtotal').is(":checked")){
                var bg = $('#description11').parent().parent().attr("style");
                
            }
        }

    });*/
    /*Esta propiedad es importante para que el background sea del tamaño del texto background-clip: content-box;*/

    
    //console.log(array_matriz[0]);

    function componentToHex(c) {
      var hex = c.toString(16);
      return hex.length == 1 ? "0" + hex : hex;
    }

    function rgbToHex(r, g, b) {
      return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
    }

    function controlTexto(val) {
  

        $('#description'+val).on('mouseover', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            //var value_class_icon = $('#description'+val).parent().children(':nth(2)').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            if(is_editable){
                $(this).toggleClass('d-none');
                $('#description'+val+'_input').toggleClass('d-none');
            }
        });
        
        $('#description'+val+'_input').on('mouseout', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");
            if(is_editable){
                $(this).toggleClass('d-none');
                $('#description'+val).toggleClass('d-none');
            }
          
        });

        $('#description'+val+'_input').on('change', function() {
            $('#description'+val).html($('#description'+val+'_input input').val());
        });

        $('#description'+val+'_icon').on('click', function() {
            $(this).toggleClass('text-danger');
            $(this).toggleClass('text-success');
            if($(this).attr('class').includes("text-success")){
                $("#bgenabled").removeAttr("disabled");
                $("#favcolor").removeAttr("disabled");
                $("#sizetext").removeAttr("disabled");
                $("#p-left").removeAttr("disabled");
                $("#p-right").removeAttr("disabled");
                $("#opacitybg").removeAttr("disabled");
                
                if($("#bgenabled").is(":checked")){
                    $('#bgtotal').removeAttr("disabled");
                    $('#bgcolor').removeAttr("disabled");
                }

            }else{
                $("#bgenabled").attr("disabled", true);
                $("#bgtotal").attr("disabled", true);
                $("#favcolor").attr("disabled", true);
                $("#bgcolor").attr("disabled", true);
                $("#sizetext").attr("disabled", true);
                $("#p-left").attr("disabled", true);
                $("#p-right").attr("disabled", true);
                $("#opacitybg").attr("disabled", true);
                if(!$('#description'+val+'_input').attr('class').includes("d-none")){
                    $('#description'+val+'_input').toggleClass('d-none');
                    $('#description'+val).toggleClass('d-none');
                }
            }
            
            
            if($(this).attr('class').includes("text-success")){
                //Esto es para que se seleccione uno u otro texto
                $('#matriz').val();
                var array_matriz = $('#matriz').val().split(",");
                for (var i = 0; i < array_matriz.length; i++) {
                    if(array_matriz[i]!=val){
                        if($('#description'+array_matriz[i]+'_icon').attr('class').includes("text-success")){
                            $('#description'+array_matriz[i]+'_icon').toggleClass('text-success');
                            $('#description'+array_matriz[i]+'_icon').toggleClass('text-danger');
                            //Esto es para que desaparezca el input en caso de que selecciones otro
                            if($('#description'+array_matriz[i]).attr('class').includes("d-none")){
                                $('#description'+array_matriz[i]+'_input').toggleClass('d-none');
                                $('#description'+array_matriz[i]).toggleClass('d-none');
                            }
                        }
                        
                    }
                };

                //Aqui le daremos a los controladores los valores según el texto
                //Tamaño de texto
                //$('#description11').css('font-size'); "14.4px"                
                if($('#description'+val).attr('style')!=undefined){
                    if($('#description'+val).attr('style').includes("font-size")){
                        var posi_rem=$('#description'+val).attr('style').indexOf("rem");
                        var value_rem=$('#description'+val).attr('style').substring(posi_rem-3,posi_rem);
                        $('#sizetext').val(value_rem+'0rem');
                    }
                }else{
                    $('#sizetext').val('0.90rem');
                }
                //paddings
                if($('#description'+val).attr('class')!=undefined){
                    if($('#description'+val).attr('class').includes("pl")){
                        var posi_rem=$('#description'+val).attr('class').indexOf("pl");
                        var value_rem=$('#description'+val).attr('class').substring(posi_rem,posi_rem+4);
                        $('#p-left').val(value_rem);
                    }else{
                        $('#p-left').val('pl-0');
                    }
                    if($('#description'+val).attr('class').includes("pr")){
                        var posi_rem=$('#description'+val).attr('class').indexOf("pr");
                        var value_rem=$('#description'+val).attr('class').substring(posi_rem,posi_rem+4);
                        $('#p-right').val(value_rem);
                    }else{
                        $('#p-right').val('pr-0');
                    }
                }

                //background
                if($('#description'+val).attr('style')!=undefined || $('#description'+val).parent().parent().attr('style')!=undefined){
                    if($('#description'+val).attr('style').includes("background-color")){
                        var rgb=$('#description'+val).css("background-color");
                        var pos1=rgb.indexOf('(');
                        var pos2=rgb.indexOf(')');
                        var values_rgb=rgb.substring(pos1+1,pos2);
                        var array_rgb=values_rgb.split(',');
                        var hexadecimal = 
                        rgbToHex(parseInt(array_rgb[0]), parseInt(array_rgb[1].substring(1)), parseInt(array_rgb[2].substring(1)));
                        $('#bgcolor').val(hexadecimal);
                        $('#bgenabled').prop( "checked", true);
                        $('#bgtotal').prop( "checked", false);
                        $('#bgcolor').attr("disabled", false);
                    }else if($('#description'+val).parent().parent().attr('style')!=undefined && $('#description'+val).parent().parent().attr('style').includes("background-color")){
                        var rgb=$('#description'+val).parent().parent().css("background-color");
                        var pos1=rgb.indexOf('(');
                        var pos2=rgb.indexOf(')');
                        var values_rgb=rgb.substring(pos1+1,pos2);
                        var array_rgb=values_rgb.split(',');
                        var hexadecimal = 
                        rgbToHex(parseInt(array_rgb[0]), parseInt(array_rgb[1].substring(1)), parseInt(array_rgb[2].substring(1)));
                        $('#bgcolor').val(hexadecimal);
                        $('#bgenabled').prop( "checked", true);
                        $('#bgtotal').prop( "checked", true);
                        $('#bgtotal').prop( "disabled", false);
                        $('#bgcolor').attr("disabled", false);
                    }else {
                        $('#bgcolor').val("#212529");
                        $('#bgenabled').prop( "checked", false);
                        $('#bgcolor').attr("disabled", true);
                        $('#bgtotal').prop( "checked", false);
                        $('#bgtotal').prop( "disabled", true);

                    }
                }else{
                    $('#bgcolor').val("#212529");
                    $('#bgenabled').prop( "checked", false);
                    $('#bgcolor').attr("disabled", true);
                    $('#bgtotal').prop( "checked", false);
                    $('#bgtotal').prop( "disabled", true);
                }

                //color
                if($('#description'+val).attr('style')!=undefined){
                    if(($('#description'+val).attr('style').includes("color") && 
                        $('#description'+val).attr('style').includes("background-color")) ||
                        ($('#description'+val).attr('style').includes("color") && 
                            !$('#description'+val).attr('style').includes("background-color"))){
                        var rgb=$('#description'+val).css("color");
                        var pos1=rgb.indexOf('(');
                        var pos2=rgb.indexOf(')');
                        var values_rgb=rgb.substring(pos1+1,pos2);
                        var array_rgb=values_rgb.split(',');
                        var hexadecimal = 
                        rgbToHex(parseInt(array_rgb[0]), parseInt(array_rgb[1].substring(1)), parseInt(array_rgb[2].substring(1)));
                        $('#favcolor').val(hexadecimal);
                    }
                    
                }else{
                    $('#favcolor').val("#212529");
                }

                
            }

        });

        $('#favcolor').on('change', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            if(is_editable){
                $('#description'+val).css("color", $(this).val());
            }
        });

        $('#bgcolor').on('change', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            if(is_editable && $('#bgenabled').is(":checked")){
                if($('#bgtotal').is(":checked")){
                    $('#description'+val).parent().parent().css("background-color", $(this).val());
                    $('#description'+val).css("background-color", "");
                }else{
                    $('#description'+val).css("background-color", $(this).val());
                }
                
            }
        });
        
        
        $('#bgtotal').on('click', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");
            if(is_editable){
                if($('#bgenabled').is(":checked")){
                    if($(this).is(":checked")){
                        $('#description'+val).parent().parent().css("background-color", $('#bgcolor').val());
                        $('#description'+val).css("background-color", "");
                    }else{
                        $('#description'+val).parent().parent().css("background-color", "");
                        $('#description'+val).css("background-color", $('#bgcolor').val());
                    }
                }else{
                    $("#bgtotal").attr("disabled", true);
                }
                
            } 
        });

        $('#bgenabled').on('click', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");
            if(is_editable){
                if(!$(this).is(":checked")){
                    $('#description'+val).parent().parent().css("background-color", "");
                    $('#description'+val).css("background-color", "");
                    $("#bgcolor").attr("disabled", true);
                    if($('#bgtotal').is(":checked")){
                        $('#bgtotal').prop( "checked", false);
                    }
                    $("#bgtotal").attr("disabled", true);
                }else{
                    $('#bgtotal').removeAttr("disabled");
                    $('#bgcolor').removeAttr("disabled");
                    $('#description'+val).css("background-color", $('#bgcolor').val());
                }
            }   
        });


        /*Controlamos las posiciones*/
        $('#up').on('click', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            var align_items=$('#description'+val).parent().parent().parent();
            var align_items_class=align_items.attr('class');
            var is_up = align_items_class.includes("align-items-start");

            if(is_editable && !is_up){
                var array_class = align_items_class.split(" ");
                var value_class_align_items = "";
                for (var i = 0; i < array_class.length; i++) {
                    if(array_class[i].includes('align-items')){
                        value_class_align_items = array_class[i];
                        break;
                    }
                };
                align_items.toggleClass(value_class_align_items);
                align_items.toggleClass('align-items-start');
            }
        });

        $('#center').on('click', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            var align_items = $('#description'+val).parent().parent().parent();
            var align_items_class=align_items.attr('class');
            var is_center_v = align_items_class.includes("align-items-center")

            var justify_content = $('#description'+val).parent().parent();
            var justify_content_class = justify_content.attr('class');
            var is_center_h = justify_content_class.includes("justify-content-center");
            

            if(is_editable && (!is_center_v || !is_center_h)){

                if(!is_center_v){
                    var array_class = align_items_class.split(" ");
                    var value_class_align_items = "";
                    for (var i = 0; i < array_class.length; i++) {
                        if(array_class[i].includes('align-items')){
                            value_class_align_items = array_class[i];
                            break;
                        }
                    };
                    align_items.toggleClass(value_class_align_items);
                    align_items.toggleClass('align-items-center');
                }
                
                if(!is_center_h){
                    var array_class2 = justify_content_class.split(" ");
                    var value_class_justify_content = "";
                    for (var i = 0; i < array_class2.length; i++) {
                        if(array_class2[i].includes('justify-content')){
                            value_class_justify_content = array_class2[i];
                            break;
                        }
                    };
                    justify_content.toggleClass(value_class_justify_content);
                    justify_content.toggleClass('justify-content-center');
                }
                
                if($('#description'+val).parent().attr('class').includes('flex-row-reverse')){
                    $('#description'+val).parent().toggleClass('flex-row-reverse');            
                }
            }

            
            
        });

        $('#down').on('click', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            var align_items=$('#description'+val).parent().parent().parent();
            var align_items_class=align_items.attr('class');
            var is_down = align_items_class.includes("align-items-end");

            if(is_editable && !is_down){
                var array_class = align_items_class.split(" ");
                var value_class_align_items = "";
                for (var i = 0; i < array_class.length; i++) {
                    if(array_class[i].includes('align-items')){
                        value_class_align_items = array_class[i];
                        break;
                    }
                };
                align_items.toggleClass(value_class_align_items);
                align_items.toggleClass('align-items-end');
            }
            
        });

        $('#left').on('click', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            var justify_content = $('#description'+val).parent().parent();
            var justify_content_class=justify_content.attr('class');
            var is_left = justify_content_class.includes("justify-content-start");
            
            
            if(is_editable && !is_left){
                var array_class = justify_content_class.split(" ");
                var value_class_justify_content = "";
                for (var i = 0; i < array_class.length; i++) {
                    if(array_class[i].includes('justify-content')){
                        value_class_justify_content = array_class[i];
                        break;
                    }
                };
                justify_content.toggleClass(value_class_justify_content);
                justify_content.toggleClass('justify-content-start');
                if($('#description'+val).parent().attr('class').includes('flex-row-reverse')){
                    $('#description'+val).parent().toggleClass('flex-row-reverse');            
                }
            }

            
        });

        $('#right').on('click', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            var justify_content = $('#description'+val).parent().parent();
            var justify_content_class=justify_content.attr('class');
            var is_right = justify_content_class.includes("justify-content-end");
            
            
            if(is_editable && !is_right){
                var array_class = justify_content_class.split(" ");
                var value_class_justify_content = "";
                for (var i = 0; i < array_class.length; i++) {
                    if(array_class[i].includes('justify-content')){
                        value_class_justify_content = array_class[i];
                        break;
                    }
                };
                justify_content.toggleClass(value_class_justify_content);
                justify_content.toggleClass('justify-content-end');
                if($('#description'+val).parent().attr('class')=='row'){
                    $('#description'+val).parent().toggleClass('flex-row-reverse');            
                }
            }

            
        });

        $('#center_v').on('click', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            var align_items=$('#description'+val).parent().parent().parent();
            var align_items_class=align_items.attr('class');
            var is_center_v = align_items_class.includes("align-items-center");

            if(is_editable && !is_center_v){
                var array_class = align_items_class.split(" ");
                var value_class_align_items = "";
                for (var i = 0; i < array_class.length; i++) {
                    if(array_class[i].includes('align-items')){
                        value_class_align_items = array_class[i];
                        break;
                    }
                };
                align_items.toggleClass(value_class_align_items);
                align_items.toggleClass('align-items-center');
            }
            
        });

        $('#center_h').on('click', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            var justify_content = $('#description'+val).parent().parent();
            var justify_content_class=justify_content.attr('class');
            var is_center_h = justify_content_class.includes("justify-content-center");
            
            if(is_editable && !is_center_h){
                var array_class = justify_content_class.split(" ");
                var value_class_justify_content = "";
                for (var i = 0; i < array_class.length; i++) {
                    if(array_class[i].includes('justify-content')){
                        value_class_justify_content = array_class[i];
                        break;
                    }
                };
                justify_content.toggleClass(value_class_justify_content);
                justify_content.toggleClass('justify-content-center');
                if($('#description'+val).parent().attr('class').includes('flex-row-reverse')){
                    $('#description'+val).parent().toggleClass('flex-row-reverse');            
                }
            }
            
        });

        /*Control del tamaño del texto*/
        $('#sizetext').on('change', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");

            if(is_editable){
                $('#description'+val).css('font-size',$('#sizetext').val());
            }

        });

        $('#p-left').on('change', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");
            var class_p = $('#description'+val).attr('class');
            var array_class = class_p.split(" ");
            var value_class_padding ="";
            for (var i = 0; i < array_class.length; i++) {
                if(array_class[i].includes('pl-')){
                    value_class_padding = array_class[i];
                    break;
                }
            };
            if(is_editable){
                $('#description'+val).removeClass(value_class_padding);
                $('#description'+val).addClass($(this).val());
            }

        });

        $('#p-right').on('change', function() {
            var value_class_icon = $('#description'+val+'_icon').attr('class');
            var is_editable = value_class_icon.includes("text-success");
            var class_p = $('#description'+val).attr('class');
            var array_class = class_p.split(" ");
            var value_class_padding ="";
            for (var i = 0; i < array_class.length; i++) {
                if(array_class[i].includes('pr-')){
                    value_class_padding = array_class[i];
                    break;
                }
            };
            if(is_editable){
                $('#description'+val).removeClass(value_class_padding);
                $('#description'+val).addClass($(this).val());
            }

        });

        
    }

    $('#matriz').val();

    var array_matriz = $('#matriz').val().split(",");
    for (var i = 0; i < array_matriz.length; i++) {
        controlTexto(array_matriz[i]);
    };
    



});