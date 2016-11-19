<body style="background-color: #0044cc;">
<center>
    <table style="text-align: center;margin-top: 300px;">
        <tr>
            <td>公司电话</td>
            <td>公司邮箱</td>
            <td>公司名称</td>
        </tr>
        <?php foreach($poss as $key=>$val){ ?>
            <tr>
                <td><?php echo $val['company_phone']?></td>
                <td><?php echo $val['company_email']?></td>
                <td><?php echo $val['com']?></td>
            </tr>
        <?php } ?>
    </table>
</center>
</body>