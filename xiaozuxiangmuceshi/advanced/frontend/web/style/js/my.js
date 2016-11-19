$(function(){
    $('#formSubmit').click(function(){
        var type=$('input[name="type"]').val();
        var positionName=$('input[name="positionName"]').val();
        var department=$('input[name="department"]').val();
        var jobNature=$('input[name="jobNature"]').val();
        var salaryMin=$('input[name="salaryMin"]').val();
        var salaryMax=$('input[name="salaryMax"]').val();
        var city=$('input[name="city"]').val();
        var jing=$('input[name="jing"]').val();
        var xue=$('input[name="xue"]').val();
        var positionAdvantage=$('input[name="positionAdvantage"]').val();
        var positionAddress=$('input[name="positionAddress"]').val();
        var email=$('input[name="email"]').val();
        var forwardEmail=$('input[name="forwardEmail"]').val();
          var send={type:type,positionName:positionName,department:department,jobNature:jobNature,salaryMin:salaryMin,salaryMax:salaryMax,city:city,jing:jing,xue:xue,positionAdvantage:positionAdvantage,positionAddress:positionAddress,email:email,forwardEmail:forwardEmail};
        $.post('?r=create/insert',send,function(msg){
            alert(msg)
        },'json')
//alert(positionName);
    })
})