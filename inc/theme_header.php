    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        Easy Database Manager
                    </a>
                </li>
                <?php
                $list=DB::listDBs($link);$n=sizeof($list);
                for($i=0;$i<$n;$i++)
                {?>
                <li>
                    <a href="/database/<?php echo $list[$i];?>"><?php echo $list[$i];?></a>
                </li>
                <?php } ?>
                <li><a href="/logout"><span class="glyphicon glyphicon-off" style="color:red;">Se deconnecter</span></a></li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">