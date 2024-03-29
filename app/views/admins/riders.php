<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admins/administrator.css">
    <link rel="icon" href="<?php echo URLROOT;?>/public/images/general/favicon.png">
    <title>Riders</title>
</head>
<body>
    <!-- Finalized Side Bar -->
    <?php require APPROOT . '/views/inc/sidebar-admin.php'; ?>


    <!-- In the framework right side of the web page view -->
    <section class="admin_data_area">

        <!-- dashboard section -->
        <?php require APPROOT . '/views/inc/header-admin.php'; ?>

        <!-- REAL DATA AREA -->

        <!-- admin real data top -->
        <div class="admin__data__area--top">
            <div class="admin__data__area__top--title">Riders</div>
            <div class="admin__data_area__top--twobuttons">
                <div class="add_user_button">
                    <input type="button" class="btn btn_add" value="Add User" onclick="location.href='<?php echo URLROOT;?>/admins/addUser'">
                </div>
                <form action="<?php echo URLROOT;?>/admins/deleteUsers" method="POST" id="userInterface">
                <div class="delete_user_button">
                    <input type="submit" class="btn btn_delete" value="Delete Selected">
                </div>
            </div>

        </div>

        <div class="admin__table__area">
            <table>
                <tr>
                    <th style="width: 3%;"></th>
                    <th style="width: 13%;">Username</th>
                    <th style="width: 10%;">UserID</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 20%;">Email</th>
                    <th style="width: 15%;">NIC</th>
                    <th style="width: 10%;">Role</th>
                    <th style="width: 5%;"></th>

                </tr>

                <!-- <tr>
                    <td><input type="checkbox" class="cbox"></td>
                    <td>Shehaan Avishka</td>
                    <td>1238524</td>
                    <td>Inactive</td>
                    <td>OwnerShehaan@gmail.com</td>
                    <td>200002403065</td>
                    <td>Admin</td>
                    <td>
                        update icon svg format
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="17" cy="17" r="17" fill="black"/>
                            <path d="M19.06 14L20 14.94L10.92 24H10V23.08L19.06 14ZM22.66 8C22.41 8 22.15 8.1 21.96 8.29L20.13 10.12L23.88 13.87L25.71 12.04C26.1 11.65 26.1 11 25.71 10.63L23.37 8.29C23.17 8.09 22.92 8 22.66 8ZM19.06 11.19L8 22.25V26H11.75L22.81 14.94L19.06 11.19Z" fill="white"/>
                        </svg>
                            
                    </td>
                </tr> -->
        

                <?php foreach($data['rider_details'] as $oneObject) : ?>
                    <tr>
                    <td><input type="checkbox" name="selected[]" value="<?php echo $oneObject->userID ?>"></td>
                        <td><?php echo $oneObject->firstName . " " . $oneObject->lastName ?></td>
                        <td><?php echo $oneObject->userID ?></td>
                        <td>
                            <?php 
                                if($oneObject->status == 0){
                                    echo "Active";
                                }else{
                                    echo "Inactive";
                                }
                            
                            ?>
                        </td>
                        <td><?php echo $oneObject->emailAdd ?></td>
                        <td><?php echo $oneObject->NIC ?></td>
                        <td><?php echo $oneObject->role ?></td>
                        <td>
                        <!-- update icon svg format -->
                        <!-- <form action="<?php echo URLROOT;?>/admins/viewUserProfile" method="post">
                                <input type="hidden" name="userID" value="<?php echo $oneObject->userID;?>">
                                <input type="hidden" name="userStatus" value="<?php echo $oneObject->status;?>">
                                <input type="image" src="<?php echo URLROOT;?>/public/images/admins/editIcon1.png" name="edit" value="edit" >
                        </form> -->
                        <a href="<?php echo URLROOT;?>/admins/viewUserProfile?userID=<?php echo $oneObject->userID;?>"><img src="<?php echo URLROOT;?>/public/images/admins/editIcon1.png" alt="edit"></a>
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