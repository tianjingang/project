<?php
$db=\Yii::$app->db;
$session=\Yii::$app->session;
$sname=$session['username'];
$ar=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
$semail=$ar['semail'];
$br=$db->createCommand("select * from company where company_email='$semail'")->queryOne();
$com=$br['com'];
$cr=$db->createCommand("select * from detail where c_name='$com'")->queryOne();
$c_name=$cr['c_name'];
?>
<body style="background-color: red;">
<center>
    <h1><font color="red;">公司基本信息</font></h1>
    <form action="?r=company/addcompany" method="post" enctype="multipart/form-data" >
        <table>
            <tr>
                <td>公司全称</td>
                <td><input type="text" name="c_name" value="<?php echo $c_name?>"/></td>
            </tr>
            <tr>
                <td>公司简称</td>
                <td><input type="text" placeholder="请输入公司简称" value="" name="c_nameshort"></td>
            </tr>
            <tr>
                <td>公司LOGO</td>
                <td> <input type="file" name="c_logo"/></td>
            </tr>
            <tr>
                <td>公司网址</td>
                <td> <input type="text" placeholder="请输入公司网址" name="c_http"></td>
            </tr>
            <tr>
                <td>所在城市</td>
                <td><input type="text" placeholder="请输入工作城市，如：北京" name="c_city"></td>
            </tr>
            <tr>
                <td>行业领域</td>
                <td>
                    <select name="c_field">
                        <option value="移动互联网">移动互联网</option>
                        <option value="电子商务">电子商务</option>
                        <option value="社交">社交</option>
                        <option value="企业服务">企业服务</option>
                        <option value="O2O">O2O</option>
                        <option value="教育">教育</option>
                        <option value="文化艺术">文化艺术</option>
                        <option value="游戏">游戏</option>
                        <option value="在线旅游">在线旅游</option>
                        <option value="金融互联网">金融互联网</option>
                        <option value="健康医疗">健康医疗</option>
                        <option value="生活服务">生活服务</option>
                        <option value="硬件">硬件</option>
                        <option value="安全">安全</option>
                        <option value="云计算">云计算</option>
                        <option value="移动广告">移动广告</option>
                        <option value="社会化营销">社会化营销</option>
                        <option value="视频多媒体">视频多媒体</option>
                        <option value="媒体">媒体</option>
                        <option value="智能家居">智能家居</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>公司规模</td>
                <td>
                    <select name="c_size">
                        <option value="少于15人">少于15人</option>
                        <option value="15-50人">15-50人</option>
                        <option value="50-150人">50-150人</option>
                        <option value="150-500人">150-500人</option>
                        <option value="500-2000人">500-2000人</option>
                        <option value="2000人以上">2000人以上</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>发展阶段</td>
                <td><select name="c_stage">
                        <option value="未融资">未融资</option>
                        <option value="天使轮">天使轮</option>
                        <option value="A轮">A轮</option>
                        <option value="B轮">B轮</option>
                        <option value="C轮">C轮</option>
                        <option value="D轮及以上">D轮及以上</option>
                        <option value="上市公司">上市公司</option>
                    </select></td>
            </tr>
            <tr>
                <td>投资机构</td>
                <td><input type="text" placeholder="请输入投资机构，如真格基金，创新工场" name="c_organiz">
                </td>
            </tr>
            <tr>
                <td>一句话介绍</td>
                <td><input type="text" placeholder="一句话概括公司亮点，如公司愿景、领导团队等，限50字" maxlength="50" name="c_introduce" id="temptation">
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