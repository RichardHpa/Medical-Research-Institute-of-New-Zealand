$ = jQuery;

$(document).ready(function(){

    var fieldParents = $('.conditionalField').parents('.postbox');
    fieldParents.hide();
    var inputs = $('.conditionalField');
    inputs.each(function(i, input){
        if($(this).data('condition') == formatObject['format']){
            $(this).parents('.postbox').show();
        }
    });

    $(document).on('change','#post-format-selector-0', function(){
        var value = $(this).val();
        var inputs = $('.conditionalField');
        inputs.each(function(i, input){
            console.log($(this).data('condition'));
            if($(this).data('condition') == value){
                console.log("match");
                $(this).parents('.postbox').fadeIn();
            } else {
                $(this).parents('.postbox').hide();
                $(this).find('input').val('');
            }
        })
    });

})
