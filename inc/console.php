<?php if(!isset($isIndex))die(''); ?>
<?php
    $alert_type="info";
    $alert_message=Lang::translate('insert_code');
    if(isset($_POST['console'])){
        $query = mysql_query($_POST['console'],$link);
        if(!$query){
            $alert_type="danger";
            $alert_message=mysql_error();
        }
        else{
            $row=array();$fields=array();$i=0;$n=mysql_num_fields($query);
            $alert_type="success";
            for($j=0;$j<$n;$j++){
                $fields[$j]=mysql_field_name($query,$j);
            }
            while($row[$i++] = mysql_fetch_array($query)){
            }$row_count=$i;
            $alert_message="<table class='table table-nonfluid table-striped' id='console-table'>";
            $alert_message.="<tr>";
            for($i=0;$i<$n;$i++){
                $alert_message.="<th>".$fields[$i]."</th>";
            }
            $alert_message.="</tr>";
            for($i=0;$i<$row_count;$i++){
                $alert_message.="<tr>";
                for($j=0;$j<$n;$j++){
                    $alert_message.="<td>".$row[$i][$j]."</td>";
                }
                $alert_message.="</tr>";
            }
            $alert_message.="</table>";
        }
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#console').html($.trim($('#console').html()));
    });
</script>
<form action="<?php echo EDBM_ROOT; ?>/console" method="POST">
    <div class="control-group">
            <label class="control-label" for="console"><?php echo Lang::translate('console'); ?></label>
            <div class="controls">
                <textarea id="console" name="console" class="form-control" rows="10">
                <?php
                    if(isset($_POST['console'])){
                        echo $_POST['console'];
                    }
                ?>
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo Lang::translate('execute'); ?></button>
    </div>
    <div class="alert alert-<?php echo $alert_type; ?>" role="alert">
        <div><?php if($alert_type=='success'){echo Lang::translate('code_executed');} ?></div>
        <?php echo $alert_message; ?>
    </div>
</form>