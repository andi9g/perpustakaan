<nav aria-label="breadcrumb">
        <ol class="breadcrumb py-1 px-2 m-0 <?php if($_SESSION['sidebarku']=='dark'){?>breadcrumbColor<?php }else{ echo "breadcrumbku";}?>">
          <li class="breadcrumb-item <?php if(!(isset($_GET['pages']))){echo 'active';}?>">
          <?php 
              if((isset($_GET['pages']))){
                ?>
                   <a href="index.php">
                   <?php
              }
            ?>
            Home

            <?php 
              if(isset($_GET['pages'])){
                ?>
                   </a>
                   <?php
              }
            ?>
          
        </li>
          <?php 
              if(isset($_GET['pages'])){
                ?>
                
                    <li class="breadcrumb-item <?php if(!isset($_GET['aksi'])){?>active<?php }?>" aria-current="page" style="text-transform: capitalize;">
                         <?php if(isset($_GET['aksi'])){?>
                            <a href="?pages=<?php echo $_GET['pages']?>">
                        <?php }?>
                        <?php echo str_replace("_"," ",$_GET['pages']);?>

                        <?php if(isset($_GET['aksi'])){?>
                             </a>
                        <?php }?>
                    </li>
                    
                <?php
              }
          ?>

        <?php 
              if(isset($_GET['aksi'])){
                ?>
                    <li class="breadcrumb-item active" aria-current="page" style="text-transform: capitalize;"><?php echo str_replace("_"," ",$_GET['aksi']);?></li>
                <?php
              }
          ?>
          
        </ol>
      </nav>