<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Material TO service List</title>
    <script src="<?php echo $js_path; ?>jquery-3.1.0.min.js"></script>
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
                            <th>Contract ID</th>
                            <th>Material Name</th>
                            <th>Qty</th> 
                            <th>Ratio</th>                             
                            <th>Acions</th>
                        </tr>
                    </thead>
                    <tbody id="loadlist">
                        <?php include 'data-list.php'; ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo '<div style="color:red;"><p>No Record Found!</p></div>';
            }
            ?>
            <div style="height:100px; padding-bottom:10px; padding-top: 20px;">
              <div>
            <form   method="post" name="addServiceToMatFrm" id="addServiceToMatFrm" action="<?php echo $base_url . 'materialtoservice/add'; ?>" enctype="multipart/form-data">
            <input type="hidden" id="baseUrl" name="baseUrl" value="<?php echo $base_url; ?>" />
            <table class="datatable">
                <thead>
                    <tr>                       
                        <th>Contract ID</th>
                        <th>Service Name</th>
                        <th>Material Name</th>                        
                        <th>Ratio</th>  
                        <th>Qty</th> 
                        
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td>
                            <input type="text" id="trme_msh_contract_id" name="trme_msh_contract_id"  size="10" >
                        </td>
                        <td>
                            <select id="trme_mrm_id" name="trme_mrm_id">
                                <option value="">--Select Service--</option>
                                <?php foreach($avl_service_cat as $k=>$v) {?>
                                <option value="<?php echo $v['msc_id'] ?>"><?php echo $v['mss_service_code'] ?></option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <select id="trme_tsbd_id" name="trme_tsbd_id">
                                <option value="">--Select Material--</option>
                                <?php foreach($avl_raw_mat as $km=>$vm) {?>
                                <option value="<?php echo $vm['mrm_id'] ?>"><?php echo $vm['mrm_raw_material_name'] ?></option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="trme_ratio" id="trme_ratio"  size="10" class="chkNumWDci" >
                        </td>
                        <td>
                            <input type="text" name="trme_item_qty" id="trme_item_qty"  size="10" class="chkNum" >
                        </td>
                    </tr>                    
                </tbody>
                
           
            </table>
            <div><label id="desc_service"></label></div>
            <div><label id="desc_rawmat"></label></div>
            <div><button type="button"  id="addServiceToMat">Save</button></div>    
             </form>
            </div>  
        </div>
    </div>
<script src="<?php echo $js_path; ?>material_to_service.js"></script>
</body>
</html>