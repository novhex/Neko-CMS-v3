$(document).ready(function(){

var original_category = $("#categories").val();

         $('#myTags').tagit({
                
                singleField: true,
                singleFieldNode: $('#single_field_node')
            });

         $("#categories_combo").change(function(){

         	if($(this).val()==''){
         		$("#categories").val(original_category);
         	}else{
         		$("#categories").val($(this).val());	
         	}
         	

         })
});