<script type="text/javascript">
    // si jQuery est chargé
    if (typeof(jQuery) != "undefined") {
        jQuery(document).ready(function() {
            jQuery('.clementine-dataTables').dataTable({
                <?php
if (Clementine::$config['module_jquerydatatables']['persistent_datatables']) {
?>
                "bStateSave": true,
<?php
}
if (Clementine::$config['module_jquerydatatables']['nb_res_datatables']) {
?>
                "aLengthMenu": <?php echo Clementine::$config['module_jquerydatatables']['nb_res_datatables']; ?>,
<?php
}
                ?>
                "aaSorting": [], /* disable initial sort */
                "sPaginationType": "full_numbers",
                "oLanguage": {
                    "sUrl": "<?php echo __WWW_ROOT_JQUERYDATATABLES__; ?>/skin/locale/<?php echo $request->LANG; ?>.txt"
                },
                "fnDrawCallback": function() {
                    jQuery(this).find('tr').removeClass("alt-row");
                    jQuery(this).find('tr:odd').addClass("alt-row");
                    // resize processing div
                    var dtid = jQuery(this).attr('id');
                    var dtprocessingid = dtid + '_processing';
                    var theadheight = jQuery('#' + dtid + ' thead:first').height();
                    var tbodyheight = jQuery('#' + dtid + ' tbody:first').height();
                    jQuery('#' + dtprocessingid).css('top', theadheight + 'px');
                    jQuery('#' + dtprocessingid).css('height', tbodyheight + 'px');
                    jQuery('.dataTables_paginate ul.pagination li').addClass('btn');
                }
            });
        });
    }
</script>
