<!-- TOOLBAR -->
<?php require_once('toolbar/index.php') ?>
<?php require_once('submenu/index.php') ?>



<div id="system-message-container"></div>

<div id="element-box">
  <div class="m">
    <form action="#" method="post" name="adminForm" id="adminForm">
      <!-- FILTER -->
      <fieldset id="filter-bar">
        <div class="filter-search fltlft">
          <label class="filter-search-lbl" for="filter_search">Filter:</label>
          <input type="text" name="filter_search" id="filter_search" value="" />
          <button type="submit" name="submit-keyword">Search</button>
          <button type="button" name="clear-keyword">Clear</button>
        </div>
        <div class="filter-select fltrt">
          <select style="" name="filter_state" class="inputbox">
            <option value="default">- Select Status -</option>
            <option value="1">Publish</option>
            <option value="0">Unpublish</option>
          </select><select style="" name="filter_group_id" class="inputbox">
            <option value="default">- Select Group -</option>
            <option value="1">admin</option>
            <option value="2">member</option>
            <option value="3">manager</option>
          </select>
        </div>
      </fieldset>
      <div class="clr"></div>

      <table class="adminlist" id="modules-mgr">
        <!-- HEADER TABLE -->
        <thead>
          <tr>
            <th width="1%"> <input type="checkbox" name="checkall-toggle" /> </th>
            <th class="title"><a href="#">Name</a> </th>
            <th width="10%"><a href="#">Status</a></th>
            <th width="10%"><a href="#">Group_ACP</a> </th>
            <th width="10%"><a href="#">Ordering</a></th>
            <th width="10%"><a href="#">Created</a> </th>
            <th width="10%"> <a href="#">Created By</a> </th>
            <th width="10%"><a href="#">Modified</a> </th>
            <th width="10%"> <a href="#">Modified By</a> </th>
            <th width="1%" class="nowrap"><a href="#">ID</a> </th>


          </tr>
        </thead>
        <!-- FOOTER TABLE -->
        <tfoot>
          <tr>
            <td colspan="12">
              <!-- PAGINATION -->
              <div class="container">
                <div class="pagination">
                  <div class="button2-right off">
                    <div class="start"><span>Start</span></div>
                  </div>
                  <div class="button2-right off">
                    <div class="prev"><span>Pre</span></div>
                  </div>
                  <div class="button2-left">
                    <div class="page">
                      <span>1</span><a href="#">2</a>
                    </div>
                  </div>
                  <div class="button2-left">
                    <div class="next">
                      <a>Next</a>
                    </div>
                  </div>
                  <div class="button2-left">
                    <div class="end">
                      <a href="#">End</a>
                    </div>
                  </div>
                  <div class="limit">Page 1 of 2</div>
                </div>
              </div>
            </td>
          </tr>
        </tfoot>
        <!-- BODY TABLE -->
        <tbody>

          <?php

          if (!empty($this->Items)) {
            $i = 0;
            foreach ($this->Items as $key => $value) {
              $id = $value['id'];
              $ckb = ' <input type="checkbox" name="cid[]" value="' . $id . '" />';
              $name = $value['name'];
              $row = ($i % 2 == 0) ? 'row0' : 'row1';
              $status = Helper::cmsStatus($value['status'], URL::createLink('admin', 'group', 'ajaxStatus', ['id' => $id, 'status' => $value['status']]), $id);
              $group_acp = Helper::cmsGroupACP($value['group_acp'], URL::createLink('admin', 'group', 'ajaxGroupACP', ['id' => $id, 'group_acp' => $value['group_acp']]), $id);
              $ordring = '<input type="text" name="order[44]" size="5" value="' . $value['ordering'] . '" class="text-area-order"/>';
              $created = Helper::formatDate('d-m-Y', $value['created']);
              $created_by = $value['created_by'];
              $modified = Helper::formatDate('d-m-Y', $value['modified']);
              $modified_by = $value['modified_by'];
              $i++;

              echo '<tr class=" ' . $row . '">
                <td class="center"> ' . $ckb . '  </td>
                <td> <a href="#">  ' . $name . ' </a>  </td>
                <td class="center">  ' . $status . ' </td>
                <td class="center"> ' . $group_acp . '</td>
                <td class="order"> ' . $ordring . '  </td>
                <td class="center"> ' . $created . ' </td>
                <td class="center"> ' . $created_by . ' </td>
                <td class="center"> ' . $modified . ' </td>
                <td class="center"> ' . $modified_by . ' </td>
                <td class="center"> ' . $id . ' </td>
              </tr>';
            }
          }
          ?>

        </tbody>
      </table>

      <div>
        <input type="hidden" name="filter_column" value="username" />
        <input type="hidden" name="filter_page" value="1" />
        <input type="hidden" name="filter_column_dir" value="asc" />
      </div>
    </form>

    <div class="clr"></div>
  </div>
</div>
</div>