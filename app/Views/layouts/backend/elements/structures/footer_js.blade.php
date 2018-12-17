<?php
$jsFiles = [
    'vendor/bootstrap',
    'vendor/utils/loadingoverlay.min',
    'vendor/utils/loadingoverlay_progress.min',
    'vendor/utils/moment.min',
    'vendor/utils/min',
    'vendor/utils/common',
    'vendor/utils/xhr',
    'vendor/utils/system',
    'vendor/admin',
    'vendor/chart',
    'vendor/icheck',
    'vendor/bootstrap-toggle.min',
    'vendor/jquery.knob',
    'vendor/gauge.min',
    'vendor/chartjs-plugin-annotation.min',
];
?>
{!! loadFiles($jsFiles, $area, 'js') !!}
@include('layouts.elements.footer_autoload')

<script>
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    // CCTV show modal
    var transCCTV = {!! json_encode(trans('messages.cctv_connection')) !!}
    function showErrorConnect() {
        $("#content-error-cctv-connection").html(transCCTV);
        $("#error-cctv-connection").modal('show');
    }
</script>