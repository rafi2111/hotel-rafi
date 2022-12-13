<?php

function check_akses($kamarid, $fasilitasid)
{
    $ci = get_instance();
    $ci->db->where('kamarid',$kamarid);
    $ci->db->where('fasilitasid',$fasilitasid);
    $result = $ci->db->get('detailfasilitaskamar');
    if ($result->num_rows() > 0) {
        return "checked='cheked'";
    }
}