<?php
include_once "../base.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>編號</th>
            <th>姓名</th>
            <th>性別</th>
            <th>電話</th>
            <th>地址</th>
            <th>E-mail</th>
            <th>修改</th>
            <th>刪除</th>
        </tr>

        <?php
        $rows = $Form->all();
        foreach ($rows as $row) {
        ?>

            <tr>
                <td>
                    <?= $row['id']; ?>
                </td>
                <td>
                    <?= $row['name']; ?>
                </td>
                <td>
                    <?= $row['gender']; ?>
                </td>
                <td>
                    <?= $row['tel']; ?>
                </td>
                <td>
                    <?= $row['addr']; ?>
                </td>
                <td>
                    <?= $row['email']; ?>
                </td>
                <td>
                    <button onclick="location.href='edit.php?id=<?= $row['id']; ?>'">修改</button>
                </td>
                <td>
                    <button onclick="del(<?= $row['id']; ?>)">刪除</button>
                </td>
            </tr>

        <?php
        }
        ?>
        <tr>
            <td colspan="8" style="text-align:right">
                <button onclick="location.href='add.php'">新增</button>
            </td>
        </tr>
    </table>

    <script>
        function del(id){
            let msg="確定要刪除資料?";
            if(confirm(msg)==true){
                $.post("../api/del.php",{id},()=>{
                    location.reload();
                })
            }
        }
    </script>
</body>

</html>