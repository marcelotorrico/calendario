$(document).on('ready',function(){
    $("#fechaInicioE").datepicker({
        minDate: "-0D",
        onSelect: function(){
            var lockDate = new Date($('#fechaInicioE').datepicker('getDate'));
            $('input#fechaFinalE').datepicker('option', 'minDate', lockDate);
        }
     });
     $("#fechaFinalE").datepicker({
        minDate: "-0D"
    });
});
