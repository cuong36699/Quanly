$(document).ready(function(){ 
 $(".union").change(function(){
  if (this.value == '1') {
                  // alert("abcasdasd");
                  $("#union_member").append('<div class="abc form-group row"><label class="col-md-5 control-label fontchu">Ngày vào đoàn:</label><div class="col-sm-12"><input class="form-control" type="date" name="date_union_member"></div></div>');
              }else if (this.value == '0'){
                  $(".abc").remove();
              }
          })
})
// 
$(document).ready(function(){ 
 $(".adherer").change(function(){
  if (this.value == '1') {
                  // alert("abcasdasd");
                  $("#adherer_member").append(' <div class="abcd form-group row"><label class="col-md-5 control-label fontchu">Ngày vào đảng:</label><div class="col-sm-12"><input class="form-control" type="date" name="date_adherer_member"></div></div>')
              }else if (this.value == '0'){
                  $(".abcd").remove();
              }
          })
})