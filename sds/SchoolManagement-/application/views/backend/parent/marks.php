<?php 
    $child_of_parent = $this->db->get_where('student' , array(
        'student_id' => $student_id
    ))->result_array();
    foreach ($child_of_parent as $row):
?>
<hr />
    <div class="label label-primary pull-right" style="font-size: 14px;">
        <i class="entypo-user"></i> <?php echo $row['name'];?>
    </div>
<br><br>
<div class="row">
    <div class="col-md-12">
    
        <div class="tabs-vertical-env">
        
            <ul class="nav tabs-vertical">
                <?php 
                    $quizs = $this->db->get('quiz')->result_array();
                    foreach ($quizs as $row2):
                ?>
                <li class="">
                    <a href="#<?php echo $row2['quiz_id'];?>" data-toggle="tab">
                        <?php echo $row2['name'];?>  <small>( <?php echo $row2['date'];?> )</small>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
            
            <div class="tab-content">
            
            <?php 
                foreach ($quizs as $quiz):
                    $this->db->where('quiz_id' , $quiz['quiz_id']);
                    $this->db->where('student_id' , $student_id);
                    $marks = $this->db->get('mark')->result_array();
            ?>
                <div class="tab-pane" id="<?php echo $quiz['quiz_id'];?>">
                    <table class="table table-bordered table-hover table-striped responsive">
                        <thead>
                            <tr>
                                <th width="15%"><?php echo ('Class');?></th>
                                <th><?php echo ('Subject');?></th>
                                <th><?php echo ('Total Mark');?></th>
                                <th><?php echo ('Mark Obtained');?></th>
                                <th width="33%"><?php echo ('Comment');?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($marks as $mark):?>
                            <tr>
                                <td>
                                    <?php echo $this->db->get_where('class' , array(
                                        'class_id' => $mark['class_id']
                                    ))->row()->name;?>
                                </td>
                                <td>
                                    <?php echo $this->db->get_where('subject' , array(
                                        'subject_id' => $mark['subject_id']
                                    ))->row()->name;?>
                                </td>
                                <td><?php echo $mark['mark_total'];?></td>
                                <td><?php echo $mark['mark_obtained'];?></td>
                                <td><?php echo $mark['comment'];?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach;?>

            </div>
            
        </div>  
    
    </div>
</div>
<?php endforeach;?>