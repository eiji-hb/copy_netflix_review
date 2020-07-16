$(function(){
  //range_field
    $("#review").on('mousemove',function(){
      var newValue = $('#review').val();
      $("#number").html(newValue);
      // console.log(newValue);
    })
  });