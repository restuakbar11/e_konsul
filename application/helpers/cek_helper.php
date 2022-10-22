<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id')) {
        redirect('auth');
    } else {
        $level = $ci->session->userdata('level');
        $akses = $ci->uri->segment(1);
        if ($level == "admin") {
            if ($akses <> "admin") {
                //redirect('auth/blocked');
            }
        } elseif ($level == "superadmin") {
            if ($akses <> "superadmin") {
                //redirect('auth/blocked');
            }
        } else {
            if ($akses <> "opd") {
                redirect('auth/blocked');
            }
        }
    }
}
