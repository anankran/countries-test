$(document).ready(function(){

  $('#button').on('click',function(){
    $(this).html('Loading...');
    $.ajax({
      url: '/ajax/country/all',
      dataType: "JSON",
      success: function(data){
        var newValue;
        var html = '';
        $.each(data, function(key,value){
          if(value !== '' && value !== undefined){
            newValue = value.split(',');
            if(newValue[0] !== '' && newValue[0] !== undefined && newValue[1] !== '' && newValue[1] !== undefined){
              html += '<tr>';
              html += '<td>'+newValue[0].split('"').join('')+'</td>';
              html += '<td>'+newValue[1]+'</td>';
              html += '</tr>';
            }
          }
        });
        $('#button').hide();
        $('table tbody').html(html);
        $('table,#export').fadeIn();
      }
    });
  });

  $('#export').on('click',function(){
    window.open('/cache/countries.csv');
  });

});
