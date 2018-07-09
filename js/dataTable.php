<?php
echo '<script>';
echo '$(document).ready(function(){
        $("#mitabla").DataTable({
            "language":{
                "lengthMenu": "'.$language["DT_lengthMenu"].'",
                "info": "'.$language["DT_info"].'",
                "infoEmpty": "'.$language["DT_infoEmpty"].'",
                "infoFiltered": "'.$language["DT_infoFiltered"].'",
                "loadingRecords": "'.$language["DT_loadingRecords"].'",
                "processing": "'.$language["DT_processing"].'",
                "search": "'.$language["DT_search"].'",
                "zeroRecords": "'.$language["DT_zeroRecords"].'",
                "paginate": {
                    "next": "'.$language["DT_next"].'",
                    "previous": "'.$language["DT_previous"].'"
                },
            }
        });
    });';
echo '</script>';
?>