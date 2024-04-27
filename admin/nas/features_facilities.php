<?php

require ('../inc/db_config.php');
require ('../inc/essentials.php');
adminLogin();

if (isset($_POST['add_feature'])) {
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `features`(`name`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q, $values, 's');
    echo $res;

}


if (isset($_POST['get_features'])) {
    $res = selectAll('features');
    $i=1;

    while ($row = mysqli_fetch_assoc($res))
    {
        echo <<<data
        <tr>
            <td>$i</td>
            <td>$row[name]</td>
            <td>
                <button onclick="del_features($row[id])" class="btn btn-danger btn-sm shadow-none"  type="button" >
                    <i class="bi bi-trash3"></i>Delete
                </button>
            </td>
        </tr>
        data;
        $i++;
    }
}

if (isset($_POST['del_features'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['del_features']];

    $q = "DELETE FROM `features` WHERE `id`=?";
    $res = deletes($q,$values,'i');
    echo $res;
}
?>