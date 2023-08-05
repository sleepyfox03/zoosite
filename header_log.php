<?php
include "Database/db_con.php";
include "session.php";
 ?>
<header>
        <nav class=navbar>
            <div class="nav-bar-logo">
                <b><i>zooSite</i></b>
            </div>
            <div class="nav-bar-content">
                <ul class="nav-list">
                    
                 <li style="color:white"><?php echo $user;?></li>
                 <li style="color:orange">(<?php echo $role;?>)</li>
                  
                  <a href="logout.php">  <li><button class=btn>Logout</button></li></a>
                </ul>
              
            </div>
            

        </nav>
</header>
