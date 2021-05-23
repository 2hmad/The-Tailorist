<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#" style="color:white !important;z-index: 100;">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#" style="color:white !important">Dashboard</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture" style="max-width: 56px;height:56px">
        </div>
        <div class="user-info">
        <?php
        $email = $_SESSION['email_admin'];
        $sql = "SELECT * FROM admins WHERE email = '$email'";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)) {
          $name = $row['name'];
        }
        ?>
          <span class="user-name"><?php echo "$name"; ?></span>
          <span class="user-role">Admin</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li>
            <a href="index.php" style="color:white !important">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#" style="color:white !important">
              <i class="fa fa-shopping-cart"></i>
              <span>Items</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="add-item.php" style="color:white !important">Add Item</a>
                </li>
                <li>
                  <a href="add-color.php" style="color:white !important">Add Item Color</a>
                </li>
                <li>
                  <a href="edit-item.php" style="color:white !important">Edit Item</a>
                </li>
                <li>
                  <a href="delete-item.php" style="color:white !important">Delete Item</a>
                </li>
                <li>
                  <a href="item-pieces.php" style="color:white !important">Item Pieces</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="add-discount.php" style="color:white !important">
              <i class="fa fa-percent"></i>
              <span>Add Discount</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#" style="color:white !important">
              <i class="fa fa-shopping-cart"></i>
              <span>Orders</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="previous-orders.php" style="color:white !important">Previous Orders</a>
                </li>
                <li>
                  <a href="pending-orders.php" style="color:white !important">Pending Orders</a>
                </li>
                <li>
                  <a href="all-orders.php" style="color:white !important">All Orders</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#" style="color:white !important">
              <i class="far fa-gem"></i>
              <span>Cutomers</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#" style="color:white !important">All Cutomers</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="#" style="color:white !important">
              <i class="fa fa-chart-line"></i>
              <span>Charts</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="sidebar-footer">
      <a href="messages.php" style="color:white !important">
        <i class="fa fa-envelope" style="margin-top: 6%;"></i>
        <span class="badge badge-pill badge-success notification">0</span>
      </a>
      <a href="#" style="color:white !important">
        <i class="fa fa-power-off" style="margin-top: 6%;"></i>
      </a>
    </div>
  </nav>