<?php
    function format_rupiah($nominal){
        return "Rp. " . number_format($nominal,2,',','.');
    }
?>