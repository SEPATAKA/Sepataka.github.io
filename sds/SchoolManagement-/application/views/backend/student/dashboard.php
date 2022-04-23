<div class="row">
	<div class="col-md-8">
    	<div class="row">
            <!-- CALENDAR-->
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            <?php echo ('Event Schedule');?>
                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body">
                                <div id="notice_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="col-md-4">
		<div class="row">
            <div class="col-md-12">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="fa fa-group"></i></div>
					 <h3><?php echo ('Subject Supoort');?><p>

                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('class');?>"
                    		data-postfix="" data-duration="1500" data-delay="0">0</div>

<?php
if(isset($_POST['Language'])) {
  echo "Selected Language: ".htmlspecialchars($_POST['Language']);
}
?></p>

                </div>

            </div>
            <div class="col-md-12">

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-users"></i></div>
					 <h3><?php echo ('Subject Tutor');?></h3>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('tutor');?>"
                    		data-postfix="" data-duration="800" data-delay="0">0</div>

					<?php
?>
            </div>
            <div class="col-md-12">

                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-user"></i></div>
					<h3><?php echo ('sesions');?></h3>

                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('class');?>"
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                 <p>Total sessions</p>
                </div>

            </div>
            <div class="col-md-12">

                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-chart-bar"></i></div>
                    <?php
							$check	=	array(	'date' => date('Y-m-d') , 'status' => '1' );
							$query = $this->db->get_where('attendance' , $check);
							$present_today		=	$query->num_rows();
						?>
						 <h3><?php echo ('Attendance');?></h3>
                    <div class="num" data-start="0" data-end="<?php echo $present_today;?>"
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                   <p>Total present student today</p>
                </div>

            </div>
    	</div>
    </div>

</div>
    <script>
  $(document).ready(function() {

	  var calendar = $('#notice_calendar');

				$('#notice_calendar').fullCalendar({
					header: {
						left: 'title',
						right: 'today prev,next'
					},

					//defaultView: 'basicWeek',

					editable: false,
					firstDay: 1,
					height: 530,
					droppable: false,

					events: [
						<?php
						$notices	=	$this->db->get('noticeboard')->result_array();
						foreach($notices as $row):
						?>
						{
							title: "<?php echo $row['notice_title'];?>",
							start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
							end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>)
						},
						<?php
						endforeach
						?>

					]
				});
	});
  </script>
