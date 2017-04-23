<?php 

$string = "<?php \$this->load->view('templates/header');?>";
$string .="
<div class=\"row\" style=\"margin-bottom: 20px\">
            <div class=\"col-md-4\">
                <h2>".str_replace("_"," ", ucfirst($table_name))." Read</h2>
            </div>
            <div class=\"col-md-8 text-center\">
                <div id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>";
$string .= "<?php \$this->load->view('templates/footer');?>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>