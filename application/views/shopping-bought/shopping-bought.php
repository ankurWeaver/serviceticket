<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shopping Bought List</title>
</head>

<body>

    <div>

        <div>
            <a href="<?php echo $base_url.'home'?>">Home</a>
        </div>

        <div id="body">
            <?php
            if (isset($records)) {
            ?>
                <table class="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Onsite Supervisor Name</th>
                            <th>Onsite Manager Name</th>
                            <th>Explode</th> 
                            <th>Contract ID</th> 
                            <th>Status</th>
                            <th>Acions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($records as $k=>$v) {  ?>
                            <tr>
                                <td>
                                    <?php echo $v['tsbd_id']; ?>
                                </td>
                                <td>
                                    <?php echo $v['tsbd_onsite_supervisor_name']; ?>
                                </td>
                                <td>
                                    <?php echo $v['tsbd_onsite_mgr_name']; ?>
                                </td>
                                <td>
                                    <?php echo $v['tsbd_is_explode']; ?>
                                </td>
                                <td>
                                    <?php echo $v['tsbh_contract_id']; ?>
                                </td>
                                <td>
                                    <?php echo $v['tsbh_status']; ?>
                                </td>
                                <td>
                                    <a href="<?php echo $base_url.'shoppingbought/edit/'.$v['tsbd_id'];?>">Edit</a>
                                    <a href="<?php echo $base_url.'shoppingbought/delete/'.$v['tsbd_id'];?>" onclick="return confirm('Do you want delete this record')">Delete</a>
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