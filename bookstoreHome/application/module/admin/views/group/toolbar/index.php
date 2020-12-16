<?php
$linkNew = URL::createLink('admin', 'group', 'add');
$btnNew = Helper::cmsButton('New', 'toolbar-popup-new',  $linkNew, 'icon-32-new');

$linkPublic = URL::createLink('admin', 'group', 'index');
$btnPublic = Helper::cmsButton('Public', 'toolbar-publish',  $linkPublic, 'icon-32-publish');

$linkUnPublic = URL::createLink('admin', 'group', 'index');
$btnUnPublic = Helper::cmsButton('Unpublish', 'toolbar-unpublish',  $linkUnPublic, 'icon-32-unpublish');

$linkTrash = URL::createLink('admin', 'group', 'index');
$btnTrash = Helper::cmsButton('Trash', 'toolbar-trash',  $linkTrash, 'icon-32-trash');

$linkSave = URL::createLink('admin', 'group', 'add');
$btnSave = Helper::cmsButton('Save', 'toolbar-apply',  $linkSave, 'icon-32-apply');

$linkSaveClose = URL::createLink('admin', 'group', 'add');
$btnSaveClose = Helper::cmsButton('Save & Close', 'toolbar-save',  $linkSaveClose, 'icon-32-save');

$linkSaveNew = URL::createLink('admin', 'group', 'add');
$btnSaveNew = Helper::cmsButton('Save & New', 'toolbar-save-new',  $linkSaveNew, 'icon-32-save-new');

$linkCancel = URL::createLink('admin', 'group', 'index');
$btnCancel = Helper::cmsButton('Cancel', 'toolbar-cancel',  $linkCancel, 'icon-32-cancel');


switch ($this->arrParam['action']) {

    case 'index':
        $strButton = $btnNew . $btnPublic . $btnUnPublic . $btnTrash;
        break;
    case 'add':
        $strButton = $btnSave . $btnSaveClose .$btnSaveNew . $btnCancel;
}
?>


<div id="toolbar-box">
    <div class="m">
        <!-- TOOLBAR -->
        <div class="toolbar-list" id="toolbar">
            <ul>
                <?= $strButton ?>


                <!-- <li class="button" id="toolbar-checkin">
                    <a class="modal" href="#" onclick="javascript:submitForm('/linh/index.php?module=admin&amp;controller=user&amp;action=ordering');"><span class="icon-32-checkin"></span>Ordering</a>
                </li> -->


            </ul>

            <div class="clr"></div>
        </div>
        <!-- TITLE -->
        <div class="pagetitle icon-48-groups">
            <h2> <?php echo $this->_title ?> </h2>
        </div>
    </div>
</div>