<?php
error_reporting(0);
require_once 'core/harviacode.php';
require_once 'core/helper.php';
require_once 'core/process.php';
?>
<!doctype html>
<html>
    <head>
        <title>SOCIANOVATION Codeigniter 3 CRUD Generator based on HarviaCode CRUD Igniter</title>
        <link rel="stylesheet" href="core/bootstrap.min.css"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-md-3">
                <form action="index.php" method="POST">

                    <div class="form-group">
                        <label>Select Table - <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Refresh</a></label>
                        <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                            <option value="">Please Select</option>
                            <?php
                            $table_list = $hc->table_list();
                            $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                            foreach ($table_list as $table) {
                                ?>
                                <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <?php $jenis_tabel = isset($_POST['jenis_tabel']) ? $_POST['jenis_tabel'] : 'reguler_table'; ?>
                            <div class="col-md-5">
                                <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                    <label>
                                        <input type="radio" name="jenis_tabel" value="reguler_table" <?php echo $jenis_tabel == 'reguler_table' ? 'checked' : ''; ?>>
                                        Regular Table
                                    </label>
                                </div>                            
                            </div>
                            <div class="col-md-7">
                                <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                    <label>
                                        <input type="radio" name="jenis_tabel" value="datatables" <?php echo $jenis_tabel == 'datatables' ? 'checked' : ''; ?>>
                                        Serverside Datatables
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <?php $export_excel = isset($_POST['export_excel']) ? $_POST['export_excel'] : ''; ?>
                            <label>
                                <input type="checkbox" name="export_excel" value="1" <?php echo $export_excel == '1' ? 'checked' : '' ?>>
                                Export Excel
                            </label>
                        </div>
                    </div>    

                    <div class="form-group">
                        <div class="checkbox">
                            <?php $export_word = isset($_POST['export_word']) ? $_POST['export_word'] : ''; ?>
                            <label>
                                <input type="checkbox" name="export_word" value="1" <?php echo $export_word == '1' ? 'checked' : '' ?>>
                                Export Word
                            </label>
                        </div>
                    </div>    

                    <div class="form-group">
                        <label>Custom Controller Name</label>
                        <input type="text" id="controller" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="Controller Name" />
                    </div>
                    <div class="form-group">
                        <label>Custom Model Name</label>
                        <input type="text" id="model" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="Controller Name" />
                    </div>
                    <input type="submit" value="Generate" name="generate" class="btn btn-primary" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" />
                    <input type="submit" value="Generate All" name="generateall" class="btn btn-danger" onclick="javascript: return confirm('WARNING !! This will generate code for ALL TABLE and overwrite the existing files\
                    \nPlease double check before continue. Continue ?')" />
                    <a href="core/setting.php" class="btn btn-default">Setting</a>
                </form>
                <br>

                <?php
                foreach ($hasil as $h) {
                    echo '<p>' . $h . '</p>';
                }
                ?>
            </div>
            <div class="col-md-9">
				<h3>SOCIANOVATION Codeigniter 3 CRUD Generator based on Harvia Code CRUD Igniter</h1>
                <h5 style="margin-top: 0px">Credit to : Codeigniter CRUD Generator 1.4 by <a target="_blank" href="http://harviacode.com">harviacode.com</a></h3>
                <p><strong>About :</strong></p>
                <p>
                    SOCIANOVATION Codeigniter 3 CRUD Generator allow you to generate CRUD code, ready to use for your project.
					
					- Added Side Menu based on your available tables
					- Separated Header and Footer Menu to make debugging easier
					
					Thanks to <a href="http://www.harviacode.com">HarviaCode</a> for their great works!!.
                </p>
                <small>* generate textarea and text input only</small>
				
                <p><strong>Preparation before using this CRUD Generator (Important) :</strong></p>
                <ul>
                    <li>On application/config/autoload.php, load database library, session library and url helper</li>
                    <li>On application/config/config.php, set :</b>.
                        <ul>
                            <li>$config['base_url'] = 'http://localhost/yourprojectname'</li>
                            <li>$config['index_page'] = ''</li>
                            <li>$config['url_suffix'] = '.html'</li>
                            <li>$config['encryption_key'] = 'randomstring'</li>

                        </ul>

                    </li>
                    <li>On application/config/database.php, set hostname, username, password and database.</li>
                </ul>
                <p><strong>Using this CRUD Generator :</strong></p>
                <ul>
                    <li>Simply put 'socianovation' folder, 'asset' folder and .htaccess file into your project root folder.</li>
                    <li>Open http://localhost/yourprojectname/socianovation.</li>
                    <li>Select table and push generate button.</li>
                </ul>
                <p><strong>FAQ :</strong></p>
                <ul>
                    <li>Select table show no data. Make sure you have correct database configuration on application/config/database.php and load database library on autoload.</li>
                    <li>Error chmod on mac and linux. Please change your application folder and socianovation folder chmod to 777 </li>
                    <li>Error 404 when click Create, Read, Update, Delete or Next Page. Make sure your mod_rewrite is active 
                        and you can access http://localhost/yourproject/welcome. The problem is on htaccess. Still have problem?
                        please go to google and search how to remove index.php codeigniter.
                    </li>
                    <li>Error cannot Read, Update, Delete. Make sure your table have primary key.</li>
                </ul>
                <br>

                <p><strong>&COPY; 2017 <a target="_blank" href="http://www.socianovation.com">SOCIANOVATION</a></strong></p>
            </div>
        </div>
    </body>
</html>
