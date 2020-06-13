<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Material Master</title>
</head>

<body>
    <div id="container">
       

        <div>
        <a href="">Return to List</a>
        </div>

        <div id="body">            

            <form id="form" action="<?php echo $base_url.'rawmaterialmaster/edit/'.$row['mrm_id']; ?>" method="POST">
                <h5>Material Name</h5>
                <input type="text" name="mrm_raw_material_name" value="<?php if(isset($row['mrm_raw_material_name'])){echo $row['mrm_raw_material_name']; } ?>" size="50" />

                <h5>Description</h5>
                <input type="text" name="mrm_desc" value="<?php if(isset($row['mrm_desc'])){echo $row['mrm_desc']; } ?>"   size="50" />
                
                <h5>Type</h5>
                <input type="text" name="mrm_type" value="<?php if(isset($row['mrm_type'])){echo $row['mrm_type']; } ?>"  size="2" />

                <h5>Unit</h5>
                <input type="text" name="mrm_unit" value="<?php if(isset($row['mrm_unit'])){echo $row['mrm_unit']; } ?>"  size="10" />

                <p><input type="submit" name="submit" value="Submit" /></p>
            </form>
        </div>
    </div>
</body>

</html>