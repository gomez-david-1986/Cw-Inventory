<?php
    include 'code/config.php';
    page_protect();
    require('code/db.php');
    require('code/employee_db.php');
    require('code/equipment_db.php');
    
    $employee_name = $_SESSION['employee_name'];
    $employeeID    = $_SESSION['employee_id'];
    
    $RS_user_level  = get_emp_level($employeeID);
    $employee_level = $RS_user_level['level'];
    
    $rs_eqipment = getAllItems();
    
    print_r($rs);


?>
<?php include_once 'include/html-head.php' ?>
<?php include_once 'include/html-header.php' ?>

<main>

    <div class="row m-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Equipment</h3>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-sm btn-success"
                                data-bs-toggle="modal"
                                data-bs-target="#AddCustomerModal">Add New Item
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="items-tbl" class="table table-sm table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Manufacturer</th>
                            <th>location</th>
                            <th>Serial</th>
                            <th>Active</th>
                            <th>Available</th>
                            <th>Loanable</th>
                            <th>status</th>
                            <th class="text-center">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach ($rs_eqipment as $equipment): ?>

                            <tr>
                                <td><?= $equipment['equipment_id']; ?></td>
                                <td><?= $equipment['product_name']; ?></td>
                                <td><?= $equipment['category']; ?></td>
                                <td><?= $equipment['manufacturer']; ?></td>
                                <td><?= $equipment['location']; ?></td>
                                <td><?= $equipment['serial']; ?></td>
                                <td><?= $equipment['active'] ?></td>
                                <td><?= $equipment['available'] ?></td>
                                <td><?= $equipment['loanable'] ?></td>
                                <td><?= $equipment['status'] ?></td>
                                <td class="text-center">
                                    <a href="equipment-details.php?action=view&equipment_id=<?= $equipment['equipment_id']; ?>"
                                            class="btn btn-icon btn-primary btn-sm"
                                            title="Open"><i class="fa fa-folder-open"></i></a></td>
                            </tr>
                        
                        <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div><!-- end col -->
    </div>


</main>

<?php include "include/jquery-imports.php"; ?>

<script>

    var buttonCommon = {
        exportOptions: {
            format: {}
        }
    };


    $('#items-tbl').DataTable({
        searching: true,
        ordering: true,
        paging: true,

    });


</script>

<?php include_once 'include/html-footer.php' ?>
