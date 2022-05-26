<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
   
    <form action="../api/save.php" method="post">
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
                    <select name="gender">
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
                    <button>提交</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</body>

</html>