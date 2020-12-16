<?php
class GroupModel extends Model
{


     public function __construct()
     {
          parent::__construct();
          $this->setTable(TBL_GROUP);
     }

     public function listItem($arrParam, $option = null)
     {
          $query[] = "SELECT `id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`";
          $query[] = "FROM `$this->table` ";
          $query = implode(" ", $query);
          $result = $this->listRecord($query);
          return $result;
     }
     public function changeStatus($arrParam, $option = null)
     {
          if ($option['task'] == 'change-ajax-status') {
               $status = ($arrParam['status'] == 0) ? 1 : 0;
               $id = $arrParam['id'];

               $query = "UPDATE `$this->table` SET `status`= $status WHERE `id`= $id";
               $this->query($query);

               return [
                    $id, $status, URL::createLink('admin', 'group', 'ajaxStatus', ['id' => $id, 'status' => $status])
               ];
          }

          if ($option['task'] == 'change-ajax-group-acp') {
               $group_acp = ($arrParam['group_acp'] == 0) ? 1 : 0;
               $id = $arrParam['id'];

               $query = "UPDATE `$this->table` SET `group_acp`= $group_acp WHERE `id`= $id";
               $this->query($query);

               return [
                    $id, $group_acp, URL::createLink('admin', 'group', 'ajaxGroupACP', ['id' => $id, 'group_acp' => $group_acp])
               ];
          }
     }
}
