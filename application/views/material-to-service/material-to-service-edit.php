<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Material To Server - Edit</title>
        <script src="<?php echo $js_path; ?>jquery-3.1.0.min.js"></script>
    </head>

    <body>
        <div id="container">


            <div>
                <a href="">Return to List</a>
            </div>

            <div id="body">    
                <form id="form" action="<?php echo $base_url . 'materialtoservice/edit/' . $row[0]['trme_id']; ?>" method="POST">
                    <input type="hidden" id="baseUrl" name="baseUrl" value="<?php echo $base_url; ?>" />
                    <input type="hidden" id="trme_msh_contract_id" name="trme_msh_contract_id" value="<?php echo $row[0]['trme_msh_contract_id']; ?>" />
                    <div> 
                        <label>Service Name</label>
                        <select id="trme_mrm_id" name="trme_mrm_id">
                            <option value="">--Select Service--</option>
                            <?php foreach ($avl_service_cat as $k => $v) { ?>
                                <option value="<?php echo $v['msc_id'] ?>" <?php if($v['msc_id'] === $row[0]['trme_mrm_id']){ echo 'selected';} ?>><?php echo $v['mss_service_code'] ?></option>
                            <?php } ?>
                        </select>
                        <div><label id="desc_service"></label></div>
                    </div>
                    <div> 
                        <label>Raw Material</label>
                        <select id="trme_tsbd_id" name="trme_tsbd_id">
                            <option value="">--Select Category--</option>
                            <?php foreach ($avl_raw_mat as $km => $vm) { ?>
                                <option value="<?php echo $vm['mrm_id'] ?>" <?php if($vm['mrm_id'] === $row[0]['trme_tsbd_id']){ echo 'selected';} ?>><?php echo $vm['mrm_raw_material_name'] ?></option>
                            <?php } ?>
                        </select>
                        <div><label id="desc_rawmat"></label></div>
                    </div>
                    <div>
                        <label>Ratio</label>
                        <input type="text" name="trme_ratio"  size="10" value="<?php echo $row[0]['trme_ratio']; ?>" class="chkNumWDci" />
                    </div>

                    <div>
                        <label>Qty/Unit</label>
                        <input type="text" name="trme_item_qty"  size="10" value="<?php echo $row[0]['trme_item_qty']; ?>" class="chkNum" />
                    </div>

                    <p><input type="submit" name="submit" value="Submit" /></p>
                </form>
            </div>
        </div>
    </body>
<script src="<?php echo $js_path; ?>material_to_service.js"></script>
</html>