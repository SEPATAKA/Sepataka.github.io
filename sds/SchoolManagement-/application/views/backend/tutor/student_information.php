
<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/student_add/');"
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo ('Add New Student');?>
    </a>
<br><br>
<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr>
          <th width="80"><div><?php echo ('student_id');?></div></th>
          <th width="80"><div><?php echo ('Photo');?></div></th>
          <th><div><?php echo ('Student No');?></div></th>
          <th><div><?php echo ('Surname ');?></div></th>
          <th><div><?php echo ('Initials');?></div></th>
            <th><div><?php echo ('Subject_Code');?></div></th>
            <th><div><?php echo ('Contact No');?></div></th>
              <th><div><?php echo ('Email Address');?></div></th>
              <th><div><?php echo (' Information Session');?></div></th>
                <th><div><?php echo ('Information Session Attendance');?></div></th>
                <th><div><?php echo ('Supported Subjects');?></div></th>
                <th><div><?php echo (' WhatsApp Status');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
                $students	=	$this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                foreach($students as $row):?>
        <tr>
          <td><?php echo $row['student_id'];?></td>
          <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td>
          <td><?php echo $row['student_no'];?></td>
          <td><?php echo $row['surname'];?></td>
          <td><?php echo $row['initals'];?></td>
          <td><?php echo $row['subject_name'];?></td>
          <td><?php echo $row['phone'];?></td>
          <td><?php echo $row['email'];?></td>
        
          <td><?php echo $row['Information_Session'];?></td>
          <td><?php echo $row['Information_Session_Attendance'];?></td>
          <td><?php echo $row['Supported_Subjects'];?></td>
          <td><?php echo $row['WhatsApp_Status'];?></td>
            <td>

                <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                        <!-- STUDENT PROFILE LINK -->
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_profile/<?php echo $row['student_id'];?>');">
                                <i class="entypo-user"></i>
                                    <?php echo ('Profile');?>
                                </a>
                                        </li>

                        <!-- STUDENT EDITING LINK -->
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_edit/<?php echo $row['student_id'];?>');">
                                <i class="entypo-pencil"></i>
                                    <?php echo ('Edit');?>
                                </a>
                                        </li>
                        <li class="divider"></li>

                        <!-- STUDENT DELETION LINK -->
                        <li>
                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?tutor/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>');">
                                <i class="entypo-trash"></i>
                                    <?php echo ('Delete');?>
                                </a>
                                        </li>
                    </ul>
                </div>

            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->
<script type="text/javascript">

	jQuery(document).ready(function($)
	{


		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [

					{
						"sExtends": "xls",
						"mColumns": [0, 2, 3, 4]
					},
					{
						"sExtends": "pdf",
						"mColumns": [0, 2, 3, 4]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(1, false);
							datatable.fnSetColumnVis(5, false);

							this.fnPrint( true, oConfig );

							window.print();

							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(1, true);
									  datatable.fnSetColumnVis(5, true);
								  }
							});
						},

					},
				]
			},

		});

		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});

</script>
