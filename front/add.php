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
   
    <!-- <form action="../api/save.php" method="post"> -->
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
                        <option value="" selected>請選擇</option>
                        <option value="男" >男</option>
                        <option value="女">女</option>
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
                    <button onclick="submit()">提交</button> 
                    <button onclick="reset()">重置</button> 
                </td>
                <td></td>
            </tr>
        </table>
    

    <script>
        function reset(){
            $("#name,#gender,#tel,#addr,#email").val("")
        }

        function submit(){
            let form={
                name:$("#name").val(),
                gender:$("#gender").val(),
                tel:$("#tel").val(),
                addr:$("#addr").val(),
                email:$("#email").val()
            }
            
            if(Object.values(form).indexOf('')>0){
                alert("所有欄位皆必填");
            }
        }
    </script>
</body>

</html>