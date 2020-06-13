<?php foreach ($records as $k => $v) { ?>
    <tr>
        <td>
            <?php echo $v['trme_id']; ?>
        </td>
        <td>
            <?php echo $v['trme_msh_contract_id']; ?>
        </td>
        <td>
            <?php echo $v['mrm_raw_material_name']; ?>
        </td>
        <td>
            <?php echo $v['trme_item_qty']; ?>
        </td>
        <td>
            <?php echo $v['trme_ratio']; ?>
        </td>

        <td>
            <a href="<?php echo $base_url . 'materialtoservice/edit/' . $v['trme_id']; ?>">Edit</a>
            <a href="<?php echo $base_url . 'materialtoservice/delete/' . $v['trme_id']; ?>" onclick="return confirm('Do you want delete this record')">Delete</a>
        </td>
    </tr>
    <?php    }    ?>
                    