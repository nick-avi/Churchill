<div id="animation_holder" style="z-index:10;">
<div class="step_ob"> STEP 1</div>
<div class="copy_ob"></div>

</div>




<script type="text/javascript" src= '<?php print base_path().path_to_theme(); ?>/templates/technology/jquery.flip.min.js'></script>
<script type="text/javascript" src= '<?php print base_path().path_to_theme(); ?>/templates/technology/jquery-ui.js'></script>
<script>

jQuery(document).ready(function($) {
	var $holder = $("#animation_holder"); 
	var $height = 650;
	var spintime;
	var nums = 0;
	var positions = {"top":[[130,170],[166,138],[88,162],[190,177],[150,210],[100,206],[209,130],[202,215],[120,237],[232,172]],"bottom":[[130,360],[80,420],[142,403],[117,435],[192,409],[177,370],[169,449],[100,472],[215,440],[150,490]]};
	var positions2 = [[100,260],[250,266],[130,290],[160,267],[170,307],[120,336],[86,305],[130,238],[160,348],[190,240],[205,334],[164,213],[192,372],[93,217],[133,375],[209,283],[90,361],[202,198],[246,310],[125,197],[240,354],[232,223]];
	var explodes = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
	var i = explodes.length;
	  if ( i == 0 ) return false;
	  while ( --i ) {
	     var j = Math.floor( Math.random() * ( i + 1 ) );
	     var tempi = explodes[i];
	     var tempj = explodes[j];
	     explodes[i] = tempj;
	     explodes[j] = tempi;
	   }
	$holder.css("height",$height+"px");
	init();
	
	function init(){
		(function($) {
			createLrgOb1(100,Math.round(($height/2)-50));
			createLrgOb2(700,Math.round(($height/2)-50));
			createPlusOb(410,Math.round(($height/2)-40));
			setTimeout(step1,2000);
		})(jQuery);
	}

	function createLrgOb1(pos1,pos2){
		var lrgOb = "<div class=\"main_ob1\" style=\"left:"+pos1+"px; top:"+pos2+"px;\"></div>";
		$holder.append(lrgOb);
	}
	function createLrgOb2(pos1,pos2){
		var lrgOb = "<div class=\"main_ob2\" style=\"left:"+pos1+"px; top:"+pos2+"px;\"></div>";
		$holder.append(lrgOb);
	}
	function createSmOb1(num){
		
		var smOb = "<div class=\"ob2\" id=\"ob-"+num+"\" style=\"left:"+positions['bottom'][num][0]+"px; top:"+positions['bottom'][num][1]+"px;\"></div>";
		$holder.append(smOb);
		$("#ob-"+num).show(1500);
	}
	function createSmOb2(num){
		var smOb = "<div class=\"ob1\" id=\"ob-"+(num+10)+"\" style=\"left:"+positions['top'][num][0]+"px; top:"+positions['top'][num][1]+"px;\"></div>";
		$holder.append(smOb);
		$("#ob-"+(num+10)).show(1500);
	}
	function createPlusOb(pos1,pos2){
		var lrgOb = "<div class=\"plus_ob\" style=\"left:"+pos1+"px; top:"+pos2+"px;\"></div>";
		$holder.append(lrgOb);
	}
	function createContainer(pos1, pos2){
		var lrgOb = "<div class=\"cont_ob\" style=\"left:"+pos1+"px; top:"+pos2+"px;\"></div>";
		$holder.append(lrgOb);
		$(".cont_ob").animate({opacity:1},2000);
		lrgOb = "<div class=\"cont_spin\" style=\"left:"+(pos1+51)+"px; top:"+(pos2-30)+"px;\"></div>";
		$holder.append(lrgOb);
		$(".cont_spin").animate({opacity:1},2000);
		lrgOb = "<div class=\"cont_sm\" style=\"left:"+(pos1+51)+"px; top:"+(pos2)+"px;\"></div>";
		$holder.append(lrgOb);
		$(".cont_sm").animate({opacity:1},2000);
	}
	function createResult(pos1, pos2){
		var smOb = "<div class=\"result_ob\" style=\"left:"+pos1+"px; top:"+pos2+"px;\"></div>";
		$holder.append(smOb);
		$(".result_ob").animate({top:$(".result_ob").position().top + 100,opacity:1},2000);
	}
	function createTablet(pos1, pos2){
		var smOb = "<div class=\"tablet_ob\" style=\"left:"+pos1+"px; top:"+pos2+"px;\"></div>";
		$holder.append(smOb);
		$(".tablet_ob").animate({opacity:1},2000);
	}
	function createCapsule(pos1, pos2){
		var smOb = "<div class=\"capsule_ob\" style=\"left:"+pos1+"px; top:"+pos2+"px;\"></div>";
		$holder.append(smOb);
		$(".capsule_ob").animate({opacity:1},2000);
	}
	function spinob(){
		nums++;
		spintime = setTimeout(function(){
			$(".cont_spin").flip({
			direction:'lr',
				onEnd: function(){
					spinob();
				}
			});
		},10);
		if(nums >30){
			clearTimeout(spintime);
		}
	}
	function step1(){
		$(".main_ob1").animate({left:"100px", top:Math.round($height/2 -200)+"px"}, 1500);
		$(".main_ob2").animate({left:"100px", top:Math.round($height/2 +60)+"px"}, 1500);
		$(".plus_ob").animate({opacity:"hide"}, 1500);
		$(".copy_ob").text("Process begins with a drug substance and an excipient.");
		setTimeout(step2,2000);
	}
	function step2(){
		$(".plus_ob").remove();
		$(".main_ob1").animate({width:"40px", height:"40px"}, 1500);
		$(".main_ob2").animate({width:"40px", height:"40px"}, 1500);
		for(var i =0; i<10; i++){
			createSmOb1(i);
			createSmOb2(i);
		}
		setTimeout(step3,2000);
	}
	function step3(){
		$(".copy_ob").text("Drug Substance and excipient are combined into a mill and mixed.");
		var r = Math.floor(Math.random()*positions2.length);
		var lft = positions2[r][0];
		var top = positions2[r][1];
		positions2.splice(r,1);
		$(".step_ob").text("STEP 2");
		$(".main_ob1").animate({left:lft+"px", top:top+"px"}, 1500);
		r = Math.floor(Math.random()*positions2.length);
		lft = positions2[r][0];
		top = positions2[r][1];
		positions2.splice(r,1);
		
		$(".main_ob2").animate({left:lft+"px", top:top+"px"}, 1500);
		$(".ob1").each(function() { 
		    r = Math.floor(Math.random()*positions2.length);
			lft = positions2[r][0];
			top = positions2[r][1];
			positions2.splice(r,1);
			$(this).animate({left:lft+"px", top:top+"px"}, 1500);
		});
		$(".ob2").each(function() { 
		    r = Math.floor(Math.random()*positions2.length);
			lft = positions2[r][0];
			top = positions2[r][1];
			positions2.splice(r,1);
			$(this).animate({left:lft+"px", top:top+"px"}, 1500);
		});
		
		createContainer(350,200);
		setTimeout(step4,2500);
		
	}
	function step4(){
		
		var r = Math.floor(Math.random()*(125-40)+401);
		var r2 = Math.floor(Math.random()*(178-65)+225);
		$(".main_ob1").animate({left:r+"px",top:r2+"px"}, 1500);
		r = Math.floor(Math.random()*(125-40)+401);
		r2 = Math.floor(Math.random()*(178-65)+225);
		$(".main_ob2").animate({left:r+"px",top:r2+"px"}, 1500);
		$(".ob1").each(function() { 
			r = Math.floor(Math.random()*(125-40)+401);
			r2 = Math.floor(Math.random()*(178-65)+225);
			$(this).animate({left:r+"px",top:r2+"px"}, 1500);
		});
		$(".ob2").each(function() { 
			r = Math.floor(Math.random()*(125-40)+401);
			r2 = Math.floor(Math.random()*(178-65)+225);
			$(this).animate({left:r+"px",top:r2+"px"}, 1500);
		});
		/*$(".main_ob1").animate({left:$(".main_ob1").position().left+280+"px"}, 1500);
		$(".main_ob2").animate({left:$(".main_ob2").position().left+280+"px"}, 1500);
		$(".ob1").each(function() { 
			$(this).animate({left:$(this).position().left+280+"px"}, 1500);
		});
		$(".ob2").each(function() { 
			$(this).animate({left:$(this).position().left+280+"px"}, 1500);
		});*/
		setTimeout(step5,2000);
	}
	function step5(){
		$('.main_ob2').css("left",$('.main_ob2').position().left-401+"px");
		$('.main_ob2').css("top",$('.main_ob2').position().top-200+"px");
		$(".cont_sm").append($('.main_ob2'));
		$('.main_ob1').css("left",$('.main_ob1').position().left-401+"px");
		$('.main_ob1').css("top",$('.main_ob1').position().top-200+"px");
		$(".cont_sm").append($('.main_ob1'));
		$(".ob1").each(function() { 
			$(this).css("left",$(this).position().left-401+"px");
			$(this).css("top",$(this).position().top-200+"px");
			$(".cont_sm").append($(this));
		});
		$(".ob2").each(function() { 
			$(this).css("left",$(this).position().left-401+"px");
			$(this).css("top",$(this).position().top-200+"px");
			$(".cont_sm").append($(this));
		});
		$(".cont_sm").effect("shake", { times:10, distance:10 }, 80);
		setTimeout(step6,3000);
	}
	function step56(){
		for(var i=0; i<20;i++){
			r = Math.floor(Math.random()*5000) + 1000;
			setTimeout(explodeme,r);
		}
		r = Math.floor(Math.random()*5000) + 1000;
		setTimeout(function(){
			$('.main_ob1').hide("explode",{pieces:16},1500);
		},r);
		r = Math.floor(Math.random()*5000) + 1000;
		setTimeout(function(){
			$('.main_ob2').hide("explode",{pieces:16},1500);
		},r);
		setTimeout(step6,5700);
	}
	function explodeme(){
		$('#ob-'+explodes[0]).hide("explode",{pieces:16},2000);
		explodes.splice(0,1);
	}
	function step6(){
		$(".copy_ob").text("The result of mixing the drug substance and excipient is a matrix-encapsulated nanopartilate drug.");
		/*$(".cont_ob").animate({opacity:"hide"}, 1500);
		$(".cont_spin").animate({opacity:"hide"}, 1500);*/
		$(".cont_sm").animate({top:$(".cont_sm").position().top - 100, opacity:"hide"},2000);
		createResult(417,150);
		setTimeout(step7, 2000);
	}
	function step7(){
		createTablet(200,420);
		createCapsule(650,400);
		
	}
	
});

</script>
















