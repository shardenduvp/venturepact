<!-- Modal View Review Start-->
<?php foreach($references as $reference){ ?>
<?php
$now = time();
$dt = new DateTime($reference->add_date);
$your_date = strtotime($dt->format('d-m-Y'));
$datediff = $now - $your_date;
$checkDay = floor($datediff/(60*60*24));
$avgRating = 0;
foreach($reference->suppliersHasCategoryRatings as $rating)
	$avgRating = $avgRating + $rating->rating;
$avgRating = round((float)((((float)$avgRating))/(4)),1);
?>
<div class="modal fade" id="view-review-<?php echo $reference->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xlg  viewReview">
		<div class="modal-content col-md-12 np">
			<div class="modal-header pa10 new-modal-bg ">
				<h2 class="modal-title fs28 text-center" id="myModalLabel"><?php echo $reference->suppliersHasPortfolio->project_name; ?> - Testimonial</h2>
				<h5 class="fs12 text-center grey-light mt5 mb5"><?php echo (($checkDay==0)?"Today":$checkDay." days ago"); ?></h5>
			</div>
			<div class="modal-body col-md-12 np new-modal-bg slimscroll " >
				<div class="col-md-9">
					<div class="col-md-12  mt10 np">
						<div class="col-md-12 pb30 mt10">
							<div class="col-md-12 pt10 pb10">
								<div class="col-md-2 pa10  text-center pl0">
									<!--Remove Hyper link-->
									<img width="70" height="70" src="<?php echo $reference->suppliers->image; ?>" class="img-circle tag-img-border1" alt="">
									<h5 class="fs14 display_block font_newregular mb5 team-text-blue"><?php echo $reference->suppliers->users->company_name; ?></h5>
									<?php $city="";
									foreach($reference->suppliers->users->usersOffices as $office){
										if($office->dep_id == 1){
											$city	=	$office->city->name.", ".$office->city->countries->name;
											break;
										}
									}?>
									<span class="fs12 mr10 display_block loc-gray"><span class="icon-pointer mr5 icon-grey-color" aria-hidden="true"></span><?php echo $city; ?></span>
								</div>
								<div class="col-md-10 pl25">
									<?php foreach($reference->suppliersReferencesQuestions as $answer){ ?>
									<?php if($answer->answers != ""){ ?>
									<div class="col-md-12 mt10 np">
										<h3 class="mt0 display_inline mr5 fs18 blue-new font_newregular"><?php echo $answer->reviewQuestions->title;  ?></h3>
										<p class="tsm-text fs14 mb15"><?php echo $answer->answers; ?></p>
									</div>
									<?php } ?>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 ">
					<div class="col-md-12 mt20 pa10 text-center mb20 pl0">
						<div class="rating-testimonial-small">
							<h1 class="fs24 nm font_newregular"><?php echo $avgRating; ?></h1>
							<span class="fs12">Rating</span>
						</div>
						<h3 class="font_newregular mb5 team-text-blue fs14">Overall Summary</h3>
					</div>
					<div class="col-md-11 mb15 np">
						<?php foreach($reference->suppliersHasCategoryRatings as $rating){ ?>
						<div class="col-sm-12 np mt10 mb10">
							<div class="col-sm-12 blue-new np font_newregular fs14"><?php echo $rating->reviewCategory->name; ?>:</div>
							<div class="col-sm-9 np">
								<div class="progress progress-bar-sm nm mt5">
									<div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="<?php echo $rating->rating*20; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rating->rating*20; ?>%;">
										<span class="sr-only"><?php echo $rating->rating; ?></span>
									</div>
								</div>
							</div>
							<div class="col-md-3 np text-center font_newregular fs14 blue-new"><?php echo $rating->rating; ?></div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-10 col-md-offset-2 np">
					<div class="col-md-11 bg-white as_t  np border-all">
						<div class="col-md-4 border-right white_active t_set">
							<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-orange ">
								<input type="checkbox" id="customcheckbox1" name="customcheckbox1" readonly <?php if($reference->follow_venturepact == 1){echo "checked";} ?> disabled />
								<label class=" fs12 grey " for="customcheckbox1">&nbsp;&nbsp; Follow VenturePact
								<p class="small_heading pl10 fs10">I would like to follow VenturePact</p></label>
							</div>
						</div>
						<div class="col-md-4 border-right white_active t_set">
							<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-orange ">
								<input type="checkbox" id="customcheckbox2" name="customcheckbox1" readonly <?php if($reference->is_unattributed == 1){echo "checked";} ?> disabled />
								<label class="fs12 grey " for="customcheckbox2">&nbsp;&nbsp; Appear Unattributed
								<p class="small_heading pl10 fs10">Do not show my name and picture to the VenturePact community</p></label>
							</div>
						</div>
						<div class="col-md-4 white_active t_set">
							<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-orange ">
								<input type="checkbox" id="customcheckbox3" name="customcheckbox1" readonly <?php if($reference->email_hide == 1){echo "checked";} ?> disabled />
								<label class="fs12 grey " for="customcheckbox3">&nbsp;&nbsp; Get Connected
								<p class="small_heading pl10 fs10">Allow future clients of <?php echo $reference->suppliers->users->company_name; ?> to connect with me via Venturepact. Your email will not be disclosed</p></label>
							</div>
						</div>   
					</div>
					<div class="col-md-11  white_active mb30 border-all mt30">
						<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-orange pb10 ">
							<input type="checkbox" id="customcheckbox4" name="customcheckbox1" checked>
							<label class=" fs12 " for="customcheckbox4">&nbsp;&nbsp; I certify that this review is based on my own experience and is my genuine opinion of the supplier submitted <br/><span class="pl10">in accordance with the Terms of Use. I am not an employee of this vendor or one of its direct competitors.</span></label>
						</div>        
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- Modal View Review End-->
<script>
$(function() {
	
	var $document   = $(document),
	selector    = '[data-rangeslider]',
	$element    = $(selector);

	// Example functionality to demonstrate a value feedback
	function valueOutput(element) {
		var value = element.value,
		output = element.parentNode.getElementsByTagName('output')[0];
		output.innerHTML = value;
	}
	for (var i = $element.length - 1; i >= 0; i--) {
		valueOutput($element[i]);
	};
	$document.on('input', 'input[type="range"]', function(e) {
		valueOutput(e.target);
	});

	// Example functionality to demonstrate disabled functionality
	$document .on('click', '#js-example-disabled button[data-behaviour="toggle"]', function(e) {
		var $inputRange = $('input[type="range"]', e.target.parentNode);
		if ($inputRange[0].disabled) {
			$inputRange.prop("disabled", false);
		}
		else {
			$inputRange.prop("disabled", true);
		}
		$inputRange.rangeslider('update');
	});

	// Example functionality to demonstrate programmatic value changes
	$document.on('click', '#js-example-change-value button', function(e) {
		var $inputRange = $('input[type="range"]', e.target.parentNode),
		value = $('input[type="number"]', e.target.parentNode)[0].value;
		$inputRange.val(value).change();
	});

	// Example functionality to demonstrate destroy functionality
	$document
	.on('click', '#js-example-destroy button[data-behaviour="destroy"]', function(e) {
		$('input[type="range"]', e.target.parentNode).rangeslider('destroy');
	})
	.on('click', '#js-example-destroy button[data-behaviour="initialize"]', function(e) {
		$('input[type="range"]', e.target.parentNode).rangeslider({ polyfill: false });
	});

	// Example functionality to test initialisation on hidden elements
	$document
	.on('click', '#js-example-hidden button[data-behaviour="toggle"]', function(e) {
		var $container = $(e.target.previousElementSibling);
		$container.toggle();
	});

	// Basic rangeslider initialization
	$element.rangeslider({
		// Deactivate the feature detection
		polyfill: false,
		// Callback function
		onInit: function() {},
		// Callback function
		onSlide: function(position, value) {
			//console.log('onSlide');
			//console.log('position: ' + position, 'value: ' + value);
		},
		// Callback function
		onSlideEnd: function(position, value) {
			var avg	=	0;
			$('.calrate').each(function(){avg = avg+parseFloat($(this).html());});
			avg	=	parseFloat(avg/4).toFixed(1);
			$('#avgRate').html(avg);
		}
	});
	$('.slimscroll').slimscroll({height : $( window ).height()+'px',});
});

$("document").ready(function(){
	// Init Theme Core
	Core.init();
	// Init Theme Core    
	Demo.init();
});
</script>