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

    <form id=form action="../api/save.php" method="post">
        <table>
            <tr>
                <td>姓名:</td>
                <td>
                    <input type="text" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td>性別:</td>
                <td>
                    <select name="gender" id="gender">
                        <option value="0">男</option>
                        <option value="1">女</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    電話:
                </td>
                <td>
                    <input type="text" name="tel" id="tel">
                </td>
            </tr>
            <tr>
                <td>地址:</td>
                <td>
                    <input type="text" name="addr" id="addr">
                </td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>
                    <input type="text" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="提交">
                    <input type="reset" value="重置">
                    <input type="button" onclick="location.href='form.php'" value="取消">
                </td>
                <td></td>
            </tr>
        </table>
    </form>


    <script>
        // function reset() {
        //     $("#name,#gender,#tel,#addr,#email").val("")
        // }

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
                        required: '必填'
                    },
                    email: {
                        required: '必填'
                    },
                },
                submitHandler: function(form) {
                    var name = $("#name").val();
                    var gender = $("#gender").val();
                    var tel = $("#tel").val();
                    var addr = $("#addr").val();
                    var email = $("#email").val();
                    $.ajax({
                        url: '../api/save.php',
                        type: 'POST',
                        data: {
                            name: name,
                            gender: gender,
                            tel: tel,
                            addr: addr,
                            email: email,
                        },
                        success: function(data) {
                            window.location.href = "form.php";
                        }
                    });
                },
            });
        });
        // function submit() {
        //     let form = {
        //         name: $("#name").val(),
        //         gender: $("#gender").val(),
        //         tel: $("#tel").val(),
        //         addr: $("#addr").val(),
        //         email: $("#email").val()
        //     }

        //     if (Object.values(form).indexOf('') > 0) {
        //         alert("所有欄位皆必填");
        //     }
        // }
    </script>
</body>

</html>