<style>
.selectize-control .selectize-input.disabled
{
    background-color: #eee!important;
    cursor: not-allowed!important;
}
#SuppliersHasPortfolio_discreet_desc
{
    display: none;
}
</style>
<?php
$is_view =false;
if(isset($_REQUEST['view']))
{
    $is_view = true;
}
 ?>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/bootstrap-datepicker.js"></script>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/css/datepicker.css" rel="stylesheet"/>
 

<br /><br />
 <?php if(Yii::app()->user->hasFlash('record')){?>
    <div class="alert alert-success" id="repsoneRest2">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
        <p id="messageResponse2">
            <strong><?php echo Yii::app()->user->getFlash('record'); ?></strong>
        </p>
    </div>
<?php } ?>
<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'id'=>"client-form",'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate'))); ?>
<div class="classsegments">
    <div class="col-md-3">
        <?php $avtar_img=Yii::app()->theme->baseUrl."/style/images/avatar.png"; $profile_img = $avtar_img; if(!empty($stories->image)) { $profile_img = $stories->image; } ?>
        <img src="<?php echo $profile_img; ?>" class="img-circle" id="profile_img1" width="150" height="115" />
        <div style="width: 88%;text-align: center;">
            <a href="#" style="text-align: center;" id="openBrow1">Edit Image</a>
        </div>
        <?php echo $form->hiddenField($stories,'image',array('id'=>"profilePicUser1")); ?>
    </div>
    <div class="col-md-9">
        <div class="form-group">
            <label for="name1">Company Name</label>
            <?php echo $form->textField($stories,'company_name',array('placeholder'=>"Company Name (Required)",'required'=>'required','title'=>"Company Name (Required)",'data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'class'=>'form-control text-input defaultText required minlength','length'=>"2",'tabindex'=>'1'));?>
            <div class="checkbox">
                <label>
                    <?php echo $form->checkBox($stories,'is_discreet',array('tabindex'=>'9')); ?> Keep client name discreet
                </label>
                <?php echo $form->textField($stories,'discreet_desc',array('placeholder'=>"Description (Required)",'title'=>"Description (Required)",'data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'1'));?>
            </div>
        </div>
        <div class="form-group" id="par-loc">
        	<label for="name1">Location</label>
        		<?php 
                $city = "";
                $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'model' => $stories,
					'value' => $city,
					'name' => 'city',
					'id'=>'testCity',
					'source'=>'js: function(request, response){
						$.ajax({
							url: "'.$this->createUrl('site/autoCity').'",
							dataType: "json",
							data: {
								term: request.term,
								brand: $("#type").val()
							},
							success: function (data) {response(data);}
						})
					}',
					'options'=>array('class'=>'form-control text-input defaultText','placeholder'=>"Location (Required)",'title'=>'Location (Required)','tabindex'=>'5',
					'select' => 'js:function(event, ui){ $("#cityId").val(ui.item.id);$("#testCity").attr("readonly","readonly")}',
					'click'=>'js:function( event, ui){alert("test");return false;}',
					),
					'htmlOptions'=>array('value'=>'Search',)
					));
                    
                    echo $form->hiddenField($stories,'location',array('id'=>'cityId','required'=>'required'));
				?>
                                    
        </div>
    </div>
</div>

<div class="classsegments mt15">
    <div class="form-group">
         <label for="name1">Project Title</label>
         <?php echo $form->textField($stories,'project_name',array('placeholder'=>"Project Title (Required)",'required'=>'required','title'=>"Project Name (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required minlength','length'=>"2",'tabindex'=>'3'));?>
    </div>
    <div class="form-group">
    	<label for="name1">Description</label>
    	<?php echo $form->textArea($stories,'description',array('placeholder'=>"Description (Required)",'required'=>'required','title'=>"Description (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"2",'tabindex'=>'4'));?>
    </div>
    <div class="form-group">
    	<label for="name1">Project URL/Demo Link</label>
    	<?php echo $form->textField($stories,'project_link',array('placeholder'=>"Project URL/Demo Link (Required)",'required'=>'required','title'=>"Project URL/Demo Link (Required)","data-parsley-type"=>"url",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"2",'tabindex'=>'5'));?>
    </div>
    <div class="form-group">
         <label for="name1">Project Size</label>
         <?php echo $form->textField($stories,'project_size',array('placeholder'=>"Project Size (Required)",'required'=>'required','title'=>"Project Size (Required)",'class'=>'form-control text-input defaultText required','tabindex'=>'6'));?>
    </div>

    <div class="form-group">
        <label for="name1">Per Hour Rate</label>
        <div>
            <div style="float: left;padding: 7px;"><b>$</b></div>
            <div style="float: left;width: 97.2%;">
                <?php echo $form->textField($stories,'per_hour_rate',array('placeholder'=>"Per Hour Rate (Required)",'required'=>'required','title'=>"Per Hour Rate (Required)",'data-parsley-type'=>"number",'class'=>'form-control text-input defaultText required minlength','aria-describedby'=>'basic-addon1','length'=>"2",'tabindex'=>'7'));?>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
    
    <div class="form-group" id="par-date">
 
        <label for="name1">Project Start Date</label>
        
        <?php echo $form->textField($stories,'start_date',array('autocomplete'=>'off','maxlength'=>'10','placeholder'=>"MM/DD/YYYY",'required'=>'required','title'=>"11/11/1111",'class'=>'form-control date text-input defaultText datepicker','length'=>"2",'tabindex'=>'8'));?>
    </div>
    
    <div class="form-group">
        <label for="name1">Project Duration</label>
        <?php echo $form->textField($stories,'estimate_timeline',array('placeholder'=>"Project Duration (Required)",'required'=>'required','title'=>"Project Size (Required)",'class'=>'form-control text-input defaultText required','tabindex'=>'9'));?>
    </div>


    <div class="form-group" id="lang-client">
        <label for="name1">Languages</label>
        <select id="client-stories-skills" class="form-control " placeholder="Yii, Rails, Oracle SQL" multiple name="Skills[]">
    		<?php foreach($skills as $skill){
    			//if($skill->skillcol !=0){?>
    		<option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> >
    			<?php echo $skill->name;?>
            </option>
    		<?php } ?>
    	</select>
    </div>
    
     <div class="form-group" id="plat-client">
        <label for="name1">Platform</label>
        	<select id="service-client" class="form-control " placeholder="Web app, iOS app, ERP" multiple name="Services[]" >
    			<option default>Select a Service</option>
    			<?php foreach($services as $service){?>
    			 <option value=" <?php echo $service->id;?>" <?php echo (in_array($service->id,$selectedServices))?'selected="selected"':'';?>  ><?php echo $service->name;?> </option>
    			<?php } ?>
    		</select>
    </div>
    
    
    <div class="form-group" id="ind-client">
        <label for="name1">Industry</label>
    	<select id="industry-client" class="form-control " placeholder="Education, Hardware, Call Center" multiple name="Industries[]" >
			<option default>Select a Industry</option>
			<?php foreach($industries as $industry){?>
			 <option value=" <?php echo $industry->id;?>" <?php echo (in_array($industry->id,$selecetedIndustries))?'selected="selected"':'';?>  ><?php echo $industry->name;?> </option>
			<?php } ?>
		</select>
    </div>

   
    

    <div class="form-group">
        <label for="name1">Screen Shots</label><br/>
        <a id="screenBrow-client">Choose Screenshots</a>
        <table id="screenshots-client"></table>
        <?php echo CHtml::hiddenField('docs' ,'', array('id'=>'docs-client')); ?>
    </div>
    
    <!-- Team -->
    <?php if(!isset($_REQUEST['id'])){ ?>
    <div class="border_style_div" id="teamDiv"><h4>Client Team</h4></div>
  
    <a class="btn btn-primary mt15 pull-right" id="add_team"><span aria-hidden="true" class="glyphicon glyphicon-plus"></span> add member </a>
    
    <input type="hidden" id="team_hidden" value="-1" />
    <?php
    }
     ?>
    <!-- End of Team -->
    
    <div class="form-group">
        <?php echo $form->hiddenField($stories,'portfolio_type',array('value'=>"0")); ?>
        <?php echo CHtml::submitButton('Save',array('id'=>'portfolio','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'10')); ?>
    </div>




</div>

 <?php $this->endWidget(); ?>

 <?php echo $this->renderPartial("stories/_screenshots",array("is_view"=>$is_view)); ?>

 <?php
 if(isset($_REQUEST['id']))
 {
    echo $this->renderPartial("stories/_clientstoriesTeam",array("is_view"=>$is_view));   
    
    echo $this->renderPartial("stories/_reviews",array("is_view"=>$is_view));    
 } 
  
  $team_img=Yii::app()->theme->baseUrl."/style/images/avatar.png"; 
  
 ?> 

 <script>
 
    function remove_team(id)
    {
      
       $("#t_" + id).hide();
       $("#t_" + id).remove();
    }
 
    $(document).ready(function(){

           var cache = {};
       $("#SuppliersHasPortfolio_company_name").autocomplete({
            source: function(request, response) {
                var term = request.term;
                if ( term in cache ) {
                  response( cache[ term ] );
                  return;
                }
                $.ajax({
                    url: "https://www.linkedin.com/ta/federator?&types=company,group",
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        cache[ term ] = data;
                        response(data);
                    }
                });
            },
            minLength: 3,
            select: function(event, ui) {
                $(this).parent().find(".cityid").val(ui.item.id);
                console.log(ui.item.id);
                //console.log( ui.item ?
                // "Selected: " + ui.item.label :
                //"Nothing selected, input was " + this.value);
            },
            open: function() {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }

        loadImagePicker($);           
        $("#add_team").click(function(){
           var hidden_val = $("#team_hidden").val();
           hidden_val = parseInt(hidden_val) + 1;
           $("#team_hidden").val(hidden_val);   
           var htm = '<div id="t_' + hidden_val +'"><div class="col-md-12" ><div class="col-md-3"><img src="" class="img-circle team-image-class" id="img_' + hidden_val +'" width="150" height="115" /><div style="width: 88%;text-align: center;"><a href="#" style="text-align: center;" class="imgPopup" id="a_image_'+ hidden_val +'">Edit Image</a></div><input type="hidden" name="t_image[]" id="t_image_' + hidden_val +'" /></div><div class="col-md-3"><input type="text" maxlength="50" name="t_name[]" tabindex="21" length="2" class="form-control text-input defaultText required  minlength" data-parsley-minlength="2" title="Name (Required)" placeholder="Name (Required)" data-parsley-id="0201"/><br/><input type="text" maxlength="50" name="t_designation[]" tabindex="23" class="form-control text-input defaultText required " title="Designation (Required)" required="required" placeholder="Designation (Required)" data-parsley-id="1017"/></div><div class="col-md-3"><input type="text" maxlength="50"  name="t_dep[]" tabindex="23" class="form-control text-input defaultText required " title="Department (Required)" required="required" placeholder="Department (Required)" data-parsley-id="0295"/><br/><input type="text" maxlength="100"  name="t_facebook[]" data-type="url" tabindex="23" class="form-control text-input defaultText urld " title="Email (Required)" placeholder="Facebook URL" data-parsley-id="6746"/></div><div class="col-md-3"><input type="text" maxlength="100"  name="t_twitter[]" tabindex="23" class="form-control text-input defaultText urld" title="Email (Required)" placeholder="Twitter URL" data-parsley-id="8154"/><br/><input type="text" maxlength="100"  name="t_linkedin[]" tabindex="23" class="form-control text-input defaultText urld" title="Email (Required)" placeholder="LinkedIn URL" data-parsley-id="8025"/><a class="delete_team" onclick="remove_team(' + hidden_val + ')">Delete</a></div></div></div><div style="clear: both;"></div>';
           $("#teamDiv").append(htm);
           $("#img_" + hidden_val).attr("src", '<?php echo $team_img; ?>');  
           loadImagePicker($);
        });
        
       

        
        <?php
        if($is_view)
        {
            ?>
            $("input").prop('disabled', true);
            $("select").prop('disabled', true);
            $("textarea").prop('disabled', true);
            $("submit").prop('disabled', true);
            
            <?php
        }
         ?>
        
        
        allscreenshots("screenBrow-client","docs-client","screenshots-client");
		//Use for all forms this will validate selec boxes
		var clientForm = $("#client-form");
		var clientFormParsley = clientForm.parsley();
		clientForm.on("submit",function(){
			var ret=false;
			console.log(clientFormParsley.isValid());
			// give id of selectize and it will validated
			ret = selectizeFix("client-stories-skills");
			ret = selectizeFix("industry-client");
			ret = selectizeFix("service-client");
			return ret;

		});
        skillsSelectize("client-stories-skills");
        skillsSelectize("industry-client");
        skillsSelectize("service-client");

        $('#openBrow1').click(function() {
            filepicker.setKey("<?php echo $this->filpickerKey; ?>");
            filepicker.pick({
                    mimetypes: ['image/*'],
                   
                },
                function(InkBlob) {
                    
                        $('#profilePicUser1').val(InkBlob.url);
                        $("#profile_img1").attr("src", InkBlob.url + '/convert?w=150&h=115&fit=crop');
                    
                },
                function(FPError) {
                    console.log(FPError.toString());
                }
            );
        });
        
        
        
        
        
        
        $('.datepicker').datepicker();

        $("#testCity").attr("placeholder","City (Required)");
	   // $("#testCity").attr("required","required"); 
	    $("#testCity").attr("tabindex","6");
	    $("#testCity").addClass("form-control");
	    $("#testCity").focus(function(){$this=$("#testCity");$this.removeAttr("readonly");$this.val('');$("#cityId").val('');});
        $("#cityId").val("<?php  echo $stories->location; ?>");
        
        <?php
        if(isset($_REQUEST['id']) && $stories->portfolio_type=="0")
        {
            if(isset($stories->location))
            {                        
               $selectedCity = Cities::model()->findByAttributes(array("id"=>$stories->location));
               ?>
               $("#testCity").val("<?php echo $selectedCity->name; ?>");               
               //$("#SuppliersHasPortfolio_discreet_desc").val("<?php echo $stories->discreet_desc; ?>")
               <?php
               if($stories->is_discreet=="1")
               {
                    //echo ' $("#SuppliersHasPortfolio_discreet_desc").show();';
               }
                ?>
               <?php
           }           
          
        }
         ?>
        
        
        dropdownValidation("client-stories-skills","lang-client");
        dropdownValidation("service-client","plat-client");
        dropdownValidation("industry-client","ind-client");
        
      

    });
	 function selectizeFix(id){
	  
	 	if($("#"+id).val()==null){
			var errId = $("#"+id).data("parsley-id");
			$("#parsley-id-"+errId).html('<li class="parsley-required">This value is required.</li>').addClass("filled");
			return false;
		}
		else{
			var errId = $("#"+id).data("parsley-id");
			$("#parsley-id-"+errId).html('').removeClass("filled");
		}

	 }
      //$("#SuppliersHasPortfolio_start_date").mask("9999/99/99");
   
    
        $("#testCity").blur(function(){
            var textboxVal = $("#cityId").val();
            if(textboxVal!="")
            {
                $('#par-loc ul.parsley-errors-list').html('');
            }
        });
        
        $(".datepicker").blur(function(){
            $('#par-date ul.parsley-errors-list').html('');
        })
        
        <?php
        if(false)
        {
         ?>
        $("#SuppliersHasPortfolio_is_discreet").click(function(){
            if($('#SuppliersHasPortfolio_is_discreet').is(":checked"))
            {
                $("#SuppliersHasPortfolio_discreet_desc").show();
                $("#SuppliersHasPortfolio_discreet_desc").attr("required","required");
            }else{
                $("#SuppliersHasPortfolio_discreet_desc").hide();
                $("#SuppliersHasPortfolio_discreet_desc").removeAttr("required","required");
                $("#SuppliersHasPortfolio_discreet_desc").val("");
                
            }
        });
        <?php
        }
         ?>


        
       
            function loadImagePicker($)
            {
                $('.imgPopup').click(function() { 
                    var id = this.id;
                    id = id.split("_");
                    id = id[2];
                    
                    filepicker.setKey("<?php echo $this->filpickerKey; ?>");
                    filepicker.pick({
                            mimetypes: ['image/*'],
                        },
                        function(InkBlob) {
                            
                                $('#t_image_' + id).val(InkBlob.url);
                                $("#img_" + id).attr("src", InkBlob.url + '/convert?w=150&h=115&fit=crop');
                            
                        },
                        function(FPError) {
                            console.log(FPError.toString());
                        }
                    );
                });
           
            }
       
            
        
 </script>
 