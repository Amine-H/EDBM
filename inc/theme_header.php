<?php if(!isset($isIndex))die(''); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#langs').val('<?php echo Lang::get(); ?>');
    });
</script>
<div class="container">
	<div id="wrapper" class="col-md-3">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?php echo EDBM_ROOT; ?>/">
                        <h4><span class="glyphicon glyphicon-home"></span><?php echo Lang::translate('home'); ?></h4>
                    </a>
                </li>
                <li>
                    <select id='langs'>
                        <option value='fr'>Francais</option>
                        <option value='en'>English</option>
                        <option value='ar'>العربية</option>
                    </select>
                </li>
                <li>
                    <a href="<?php echo EDBM_ROOT; ?>/home" style="color:#117ab7;"><span class="glyphicon glyphicon-plus"></span><?php echo Lang::translate('add_new'); ?></a>
                </li>
                <?php
                $list=DB::listDBs($link);
				$n=sizeof($list);
                for($i=0;$i<$n;$i++)
                {?>
                <li>
                    <a class="<?php 
					if(DB::getSelectedDB()==$list[$i])
					{echo 'selected';}?>" href="<?php echo EDBM_ROOT; ?>/database/<?php echo $list[$i];?>"><?php echo $list[$i];?></a>
                </li>
                <?php } ?>
                <li><a href="<?php echo EDBM_ROOT; ?>/logout" style="color:#a94442;"><span class="glyphicon glyphicon-off"></span><?php echo Lang::translate('logout'); ?></a></li>
            </ul>

        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">