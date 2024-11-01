<?php
    include 'code/config.php';
    page_protect();
    require('code/db.php');
    require('code/employee_db.php');
    require('code/equipment_event_log_db.php');
    
    $employee_name = $_SESSION['employee_name'];
    $employeeID    = $_SESSION['employee_id'];
    
    $RS_user_level  = get_emp_level($employeeID);
    $employee_level = $RS_user_level['level'];
    
    $rs_items = get_all_event_log();

?>
<?php include_once 'include/html-head.php' ?>
<?php include_once 'include/html-header.php' ?>

<main>

    <div class="row m-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Items</h3>

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
                            <th>Item ID</th>
                            <th>Employee_id</th>
                            <th>timestamp</th>
                            <th>change_type</th>
                            <th>action</th>
                            <th>update_status</th>
                            <th>old status</th>
                            <th>new status</th>
                            <th class="text-center">action</th>

                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach ($rs_items as $item): ?>

                            <tr>
                                <td><?= $item['item_event_log_id']; ?></td>
                                <td><?= $item['item_id']; ?></td>
                                <td><?= $item['employee_id']; ?></td>
                                <td><?= $item['timestamp']; ?></td>
                                <td><?= $item['change_type']; ?></td>
                                <td><?= $item['action']; ?></td>
                                <td><?= $item['update_status'] ?></td>
                                <td><?= $item['old_status'] ?></td>
                                <td><?= $item['new_status'] ?></td>
                                <td class="text-center">
                                    <a href="equipment-details.php?action=view&item_id=<?= $item['item_id']; ?>"
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
