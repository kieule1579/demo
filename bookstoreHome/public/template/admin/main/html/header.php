
<?php
$linkControlPanel = URL::createLink('admin', 'control', 'index');
$linkMyProfilel   = URL::createLink('admin', 'profilel', 'index');
$linkMyProfilel   = URL::createLink('admin', 'profilel', 'index');
$linkUserManager  = URL::createLink('admin', 'user', 'index');
$linkAddUser      = URL::createLink('admin', 'user', 'add');
$linkGroupManager = URL::createLink('admin', 'group', 'index');
$linkAddGroup     = URL::createLink('admin', 'group', 'add');


?>
  <div id="border-top" class="h_blue">
    <span class="title"><a href="#">Administration</a></span>
  </div>

  <!-- HEADER -->
  <div id="header-box">
    <div id="module-status">
      <span class="viewsite"><a href="">View Site</a></span>
      <span class="no-unread-messages"><a href="#">Log out</a></span>
    </div>
    <div id="module-menu">
      <!-- MENU -->
      <ul id="menu">

        <li class="node">
          <a href="#">Site</a>
          <ul>
            <li>
              <a class="icon-16-cpanel" href="<?= $linkControlPanel?>">Control Panel</a>
            </li>
            <li class="separator"><span></span></li>
            <li>
              <a class="icon-16-profile" href="<?= $linkMyProfilel?>">My Profile</a>
            </li>
          </ul>
        </li>

        <li class="separator"><span></span></li>

        <li class="node">
          <a href="#">Users</a>
          <ul>
            <li class="node">
              <a class="icon-16-user" href="<?= $linkUserManager?>">User Manager</a>
              <ul id="menu-com-users-users" class="menu-component">
                <li>
                  <a class="icon-16-newarticle" href="<?= $linkAddUser?>">Add New User</a>
                </li>
              </ul>
            </li>
            <li class="node">
              <a class="icon-16-groups" href="<?= $linkGroupManager?>">Group Manager</a>
              <ul id="menu-com-users-groups" class="menu-component">
                <li>
                  <a class="icon-16-newarticle" href="<?= $linkAddGroup?>">Add New Group</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>

        <li class="node">
          <a href="#">Book Shopping</a>
          <ul>
            <li class="node">
              <a class="icon-16-category" href="#">Category Manager</a>
              <ul id="menu-com-users-users" class="menu-component">
                <li>
                  <a class="icon-16-newarticle" href="#">Add New Category</a>
                </li>
              </ul>
            </li>
            <li class="node">
              <a class="icon-16-article" href="#">Book Manager</a>
              <ul id="menu-com-users-groups" class="menu-component">
                <li>
                  <a class="icon-16-newarticle" href="#">Add New Book</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="clr"></div>
  </div>