<body style="background-color: #006b52;">
<center>
    <table style="text-align: center;margin-top: 300px;">
        <tr>
            <td>职位类型</td>
            <td>职位名称</td>
            <td>最高薪资</td>
            <td>工作城市</td>
            <td>工作年限</td>
            <td>学历要求</td>
            <td>福利</td>
            <td>地址</td>
        </tr>
        <?php foreach($pos as $key=>$val){?>
            <tr>
                <td><?php echo $val['p_positiontype']?></td>
                <td><?php echo $val['p_positionname']?></td>
                <td><?php echo $val['p_salarymin']?></td>
                <td><?php echo $val['p_work']?></td>
                <td><?php echo $val['p_workyear']?></td>
                <td><?php echo $val['p_education']?></td>
                <td><?php echo $val['p_positionadvantage']?></td>
                <td><?php echo $val['p_positionaddress']?></td>
            </tr>
        <?php }?>
    </table>
</center>
</body>