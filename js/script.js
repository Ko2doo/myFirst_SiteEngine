function post_query( url, name, data ) {
    //запишем переменную в которую будем записывать
    // данные из адресной строки
    var str = '';

    $.each( data.split('.'), function(k, v) {
      str += '&' + v + '=' + $('#' + v).val();
    });

    $.ajax({
      url: '/' + url,
      type: 'POST',
      data: name + '_f=1' + str,
      cache: false,
      success: function(result) {

        obj = $.parseJSON( result );
        
        if ( obj.go ) go( obj.go );
        else alert( obj.message );
      }
    

    });



} //end function

  function go( url ) {
    window.location.href='/' + url;
  }