function add_agent() {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="agent/add_agent">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Agent Code</label>";
  data += '<input type="text" name="agent_code" class="form-control" required="required">';

  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Add Agent");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}

del_bill_test
//edit doctor
function edit_agent(id) {
  $.ajax({
    url: "agent/edit_agent",
    type: "post",
    data: { agent_id: id },
    success: function (data) {
      $(".Bsmall-modal-title").text("Edit Agent");
      $("#smallModal_body").html(data);
      $("#smallModal").modal("show");
    },
  });
}

//delete doctor
function del_agent(id) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="agent/del_agent">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the Agent?</label>";
  data += '<input type="hidden" name="agent_id" value="' + id + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete agent");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}



//add doctor
function add_collector() {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="collectors/add_collector">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Collector Name</label>";
  data += '<input type="text" name="sample_collected_name" class="form-control" required="required">';
  
  data += "<label>Address </label>";
  data += '<input type="text" name="sample_address" class="form-control" required="required">';
  
  data += "<label>Contact</label>";
  data += '<input type="text" name="sample_contact" class="form-control" required="required">';

  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Add Collector");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}


//edit doctor
function edit_collector(id) {
  $.ajax({
    url: "collectors/edit_collector",
    type: "post",
    data: { sample_collected_id: id },
    success: function (data) {
      $(".Bsmall-modal-title").text("Edit Collector");
      $("#smallModal_body").html(data);
      $("#smallModal").modal("show");
    },
  });
}

//delete doctor
function del_collector(id) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="collectors/del_collector">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the Collector?</label>";
  data += '<input type="hidden" name="sample_collected_id" value="' + id + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete Collector");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}


//add doctor
function add_doctor() {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="doctor/add_doctor">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Doctor Name</label>";
  data += '<input type="text" name="doctor_name" class="form-control" required="required">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Add Doctor");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}

//edit doctor
function edit_doctor(id) {
  $.ajax({
    url: "doctor/edit_doctor",
    type: "post",
    data: { doctor_id: id },
    success: function (data) {
      $(".Bsmall-modal-title").text("Edit Doctor");
      $("#smallModal_body").html(data);
      $("#smallModal").modal("show");
    },
  });
}
//delete doctor
function del_doctor(id) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="doctor/del_doctor">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the Doctor?</label>";
  data += '<input type="hidden" name="doctor_id" value="' + id + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete Doctor");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}

//add test
function add_test(n) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="tests/add_test">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Test Name</label>";
  data += '<input type="text" name="test_name" class="form-control" required="required">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Add Test");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}

//edit test
function edit_test(id) {
  $.ajax({
    url: "tests/edit_test",
    type: "post",
    data: { test_id: id },
    success: function (data) {
      $(".Bsmall-modal-title").text("Edit Test");
      $("#smallModal_body").html(data);
      $("#smallModal").modal("show");
    },
  });
}

//delete test
function del_test(id) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="tests/del_test">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the Test?</label>";
  data += '<input type="hidden" name="test_id" value="' + id + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete Doctor");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}


//delete bill
function del_bill(id) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="bill/delete_bill">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the Test?</label>";
  data += '<input  type="hidden" name="bill_id" value="' + id + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete Bill");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}

//add lab
function add_lab() {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="lab/add_lab">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Lab Name</label>";
  data += '<input type="text" name="lab_name" class="form-control" required="required">';
  data += "</div>";
  // data += '<div class="row form-group">';
  // data += "<label>Picture</label>";
  // data += '<input type="file" name="lab_picture" class="form-control" required="required">';
  // data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Add Lab");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}

//edit lab
function edit_lab(id) {
  $.ajax({
    url: "lab/edit_lab",
    type: "post",
    data: { lab_id: id },
    success: function (data) {
      $(".Bsmall-modal-title").text("Edit Lab");
      $("#smallModal_body").html(data);
      $("#smallModal").modal("show");
    },
  });
}

//delete lab
function del_lab(id) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="lab/del_lab">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the Lab?</label>";
  data += '<input type="hidden" name="lab_id" value="' + id + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete Lab");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}

//selecting a test
function test_select1() {
  var x = $("#test_select").val();

  $.ajax({
    url: "tests/search_test_cost",
    type: "post",
    data: { test_id: x },
    success: function (data) {
      $("#sub_total").html(data);
      var disc = $("#percent_discount").val();
      var total = Number(data) + Number($("#collection_charge").val());
      total = Math.floor(total - (Number(total * disc))/100);
  
      //var inWords = numberToWords(total);
    
      $("#total").html(total);
      //$("#toWords").html(inWords);
    },
  });
}

function calculateBill(){
  var subTotalPrice = 0;
  var allPrice = $('.test_price');
  allPrice.each(function(element) {
    var price = $( this ).val();
    subTotalPrice = Number(subTotalPrice)+ Number(price);
    $("#sub_total").empty().html(subTotalPrice);
    var disc = $("#percent_discount").val();
    var total = Number(subTotalPrice) + Number($("#collection_charge").val());
    total = Math.floor(total - (Number(total * disc))/100);
  
    //var inWords = numberToWords(total);
  
    $("#total").html(total);
    //$("#toWords").html(inWords);
  }); 
}

//collection charge add to bill
function collection_change() {
  var data = $("#sub_total").html();
  var disc = $("#percent_discount").val();
  var collection = $("#collection_charge").val();

  var total = Number(data) + Number(collection);
  total = Math.floor(total - (Number(total * disc))/100);
  
  //var inWords = numberToWords(total);

  $("#total").html(total);
  //$("#toWords").html(inWords);
}

//discount add to bill
function percent_discount1() {
  var data = $("#sub_total").html();
  var disc = $("#percent_discount").val();
  var collection = $("#collection_charge").val();

  var total = Number(data) + Number(collection);
  total = Math.floor(total - (Number(total * disc))/100);

  //var inWords = numberToWords(total);

  $("#total").html(total);
  //$("#toWords").html(inWords);

}

// function numberToWords(number) {  
//   var digit = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];  
//   var elevenSeries = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];  
//   var countingByTens = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];  
//   var shortScale = ['', 'thousand', 'million', 'billion', 'trillion'];  

//   number = number.toString(); 
//   number = number.replace(/[\, ]/g, ''); 
//   if (number != parseFloat(number)) return 'not a number'; 
//   var x = number.indexOf('.'); 
//   if (x == -1) x = number.length; 
//   if (x > 15) return 'too big'; 
//   var n = number.split(''); 
//   var str = ''; 
//   var sk = 0; 
//   for (var i = 0; i < x; i++) { 
//     if ((x - i) % 3 == 2) { 
//       if (n[i] == '1') { 
//         str += elevenSeries[Number(n[i + 1])] + ' '; i++; sk = 1; 
//       } else if (n[i] != 0) { 
//         str += countingByTens[n[i] - 2] + ' '; sk = 1; 
//       } 
//     } else if (n[i] != 0) { 
//       str += digit[n[i]] + ' '; if ((x - i) % 3 == 0) str += 'hundred '; sk = 1; 
//     } 
//     if ((x - i) % 3 == 1) { 
//       if (sk) str += shortScale[(x - i - 1) / 3] + ' '; sk = 0; 
//     } 
//   } 
//   if (x != number.length) { 
//     var y = number.length; 
//     str += 'point '; 
//     for (var i = x + 1; i < y; i++) str += digit[n[i]] + ' '; 
//   } str = str.replace(/\number+/g, ' '); 
//   return "Rupees in words :- ".str.toUpperCase().trim() + " ONLY.";  
// } 

function addTest(){
  var testName = $('#test_select :selected').text();
  var testId = $('#test_select :selected').val();

  $('#bills tbody').append('<tr><td>'+(Number($('#bills tbody tr').length+1)) +'</td><td>'+testName+'</td><td class="text-right"><i class="fa fa-inr" style="padding-right: 12px;"></i><input type="hidden"  name="tid[]" value="'+testId+'"><input class="test_price" name="test_price[]" type="number" min="1" onchange="calculateBill()" style="width: 80px;" required="required"></td><td> <button class="btn btn-sm btn-danger"  id="remove_row"  ><i class="fa fa-trash"></i></button></td></tr>');
  $('#test_select option:selected').remove();
  $('#test_select').val('Select Test');
  $("#bills #remove_row").click(function () {
   $(this).parents("tr:first")[0].remove();
  });
}
// function remove_row1(){
// $("#bills #remove_row").click(function () {
//   $(this).parents("tr:first")[0].remove();
//  });
// console.log('ccc');
// }


//edit doctor
function del_bill_test(id) {
  // preventDefault();
  var data = "";
  data +=
    '<form class="form-horizontal form-label-left" method="post" action="bill/del_bill_test">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the Test?</label>";
  data += '<input type="hidden" name="pt_id" value="' + id + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete Test");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}
//add user
function add_user() {
    
  var data = "";

  data += '<form class="form-horizontal form-label-left" method="post" action="user/add_user">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group w-100">';

  // data += "<label>Name</label>";
  // data += '<input type="text" name="user_name" class="form-control" required="required">';
  data += ' <span class="px-2 pt-2 mb-2 rounded shadow bg-warning w-100 text-white"><label><b>Select User Image *</b></label></span>';
  data += ' <select name="user_name" class="form-control border border-warning shadow" required>';
  data += '  <option disabled selected value="">Select an Image</option>';
  data += '<option value="admin.jpg">Admin</option>';
  data += '<option value="manager.png">Manager</option>';
  data += '<option value="ldpl.jpeg">LDPL</option>';
  data += '<option value="serum.png">Serum</option>';
  data += '<option value="veins.png">Veins</option>';
//   data += '<option value="nucleus.png">Nucleus Diagnostic</option>';
  data += '<option value="wellness.png">Wellness</option>';
  data += '  </select>';
 data += '</div>';

  data += '<div class="w-100 row form-group border-info p-1 rounded" style="border:4px solid">';
  data += '<span class="px-2 pt-2 mb-2 rounded shadow bg-info w-100 text-white"><label><b>User Id</b></label></span>';
  data += '<input type="text" id="userid" name="user_email" class="form-control shadow" required="required">';
  data += '</div>';
  
//   data += '<div class="row form-group">';
//   data += "<label>Whatsapp Number</label>";
//   data += '<input type="text" name="user_wa" class="form-control">';
//   data += "</div>";

  data += '<div class="w-100 row form-group border-primary p-1 rounded" style="border:4px solid">';
  data += '<span class="px-2 pt-2 mb-2 rounded shadow bg-primary w-100 text-white"><label><b>User Password</b></label></span>';
  data += '<input type="text" name="user_password" class="form-control  shadow" required="required">';
  data += '</div>';

  data += '<div class="row form-group w-100">';
  data += '<span class="px-2 pt-2 mb-2 rounded shadow w-100 text-white" style="background:#90644c"><label><b>Note</b></label></span>';
  data += '<textarea name="note" class="form-control border border-secondary shadow w-100" required="required"></textarea>';
  data += '</div>';
 
 data += '<div class="w-100 row form-group p-1 rounded">';
  data += '<span class="px-2 pt-2 mb-2 rounded shadow w-100 text-white" style="background:#820e23;"><label><b>Automated Billing & Outstanding Amount Link</b></label></span>';
  data += '<input type="text" name="user_bill" class="form-control  shadow" required="required">';
  data += '</div>';
  
  data += '<div class="w-100 row form-group p-1 rounded">';
  data += '<span class="px-2 pt-2 mb-2 rounded shadow w-100 text-white" style="background:#820e23;"><label><b>Passkey</b></label></span>';
  data += '<input type="number" name="passkey" min="0" class="form-control  shadow" required="required">';
  data += '</div>';
  
  data += '<div class="row form-group w-100">';
  data += '<span class="px-2 pt-2 mb-2 rounded shadow bg-dark w-100 text-white"><label><b>Type Of User</b></label></span>';
 

  data += '<select  name="user_type" class="form-control border border-dark shadow w-100" required>';
  data += '<option disabled selected value="">User Type </option>';
 
  data += '<option value="Admin"> Admin</option>';
  data += '<option value="User">User</option>';
  data += '<option value="HCUser">User(Limited Access)</option>';
  data += '<option value="Manager">Manager</option>';

  data += '</select>';
    data += "</div>";
  
  data += "</div>";

  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12 mx-auto">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-5 col-sm-5 col-xs-12 ml-3 mr-1" style="box-shadow:4px 4px 10px #000">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-5 col-sm-5 col-xs-12 ml-2" style="box-shadow:4px 4px 10px #000">Add</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";
    
$(document).ready(function(){ 
    
    $(".Bmedium-modal-title").text("Add User");
    $("#mediumModal_body").html(data);
    $("#mediumModal").modal("show");
    
  $("#userid").change(function(){ 
    var uname = $("#userid").val(); 
    if(uname != ''){ 
      $("#uname_response").show(); 
      $.ajax({ 
        url: 'user/user_val', 
        type: 'post', 
        data: {uname:uname}, 
        success: function(response){ 
           if(response > 0){ 
              $("#uname_response").html("<span style='color:red'>Username Already Exists</span>"); 
           }else{ 
              $("#uname_response").html("<span style='color:green'>You can use this User ID</span>"); 
           } 
        } 
      }); 
    }else{ 
      $("#uname_response").hide(); 
    } 
   }); 
});
    
//   jQuery(document).ready(function ($) {
//     $(".Bmedium-modal-title").text("Add User");
//     $("#mediumModal_body").html(data);
//     $("#mediumModal").modal("show");
//   });
}


//edit user
function edit_user(id) {
  $.ajax({
    url: "user/edit_user",
    type: "post",
    data: { user_id: id },
    success: function (data) {
      $(".Bmedium-modal-title").text("Edit User");
      $("#mediumModal_body").html(data);
      $("#mediumModal").modal("show");
    },
  });
}

// function assign_page(id) {
//   $.ajax({
//     url: "user/assign_page",
//     type: "post",
//     data: { user_id: id },
//     success: function (data) {
//       $(".Bsmall-modal-title").text("Add Pages");
//       $("#smallModal_body").html(data);
//       $("#smallModal").modal("show");
//     },
//   });
// }
// userPermissionOn
function userPermissionOn(id) {
  $.ajax({
    url: "user/userPermissionOn",
    type: "post",
    data: { user_id: id },
  });
}
// userPermissionOff
function userPermissionOff(id) {
  $.ajax({
    url: "user/userPermissionOff",
    type: "post",
    data: { user_id: id },
  });
}
//assign_page
function assign_page(id) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="user/assign_page">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += '<input type="hidden" name="user_id" value="' + id + '">';
//   data += '<input type="text" name="assignedBy" value="' + manager + '">';
  data += '<span class="px-2 pt-2 my-2 rounded shadow bg-success w-100 text-white"><label><b>Assign pages</b></label></span>';
  data += '<input type="text" name="pages" class="form-control shadow border border-success" required="required">';
  data += "</div>";

  data += "</div>";

  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12 mx-auto">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-5 col-sm-5 col-xs-12 mr-1">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Add Pages");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}


//assign_envs

function assign_envs(id) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="user/assign_envs">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';

  data += '<input type="hidden" name="user_id" value="' + id + '">';
  data += '<span class="px-2 pt-2 my-2 rounded shadow bg-warning w-100 text-white"><label><b>Assign Envelopes</b></label></span>';
  data += '<input type="text" name="envelopes" class="form-control shadow border border-warning" required="required">';
  data += "</div>";

  data += "</div>";

  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12 mx-auto">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-5 col-sm-5 col-xs-12 mr-1">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Add Envelope");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}

//delete doctor
function del_user(id) {
  var data = "";

  data +=
    '<form class="form-horizontal form-label-left" method="post" action="user/del_user">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the User?</label>";
  data += '<input type="hidden" name="user_id" value="' + id + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12 mx-auto">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-5 col-sm-5 mr-3 col-xs-12">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete User");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}

//delete envelope
function del_envelope(id,user_id) {
  var data = "";

  data += '<form class="form-horizontal form-label-left" method="post" action="user/del_envelope">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the File?</label>";
  data += '<input type="hidden" name="envelope_id" value="' + id + '">';
  data += '<input type="hidden" name="user_id" value="' + user_id + '">';
  // data += '<input type="text" name="time" value="' + idd + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-5 col-sm-5 col-xs-12 mr-3">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete File");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}
function del_ur(id,user_id) {
  var data = "";

  data += '<form class="form-horizontal form-label-left" method="post" action="user/del_ur">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the File?</label>";
  data += '<input type="hidden" name="envelope_id" value="' + id + '">';
  data += '<input type="hidden" name="user_id" value="' + user_id + '">';
  // data += '<input type="text" name="time" value="' + idd + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-5 col-sm-5 col-xs-12 mr-3">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete File");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}
//delete dump files
function del_dump(id) {
  var data = "";

  data += '<form class="form-horizontal form-label-left" method="post" action="user/del_file">';
  data += '<div class="row" style="padding:10px 20px";>';
  data += '<div class="row form-group">';
  data += "<label>Are you sure, you want to delete the File?</label>";
  data += '<input type="hidden" name="envelope_id" value="' + id + '">';
  data += "</div>";
  data += '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
  data +=
    '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-5 col-sm-5 col-xs-12 mr-3">Cancel</button>';
  data +=
    '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Delete</button>';
  data += "</div>";
  data += "</div>";
  data += "</form>";

  jQuery(document).ready(function ($) {
    $(".Bsmall-modal-title").text("Delete File");
    $("#smallModal_body").html(data);
    $("#smallModal").modal("show");
  });
}