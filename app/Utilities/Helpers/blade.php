<?php
if (!function_exists('_currentAdminPage')) {
    function _currentAdminPage()
    {
    }
}


if (!function_exists('_stsCheck')) {
    function _stsCheck($msg, $operation = true, $url = null)
    {
        if (is_null($url)) {
            return $operation ? redirect()->back()->with('success', $msg)
                : redirect()->back()->with('error', $msg);
        } else {
            return $operation ? redirect()->route($url)->with('success', $msg)
                : redirect()->route($url)->with('error', $msg);
        }
    }
}


if (!function_exists('_alert')) {
    function _alert($message = null, $errorType = null, $show = false){
        if (!$show) {
            if (session()->has('success')) {
                return "
                <script src='" . _adminJs('plugins/notifications/pnotify.min.js') . "'></script>
                <script type='text/javascript'>
                    $(function(){
                    new PNotify({
                        title: 'Uğurlu Əməliyyat',
                        text: '" . session()->get('success') . "',
                        icon: 'icon-checkmark3',
                        type: 'success'
                    });
                })
                </script>";
            }
            if (session()->has('error')) {
                return "
                <script src='" . _adminJs('plugins/notifications/pnotify.min.js') . "'></script>
                <script type='text/javascript'>
                    $(function(){
                        new PNotify({
                            title: 'Uğursuz Əməliyyat',
                            text: '" . session()->get('error') . "',
                            icon: 'icon-blocked',
                            type: 'error'
                        });
                    });
                </script>";
            }
        } else {
            return "
            <script src='" . _adminJs('plugins/notifications/pnotify.min.js') . "'></script>
            <script type='text/javascript'>
            $(function(){
                new PNotify({
                    title: 'Danger notice',
                    text: '" . $message . "',
                    icon: 'icon-blocked',
                    type: '".$errorType."'
                });
            });
        </script>";
        }
    }
}
