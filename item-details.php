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
$employeeID = $_SESSION['employee_id'];

$RS_user_level = get_emp_level($employeeID);
$employee_level = $RS_user_level['level'];

$item = new Item();
$item->setData(get_item_details($item_id));


require_once 'assets/qr-generator/phpqrcode/qrlib.php';


?>
<?php include_once 'include/html-head.php' ?>
<?php include_once 'include/html-header.php' ?>

<main class="m-3">

    <div class="row text-center">
        <div class="col-lg-2 col-md-6">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5><?= $item->getProductName() ?></h5>
                </div>
                <div class="card-footer">
                    <?= $item->getManufacturer() ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5>Category</h5>
                </div>
                <div class="card-footer text-center ">
                    <?= $item->getCategory() ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card  h-100">
                <div class="card-body text-center">

                    <h5>Status</h5>

                </div>
                <div class="card-footer text-center <?= get_item_status_color($item->getStatus()) ?>">
                    <h6>
                        <?= ((empty($item->getStatus())) ? '-' : $item->getStatus()) ?>
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
        <div class="col-lg-2 col-md-6">
            <div class="card  h-100">
                <div class="card-body text-center">
                    <h5>Location</h5>
                </div>
                <div class="card-footer text-center">
                    <h6>
                        <?= ((empty($item->getLocation())) ? '-' : $item->getLocation()) ?>
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
                        <div class="d-inline-block h5">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <tbody>
                        <tr>
                            <th class="text-right">Name</th>
                            <td class="text-left"><?= $item->getProductName() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Category</th>
                            <td class="text-left"><?= $item->getCategory() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Purchase Date</th>
                            <td class="text-left"><?= $item->getPurchaseDate() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Exp. Date</th>
                            <td class="text-left"><?= $item->getExpirationDate() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Location</th>
                            <td class="text-left"><?= $item->getLocation() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Barcode</th>
                            <td class="text-left"><?= $item->getBarcode() ?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Serial#</th>
                            <td class="text-left"><?= $item->getSerialNumber() ?></td>
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

        <div class="col-8"><h1>right</h1></div>

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
                <img src="generate.php?id=><?= $item_id ?>"/>
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
