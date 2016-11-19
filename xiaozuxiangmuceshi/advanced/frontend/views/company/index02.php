<body style="background-color: #0000ff;">
<center>
    <h1><font color="red;">公司产品</font></h1>
    <form action="?r=company/addproduct" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>产品海报</td>
                <td> <input type="file" name="c_product"/></td>
            </tr>
            <tr>
                <td>产品名称</td>
                <td> <input type="text" placeholder="请输入产品名称" name="c_productname"></td>
            </tr>
            <tr>
                <td>产品地址</td>
                <td> <input type="text" placeholder="请输入产品地址" name="c_producturl"></td>
            </tr>
            <tr>
                <td>产品介绍</td>
                <td>                    <textarea name="c_productself" id="" cols="40" rows="10" placeholder="请输入产品介绍简介"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="下一步"/></td>
            </tr>
        </table>
    </form>
</center>
</body>