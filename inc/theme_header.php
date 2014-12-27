    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        <h3>Easy Database Manager</h3>
                    </a>
                </li>
                <?php
                $list=DB::listDBs($link);$n=sizeof($list);
                for($i=0;$i<$n;$i++)
                {?>
                <li>
<<<<<<< HEAD
                    <a href="/database/<?php echo $list[$i];?>"><?php echo $list[$i];?></a>
=======
                    <a href="#">DAtabase</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
>>>>>>> 874540eac1cc6da99d0e046120d3bf7d3499cbe8
                </li>
                <?php } ?>
                <li><a href="/logout"><span class="glyphicon glyphicon-off" style="color:red;">Se deconnecter</span></a></li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">