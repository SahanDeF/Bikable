<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mechanics/repairLogs.css">
    <title>Repair Log</title>
</head>
<body>
    <!-- finalized side bar -->
    <?php require 'sidebar-mechanic.php'; ?>


    <!-- In the framework right side of the web page view -->
    <section class="admin_data_area">

        <!-- dashboard section -->
        <?php require 'header.php'; ?>

        <!-- REAL DATA AREA -->

        <!-- admin real data top -->
        <div class="admin__data__area--top">
            <div class="admin__data__area__top--title">Repair Log</div>
            <div class="admin__data_area__top--twobuttons">
                <div class="add_user_button">
                    <input type="button" class="btn btn_add" value="View Archived" onclick="location.href='<?php echo URLROOT;?>/mechanics/archivedRepairLogControl'">
                </div>
                
                <form action="<?php echo URLROOT;?>/mechanics/archiveRepairLogs" method="POST" id="userInterface">
                <div class="delete_user_button">
                    <input type="submit" class="btn btn_delete" value="Archive Selected">
                </div>
            </div>

        </div>

        <div class="admin__table__area">
            <table>
                <tr>
                    <th style="width: 3%;"></th>
                    <th style="width: 5%;">Log ID</th>
                    <th style="width: 6%;">Mechanic ID</th>
                    <th style="width: 5%;">Bicycle ID</th>
                    <th style="width: 10%;">Problem Title</th>
                    <th style="width: 15%;">Problem Description</th>
                    <!-- <th style="width: 8%;">Estimated Cost</th> -->
                    <th style="width: 5%;">Final Cost</th>
                    <th style="width: 7%;">Date In</th>
                    <th style="width: 7%;">Date Out</th>
                    <th style="width: 20%;">Repair Notes</th>
                    <th style="width: 7%;">Report ID</th>
                    <th style="width: 5%;"></th>

                    <?php foreach($data['repairLog_details'] as $oneObject) : ?>
                    <tr>
                        <td><input type="checkbox" name="selected[]" value="<?php echo $oneObject->logID ?>"></td>
                        <td><?php echo $oneObject->logID ?></td>
                        <td><?php echo $oneObject->mechanicID ?></td>
                        <td><?php echo $oneObject->bicycleID ?></td>
                        <td><?php echo $oneObject->problemTitle ?></td>
                        <td><?php 
                                if(!$oneObject->problemDescription){
                                    echo "-";
                                }else{
                                    echo $oneObject->problemDescription;
                                }
                            ?>
                        </td>
                        <!-- <td><?php echo $oneObject->	estCost ?></td> -->
                        <td><?php 
                                if(!$oneObject->finalCost){
                                    echo "-";
                                }else{
                                    echo $oneObject->finalCost;
                                }
                            ?>
                        </td>
                        <td><?php echo $oneObject->	dateIn ?></td>
                        <td><?php 
                                if(!$oneObject->dateOut){
                                    echo "-";
                                }else{
                                    echo $oneObject->dateOut;
                                }
                            ?>
                        </td>
                        <td><?php 
                                if(!$oneObject->repairNotes){
                                    echo "-";
                                }else if(strlen($oneObject->repairNotes) > 50){
                                    echo substr($oneObject->repairNotes, 0, 50) . "...";
                                }else{
                                    echo $oneObject->repairNotes;
                                }
                                // echo $oneObject->	repairNotes ?></td>
                        <td><?php 
                                if(!$oneObject->reportID){
                                    echo "-";
                                }else{
                                    echo $oneObject->reportID;
                                }
                            ?>
                        </td>
                        <td>
                        <!-- update icon svg format -->
                        <a href="<?php echo URLROOT;?>/mechanics/viewRepairLog?logID=<?php echo $oneObject->logID;?>"><img src="<?php echo URLROOT;?>/public/images/mechanics/dashboardIcons/editIcon1.png" alt="edit"></a>
                    </tr>
                <?php endforeach; ?>

            </table>
            </form>
        </div>
    </section>

    <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // prevent the form from submitting

        // get all the checkboxes in the table
        const checkboxes = document.querySelectorAll('table input[type="checkbox"]');

        // collect the values of the checked checkboxes
        const selectedRows = [];
        checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            selectedRows.push(checkbox.value);
        }
        });

        // add the selected rows to a hidden input field in the form
        const input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'selectedRows');
        input.setAttribute('value', JSON.stringify(selectedRows));
        this.appendChild(input);

        // submit the form
        this.submit();
    });
    </script>

</body>
</html>