<?php
include_once "../base.php";
$form = $Form->find($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <form id="form" action="../api/save.php" method="post">
        <table>
            <tr>
                <td>姓名:</td>
                <td>
                    <input type="text" name="name" id="name" value="<?= $form['name']; ?>">
                    <input type="hidden" name="id" value="<?= $form['id']; ?>">
                </td>
            </tr>
            <tr>
                <td>性別:</td>
                <td>
                    <select name="gender">
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    電話:
                </td>
                <td>
                    <input type="text" name="tel" id="tel" value="<?= $form['tel']; ?>">
                </td>
            </tr>
            <tr>
                <td>地址:</td>
                <td>
                    <input type="text" name="addr" id="addr" value="<?= $form['addr']; ?>">
                </td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>
                    <input type="text" name="email" id="email" value="<?= $form['email']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="提交">
                    <!-- <button>提交</button> -->
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</body>

<script>
    jQuery.validator.addMethod("tel", function(value, element) {
        var tel = /^09\d{2}-?\d{3}-?\d{3}$/;
        return this.optional(element) || (tel.test(value));

    }, "電話格式不正確");
    jQuery.validator.addMethod("email", function(value, element) {
        var email = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})*$/;
        return this.optional(element) || (email.test(value));

    }, "信箱格式不正確");
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                name: {
                    required: true
                },
                gender: {
                    required: true
                },
                tel: {
                    required: true,
                    tel: true,
                },
                addr: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                name: {
                    required: '必填'
                },
                gender: {
                    required: '必填'
                },
                tel: {
                    required: '必填',
                    minlength: '不得少於8位',
                    number: '電話需為數字且09開頭',
                },
                addr: {
                    required: true
                },
                email: {
                    required: '必填',
                    email: 'Email格式不正確',
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
        });
    });
</script>

</html>