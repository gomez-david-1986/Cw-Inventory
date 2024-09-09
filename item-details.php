<?php
    
    include 'code/config.php';
    include 'code/formatting_functions.php';
    page_protect();
    
    use classes\Item;
    
    include_once('classes/Item.php');
    
    require('code/db.php');
    require('code/employee_db.php');
    require('code/item_db.php');
    
    
    foreach ($_GET as $key => $value) {
        $data_get[$key] = $value; // post variables are filtered
    }
    
    
    $item_id = (int)$data_get['item_id'];
    
    $employee_name = $_SESSION['employee_name'];
    $employeeID    = $_SESSION['employee_id'];
    
    $RS_user_level  = get_emp_level($employeeID);
    $employee_level = $RS_user_level['level'];
    
    $item = new Item();
    $item->setData(get_item_details($item_id));

?>
<?php include_once 'include/html-head.php' ?>
<?php include_once 'include/html-header.php' ?>

<main class="m-3">

    <div class="row text-center">
        <div class="col-lg-4 col-md-6">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5><?= $item->getProductName() ?></h5>
                    <h6>b</h6>

                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card  h-100">
                <div class="card-body text-center">

                    <h5>c</h5>

                    <h6><?= $item->getCategory() ?></h6>
                </div>

            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card  h-100">
                <div class="card-body text-center">

                    <h5>Active</h5>

                </div>
                <div class="card-footer text-center <?= get_status_color($item->getActive()) ?>">
                    <h6>
                        <?= $item->getActive() ?>
                    </h6>
                </div>

            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5>Available</h5>
                </div>

                <div class="card-footer text-center <?= get_status_color($item->getAvailable()) ?>">
                    <h6>
                        <?= $item->getAvailable() ?>
                    </h6>
                </div>

            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5>Loanable</h5>
                </div>

                <div class="card-footer text-center <?= get_status_color($item->getLoanable()) ?>">
                    <h6>
                        <?= $item->getLoanable() ?>
                    </h6>
                </div>

            </div>
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-4">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-inline-block h5"></div>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <tbody>
                        <tr>
                            <th class="text-right">Name</th>
                            <td class="text-left"><?= $rs_items["item_id"] ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Category</th>
                            <td class="text-left"></td>
                        </tr>
                        <tr>
                            <th class="text-right">Purchase Date</th>
                            <td class="text-left"></td>
                        </tr>
                        <tr>
                            <th class="text-right">Exp. Date</th>
                            <td class="text-left"></td>
                        </tr>
                        <tr>
                            <th class="text-right">Location</th>
                            <td class="text-left"></td>
                        </tr>
                        <tr>
                            <th class="text-right">Barcode</th>
                            <td class="text-left"></td>
                        </tr>
                        <tr>
                            <th class="text-right">Serial#</th>
                            <td class="text-left"></td>
                        </tr>


                        </tbody>
                    </table>

                </div>
                <div class="card-footer text-center">
                    <a href="customer-view.php?action=view&CustomerID="
                       class="btn btn-info  btn-sm"
                       title="Go Back To Customer"><i class="fa fa-arrow-left"></i></a>
                    <button data-bs-toggle="modal" data-bs-target="#DuplicateProjectModal"
                            class="btn btn-purple-lgt btn-sm"
                            title="Duplicate Project"><i class="fa fa-clone"></i></button>
                    <button data-bs-toggle="modal" data-bs-target="#EditProjectModal" class="btn btn-orange btn-sm"
                            title="Edit Project"><i class="fa fa-pencil"></i></button>
                    <button data-bs-toggle="modal" data-bs-target="#ReassignEmployeeModal"
                            class="btn btn-mint btn-sm" title="Reassign Employee">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </button>

                    <button data-bs-toggle="modal" data-bs-target="#LostProjectModal" class="btn btn-danger btn-sm"
                            title="Mark as lost"><i class="fa fa-face-angry"></i></button>
                </div>
            </div>
        </div>

        <div class="col-8"><h1>right</h1></div>

    </div>

</main>

<?php include "include/jquery-imports.php"; ?>

<?php include_once 'include/html-footer.php' ?>
