<?php

include 'code/config.php';
include 'code/formatting_functions.php';
page_protect();

use classes\Equipment;

include_once('classes/Equipment.php');

require('code/db.php');
require('code/employee_db.php');
require('code/equipment_db.php');
require('code/equipment_event_log_db.php');
require_once 'assets/qr-generator/phpqrcode/qrlib.php';

foreach ($_GET as $key => $value) {
    $data_get[$key] = $value; // post variables are filtered
}


$equipment_id = (int)$data_get['equipment_id'];

$employee_name = $_SESSION['employee_name'];
$employeeID = $_SESSION['employee_id'];

$RS_user_level = get_emp_level($employeeID);
$employee_level = $RS_user_level['level'];

$equipment = new Equipment();
$equipment->setData(get_item_details($equipment_id));

$rs_equipment_event_log = get_equipment_event_log_for_item($equipment->getEquipmentId());


?>
<?php include_once 'include/html-head.php' ?>
<?php include_once 'include/html-header.php' ?>

<main class="m-3">

    <div class="row text-center">
        <div class="col-lg-2 col-md-6 mt-2">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5><?= $equipment->getProductName() ?></h5>
                </div>
                <div class="card-footer">
                    <?= $equipment->getManufacturer() ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6 mt-2">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5>Category</h5>
                </div>
                <div class="card-footer text-center ">
                    <?= $equipment->getCategory() ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6 mt-2">
            <div class="card  h-100">
                <div class="card-body text-center">

                    <h5>Status</h5>

                </div>
                <div class="card-footer text-center <?= get_item_status_color($equipment->getStatus()) ?>">
                    <h6>
                        <?= ((empty($equipment->getStatus())) ? '-' : $equipment->getStatus()) ?>
                    </h6>
                </div>

            </div>
        </div>
        <div class="col-lg-2 col-md-6 mt-2">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5>Available</h5>
                </div>

                <div class="card-footer text-center <?= get_status_color($equipment->getAvailable()) ?>">
                    <h6>
                        <?= $equipment->getAvailable() ?>
                    </h6>
                </div>

            </div>
        </div>
        <div class="col-lg-2 col-md-6 mt-2">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5>Loanable</h5>
                </div>

                <div class="card-footer text-center <?= get_status_color($equipment->getLoanable()) ?>">
                    <h6>
                        <?= $equipment->getLoanable() ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6 mt-2">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5>Location</h5>
                </div>
                <div class="card-footer text-center">
                    <h6>
                        <?= ((empty($equipment->getLocation())) ? '-' : $equipment->getLocation()) ?>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Equipment Details
                </div>

                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <tbody>
                        <tr>
                            <th class="text-right">Equipment ID</th>
                            <td class="text-left"><?= $equipment->getEquipmentId() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Name</th>
                            <td class="text-left"><?= $equipment->getProductName() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Category</th>
                            <td class="text-left"><?= $equipment->getCategory() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Purchase Date</th>
                            <td class="text-left"><?= $equipment->getPurchaseDate() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Exp. Date</th>
                            <td class="text-left"><?= $equipment->getExpirationDate() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Location</th>
                            <td class="text-left"><?= $equipment->getLocation() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Barcode</th>
                            <td class="text-left"><?= $equipment->getBarcode() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Serial#</th>
                            <td class="text-left"><?= $equipment->getSerialNumber() ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="card-footer text-center">

                    <button data-bs-toggle="modal" data-bs-target="#DuplicateProjectModal"
                            class="btn btn-purple-lgt btn-sm"
                            title="View QR Code"><i class="fa fa-qrcode"></i></button>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-12 col-sm-12">

            <div class="card">
                <div class="card-header">
                    Equipment Log
                </div>
                <div class="card-body">


                    <table class="table table-bordered table-striped ">
                        <thead>
                        <tr>
                            <th>TimeStamp</th>
                            <th>change_type</th>
                            <th>action</th>

                            <th>old_status</th>
                            <th>new_status</th>
                            <th>Field</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Note</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rs_equipment_event_log as $equipment_log): ?>
                            <tr class="<?= ($equipment_log["update_status"] == 0 )? "table-danger" : "" ?>">
                                <td><?= $equipment_log["timestamp"] ?></td>
                                <td><?= $equipment_log["change_type"] ?></td>
                                <td><?= $equipment_log["action"] ?></td>

                                <td><?= $equipment_log["old_status"] ?></td>
                                <td><?= $equipment_log["new_status"] ?></td>
                                <td><?= $equipment_log["field"] ?></td>
                                <td><?= $equipment_log["from"] ?></td>
                                <td><?= $equipment_log["to"] ?></td>
                                <td><?= $equipment_log["note"] ?></td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

</main>

<?php include "include/jquery-imports.php"; ?>


<div id="DuplicateProjectModal" class="modal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Qr Code</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="printThis">
                <img src="generate.php?id=><?= $equipment_id ?>"/>
            </div>
            <div class="modal-footer">
                <button type="button" id="Print" class="btn btn-primary">Print</button>
                <button class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<style>
    @media screen {
        #printSection {
            display: none;
        }
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #printSection, #printSection * {
            visibility: visible;
        }

        #printSection {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

<script>
    document.getElementById("Print").onclick = function () {
        printElement(document.getElementById("printThis"));
    };

    function printElement(elem) {
        var domClone = elem.cloneNode(true);

        var $printSection = document.getElementById("printSection");

        if (!$printSection) {
            var $printSection = document.createElement("div");
            $printSection.id = "printSection";
            document.body.appendChild($printSection);
        }

        $printSection.innerHTML = "";
        $printSection.appendChild(domClone);
        window.print();
    }
</script>

<?php include_once 'include/html-footer.php' ?>
