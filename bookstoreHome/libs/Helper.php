<?php
class Helper
{
    //===== CMS BUTTON ======
    public static function cmsButton($name, $id, $link, $icon)
    {
        $xhtml = sprintf('<li class="button" id="%s">
                              <a class="modal" href="%s"><span class="%s"></span>%s</a>
                         </li>', $id, $link, $icon, $name);
        return $xhtml;
    }

    //===== Create icon status ======
    public static function cmsStatus($statusValue, $link, $id)
    {
        $strStatus = ($statusValue == 'inactive'||$statusValue == 0 ) ? 'unpublish' : 'publish';
        $xhtml     = sprintf('<a class="jgrid" id = "status-'.$id.'" href="javascript:changeStatus(\''.$link.'\')">
                                <span class="state %s"></span>
                             </a>', $strStatus);
        return $xhtml;
    }

    //===== Create icon group_acp ======
    public static function cmsgroupACP($groupACPValue, $link, $id)
    {
        $strGroupACP = ($groupACPValue == 'inactive'||$groupACPValue == 0 ) ? 'unpublish' : 'publish';
        $xhtml     = sprintf('<a class="jgrid" id = "group-acp-'.$id.'" href="javascript:changeGroupACP(\''.$link.'\')">
                                <span class="state %s"></span>
                             </a>', $strGroupACP);
        return $xhtml;
    }

  

    //===== FORMATE DATE ======
    public static function formatDate($format, $value)
    {
        $result = '';
        if (!empty($value) && $value != '0000-00-00') {
            $result = date('d-m-Y', strtotime($value));
        }
        return $result;
    }
}
