<hr />
<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default panel-shadow" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->

			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title"><?php echo ('Send Marks');?> via SMS</div>
			</div>

			<!-- panel body -->
			<div class="panel-body">
			<?php echo form_open(base_url() . 'index.php?admin/quiz_marks_sms/send_sms' , array('target'=>'_top'));?>

				<div class="form-group">
                    <div class="col-md-3">
                        <select name="quiz_id" class="form-control" required>
                        	<option value=""><?php echo ('Select Euiz');?></option>
                    	<?php
                    		$quizs = $this->db->get('quiz')->result_array();
                    		foreach ($quizs as $row):
                    	?>
                        	<option value="<?php echo $row['quiz_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        <select name="class_id" class="form-control" required>
                        	<option value=""><?php echo ('Select Class');?></option>
                        <?php
                        	$classes = $this->db->get('class')->result_array();
                        	foreach ($classes as $row):
                        ?>
                        	<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        <select name="receiver" class="form-control" required>
                        	<option value=""><?php echo ('Select Receiver');?></option>
                        	<option value="student"><?php echo ('Student');?></option>
                        	<option value="parent"><?php echo ('Parents');?></option>
                        </select>
                    </div>
                </div>

                  <div class="col-md-3">
                      <button type="submit" class="btn btn-primary"><?php echo ('Send Marks');?> via SMS</button>
                  </div>

			<?php echo form_close();?>
			</div>

		</div>

	</div>
</div>
