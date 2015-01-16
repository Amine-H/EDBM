$(document).ready(function(){
    $('#langs').change(function(){
        window.location='/lang/'+$('#langs').val();
    });
});