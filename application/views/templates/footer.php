</div>
			<!-- END content -->
		</div>
		<!-- END content-page -->

        <?php if($this->uri->segment(1) != 'home') { ?>
		<footer class="footer">
			<span class="text-right">
				Copyright <a href="#">Wellness</a>
			</span>
			<span class="float-right">
				Powered by <a href="#">Grandred Technology</a>
			</span>
		</footer>   
        <?php } ?>

		<!-- add test from home -->
		<div class="modal fade bs-example-modal-sm" id="addTestFromHome" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="Bsmall-modal-title font-weight-bold text-white float-left" id="largeModalLabel">Add Test</h5>
						<div class="float-right">
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="font-weight-bold text-red">×</span>
							</button>
						</div>
					</div>
					<div class="modal-body" id="smallModal_body">
							
						<form class="form-horizontal form-label-left" method="post" action="#">
							<div class="row" style="padding:10px 20px";>
								<div class="row form-group">
									<label>Test Name</label>
									<input type="text" name="test_name" id="test_name" class="form-control" required="required">
								</div>
								<div class="row form-group col-md-12 col-sm-12 col-xs-12">
									<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">
										Cancel
									</button>
									<button type="button" id="tstHm_sbmt_btn" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">
										Add
									</button>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
		<!-- add test from home -->

	</div>
	<!-- END main -->

	<script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jQuery.print.js"></script>

	<!-- App js -->
	<script src="<?php echo base_url(); ?>assets/js/pikeadmin.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/wellness.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<!--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.23/fh-3.1.8/datatables.min.js"></script>-->
	
	<script src="<?php echo base_url(); ?>assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>	
	<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js"></script>
	
	<script>
        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
    </script>
    <script>
        $('textarea').keyup(function() {
    
          var characterCount = $(this).val().length,
              current = $('#current'),
              maximum = $('#maximum'),
              theCount = $('#the-count');
            
          current.text(characterCount);
         
          
          /*This isn't entirely necessary, just playin around*/
          if (characterCount < 70) {
            current.css('color', '#666');
          }
          if (characterCount > 70 && characterCount < 90) {
            current.css('color', '#6d5555');
          }
          if (characterCount > 90 && characterCount < 100) {
            current.css('color', '#793535');
          }
          if (characterCount > 100 && characterCount < 120) {
            current.css('color', '#841c1c');
          }
          if (characterCount > 120 && characterCount < 139) {
            current.css('color', '#8f0001');
          }
          
          if (characterCount >= 140) {
            maximum.css('color', '#8f0001');
            current.css('color', '#8f0001');
            theCount.css('font-weight','bold');
          } else {
            maximum.css('color','#666');
            theCount.css('font-weight','normal');
          }
          
              
        });
    </script>

	<script>

			
		$(document).ready(function() {
			$('#show_doctors').DataTable(
			    {
                scrollY: '500px',
                scrollCollapse: true,
                });
			$('#show_users').DataTable({
                scrollY: '300px',
                scrollCollapse: true,
                });
			$('#old_bill').DataTable();
			$('#tests').DataTable();
			$('#old_patient').DataTable();
			$('#bill').DataTable();
			$('.select2').select2();

			$("#sample_source").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "bill/show_json_sample",
						type: "POST",
						data: {search: $("#sample_source").val()},
						dataType: "json",
						success: function( data ) {
							response( data );
						}
					});
				},
				select: function (event, ui) {
					event.preventDefault();
					$('#sample_source').val(ui.item.label);
				
			
					
				
					return false;
				}
			});



			$("#agent_show").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "agent/show_json_agent",
						type: "POST",
						data: {search: $("#agent_show").val()},
						dataType: "json",
						success: function( data ) {
							response( data );
						}
					});
				},
				select: function (event, ui) {
					event.preventDefault();
					$('#agent_show').val(ui.item.label);
					$('#agent_id').val(ui.item.value);
			
					
				
					return false;
				}
			});

			$("#lab_show").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "lab/show_json_lab",
						type: "POST",
						data: {search: $("#lab_show").val()},
						dataType: "json",
						success: function( data ) {
							response( data );
						}
					});
				},
				select: function (event, ui) {
					event.preventDefault();
					$('#lab_show').val(ui.item.label);
					$('#lab_id').val(ui.item.value);
			
					
				
					return false;
				}
			});

			$("#sample_collected_show").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "collectors/show_json_collector",
						type: "POST",
						data: {search: $("#sample_collected_show").val()},
						dataType: "json",
						success: function( data ) {
							response( data );
						}
					});
				},
				select: function (event, ui) {
					event.preventDefault();
					$('#sample_collected_show').val(ui.item.label);
					$('#sample_collected_id').val(ui.item.value);
					$('#sample_address').val(ui.item.sample_address);
					$('#sample_contact').val(ui.item.sample_contact);
					
				
					return false;
				}
			});

			$("#amount_collected_show").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "collectors/show_json_collector",
						type: "POST",
						data: {search: $("#amount_collected_show").val()},
						dataType: "json",
						success: function( data ) {
							response( data );
						}
					});
				},
				select: function (event, ui) {
					event.preventDefault();
					$('#amount_collected_show').val(ui.item.label);
					$('#amount_collected_name').val(ui.item.value);
					
				
					return false;
				}
			});
			
			$("#patient_show").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "patients/show_json_ptnt",
						type: "POST",
						data: {search: $("#patient_show").val()},
						dataType: "json",
						success: function( data ) {
							response( data );
						}
					});
				},
				select: function (event, ui) {
					event.preventDefault();
					$('#patient_show').val(ui.item.label);
					$('#patient_id').val(ui.item.value);
					$('#year').val(ui.item.year);
					$('#month').val(ui.item.month);
					$('#day').val(ui.item.day);
					$('#patient_sex').val(ui.item.p_sex);
					$('#patient_phone').val(ui.item.p_phn);
					return false;
				}
			});

			$("#doctor_show").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "doctor/show_json_doc",
						type: "POST",
						data: {search: $("#doctor_show").val()},
						dataType: "json",
						success: function( data ) {
							response( data );
						}
					});
				},
				select: function (event, ui) {
					event.preventDefault();
					$('#doctor_show').val(ui.item.label);
					$('#doctor_id').val(ui.item.value);
					return false;
				}
			});
			
			$('#print_page').click(function(){
				jQuery('#printable').print({
					//Custom stylesheet
					stylesheet : "https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css",
					//Add this on bottom
					//append : "<span><br/><b>Total cost : </b>"+numberToWords(jQuery('#total_amt').html())+"</span>"
				});
			});

			$('#tstHm_sbmt_btn').click(function(){
				$.ajax({
					type: 'post',
					url: 'tests/addTestHome',
					data: {test_name:$('#test_name').val()},
					success: function(result){
						if(result){
							$('#test_select').empty().append(result);
							$("#addTestFromHome").modal('toggle');
						}
					}
				});
			});
		});
		
	</script>
</body>

</html>