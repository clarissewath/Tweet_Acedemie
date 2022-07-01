
$('#content-following').hide();

$("#followers").click(function() {
  $('#followers').attr("attr", "active");
  $('#following').removeAttr("attr");
  $("#content-following").hide();
  $("#content-followers").show();
})

$("#following").click(function() {
    $('#following').attr("attr", "active");
    $('#followers').removeAttr("attr");
    $("#content-followers").hide();
    $("#content-following").show();
})