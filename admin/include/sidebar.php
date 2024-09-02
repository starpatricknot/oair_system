<?php

$admin_query = mysqli_query($conn, "SELECT * FROM `admin_table` WHERE id='$session_id'");
$admin_row = mysqli_fetch_assoc($admin_query);

?>


<div class="sidebar" data-color="rose" data-background-color="black">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
      -->
  <div class="logo">
    <a href="dashboard.php" class="simple-text logo-mini">
      AIR
    </a>
    <a href="dashboard.php" class="simple-text logo-normal">
      Agricultural <br> Insurance Registry
    </a>
  </div>
  <div class="sidebar-wrapper">
    <div class="user">
      <div class="photo">
        <?php
        if ($admin_row['dp_img'] == '') {
          echo '<img class="img-fluid rounded-circle" src="../img/avatar/default-avatar.png">';
        } else {
          echo '<img class="img-fluid rounded-circle" src="../img/uploaded_img/' . $admin_row['dp_img'] . '">';
        }
        ?>
      </div>
      <div class="user-info">
        <a data-toggle="collapse" href="#collapseExample" class="username">
          <span>
            <?php echo $admin_row['name'] ?>
            <b class="caret"></b>
          </span>
        </a>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> My Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <span class="sidebar-mini"> L </span>
                <span class="sidebar-normal"> Logout </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <ul class="nav">
      <li class="nav-item ">
        <a class="nav-link" href="dashboard.php">
          <i class="material-icons">dashboard</i>
          <p> Dashboard </p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="user_list.php">
          <i class="fa-solid fa-user"></i>
          <span class="sidebar-normal"> Users List </span>
        </a>
      </li>
      <?php if ($admin_row['role'] == "superadmin") {
        echo '<li class="nav-item ">
                <a class="nav-link" href="admin_list.php">
                  <i class="fa-solid fa-user-secret"></i>
                  <span class="sidebar-normal"> Admin List </span>
                </a>
              </li>';
      } ?>
      <li class="nav-item ">
        <a class="nav-link" href="insurance_list.php">
          <i class="fa-solid fa-building-shield"></i>
          <p> Insurance </p>
        </a>
      </li>
    </ul>

  </div>
</div>