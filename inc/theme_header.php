    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        <h3>Easy Database Manager</h3>
                    </a>
                </li>
                <li>
                    <a href="/database" style="color:#117ab7;"><span class="glyphicon glyphicon-plus"></span>créer nouveau</a>
                </li>
                <?php
                $list=DB::listDBs($link);$n=sizeof($list);
                for($i=0;$i<$n;$i++)
                {?>
                <li>
                    <a class="<?php if(DB::getSelectedDB()==$list[$i]){echo 'selected';}?>" href="/database/<?php echo $list[$i];?>"><?php echo $list[$i];?></a>
                </li>
                <?php } ?>
                <li><a href="/logout" style="color:#a94442;"><span class="glyphicon glyphicon-off"></span>Se deconnecter</a></li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">