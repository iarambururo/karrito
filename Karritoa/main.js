 $(window).click(function(){
  $.ajax({url: "lista.php", success: function(result){
    $("#lista").html("");
    for (var i = result.length - 1; i >= 0; i--) {
    	$("#lista").append(result[i][0]);
    }   
  }});
 });
