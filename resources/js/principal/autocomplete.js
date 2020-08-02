import 'jquery-ui/ui/widgets/autocomplete.js';

$( "#search" ).autocomplete({
    source: function(request, response){
        $.ajax({
            url: "api/search/autocomplete",
            data: {
                term: request.term
            },
            dataType: "json",
            success: function( data ) {
                response(data)
            },
            
        });
    },
    select: function(event, ui){
        //alert(ui.item.slug);
        
        switch (ui.item.type) {
            case 'curso':
                $(location).attr('href','cursos/' + ui.item.slug);
                break;

            case 'manual':
                $(location).attr('href','manuales/' + ui.item.slug);
                break;

            case 'post':
                $(location).attr('href','blog/' + ui.item.slug);
                break;

            default:
                break;
        }


        
    }
})