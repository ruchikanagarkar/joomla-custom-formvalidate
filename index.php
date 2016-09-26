<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Add form validation
JHtml::_('behavior.formvalidator');
?>

<script type="text/javascript">
function submitvalidate() {
    var testform = document.adminForm;
    if (document.formvalidator.isValid(testform)) {
        document.adminForm.submit();
        return true;
    }
    else {
        var msg = new Array();
        msg.push('<b>Error:</b>');
        if(jQuery('#uploadfile').hasClass('invalid')){
            msg.push('<?php echo JText::_('Please verify that you have uploaded a csv/excel file!')?>');
         }
        document.getElementById('system-message-container').innerHTML = '<div class="alert alert-error"><button type="button" data-dismiss="alert" class="close">×</button><div>'+msg.join('\n')+'</div></div>';
        return false;
    }
}
</script>

<form class="form-validate" id="testForm" name="adminForm" enctype="multipart/form-data" method="post">
   <input name="fileupload" type="file" id="uploadfile" class="required" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
   <button type="submit" class="validate" onclick="submitvalidate()">Submit</button>
</form>