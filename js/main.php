<?php
echo '<script>';

echo "$(document).ready(function(){
    $('.tooltips-general').tooltip('hide');
    $('.mobile-menu-button').on('click', function(){
        var mobileMenu=$('.navbar-lateral');	
        if(mobileMenu.css('display')=='none'){
            mobileMenu.fadeIn(300);
        }else{
            mobileMenu.fadeOut(300);
        }
    });
    $('.dropdown-menu-button').on('click', function(){
        var dropMenu=$(this).next('ul');
        dropMenu.slideToggle('slow');
    });
    $('.exit-system-button').on('click', function(e){
        e.preventDefault();
        var LinkExitSystem=$(this).attr(\"data-href\");
        swal({
            title: '".$language['ESB_title']."',
            text: '".$language['ESB_text']."',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: \"#5cb85c\",
            confirmButtonText: '".$language['ESB_confirm']."',
            cancelButtonText: '".$language['ESB_cancel']."',
            animation: \"slide-from-top\",
            closeOnConfirm: false 
        },function(){
            window.location=LinkExitSystem; 
        });  
    });
    $('.btn-help').on('click', function(){
        $('#ModalHelp').modal({
            show: true,
            backdrop: \"static\"
        });
    });
});
(function($){
    $(window).load(function(){
        $(\".custom-scroll-containers\").mCustomScrollbar({
            theme:\"dark-thin\",
            scrollbarPosition: \"inside\",
            autoHideScrollbar: true,
            scrollButtons:{ enable: true }
        });
    });
})(jQuery);";

echo '</script>';
?>