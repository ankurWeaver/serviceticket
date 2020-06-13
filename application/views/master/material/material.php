<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Matrial List</title>
</head>

<body>

    <div>
        <div>
            <a href="<?php echo $base_url.'home'?>">Home</a>
        </div>
        <div>
            <a href="<?php echo $base_url.'rawmaterialmaster/add'?>">add Material</a>
        </div>

        <div id="body">
            <?php
            if (isset($records)) {
            ?>
                <table class="datatable">
                    <thead>
                        <tr>
                            <th>Material Name</th>
                            <th>Type</th>
                            <th>Unit</th>
                            <th>Acions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($records as $k=>$v) {  ?>
                            <tr>
                                <td>
                                    <?php echo $v['mrm_raw_material_name']; ?>
                                </td>
                                <td>
                                    <?php echo $v['mrm_type']; ?>
                                </td>
                                <td>
                                    <?php echo $v['mrm_unit']; ?>
                                </td>
                                <td>
                                    <a href="<?php echo $base_url.'rawmaterialmaster/edit/'.$v['mrm_id'];?>">Edit</a>
                                    <a href="<?php echo $base_url.'rawmaterialmaster/delete/'.$v['mrm_id'];?>" onclick="return confirm('Do you want delete this record')">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo '<div style="color:red;"><p>No Record Found!</p></div>';
            }
            ?>
        </div>
    </div>

</body>

</html>