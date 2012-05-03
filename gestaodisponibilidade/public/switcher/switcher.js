
  jQuery(document).ready(function($) {
	
	var styleswitcherstr = ' \
	<div id="style-switcher"> \
	  	<div id="style-switcher-container"> \
		<div class="color_whell"></div> \
		<div class="switchercontainer"> \
		  <span>Color</span> \
		  <div id="colorpicker2" title="Header Background"></div>  \
		  <div class="clear"></div> \
	  </div> \
	 <div class="switchercontainer"> \
		  <span>Decorations</span> \
			<a rel="a1" class="caseta" title="a1" href="">a1</a> \
			<a rel="a2" class="caseta" title="a2" href="">a2</a> \
			<a rel="a3" class="caseta" title="a3" href="">a3</a> \
			<a rel="a4" class="caseta" title="a4" href="">a4</a> \
			<a rel="a5" class="caseta" title="a5" href="">a5</a> \
			<a rel="a6" class="caseta" title="a6" href="">a6</a> \
			<a rel="a7" class="caseta" title="a7" href="">a7</a> \
			<a rel="a8" class="caseta" title="a8" href="">a8</a> \
			<a rel="a9" class="caseta" title="a9" href="">a9</a> \
			<a rel="a10" class="caseta" title="a10" href="">a10</a> \
			<a rel="a11" class="caseta" title="a11" href="">a11</a> \
			<a rel="a12" class="caseta" title="a12" href="">a12</a> \
			<a rel="a13" class="caseta" title="a13" href="">a13</a> \
			<a rel="a14" class="caseta" title="a14" href="">a14</a> \
			<a rel="a15" class="caseta" title="a15" href="">a15</a> \
			<a rel="a16" class="caseta" title="a16" href="">a16</a> \
			<a rel="a17" class="caseta" title="a17" href="">a17</a> \
			<a rel="a18" class="caseta" title="a18" href="">a18</a> \
			<a rel="a19" class="caseta" title="a19" href="">a19</a> \
			<a rel="a20" class="caseta" title="a20" href="">a20</a> \
			<a rel="a21" class="caseta" title="a21" href="">a21</a> \
			<a rel="a22" class="caseta" title="a22" href="">a22</a> \
			<a rel="a23" class="caseta" title="a23" href="">a23</a> \
			<a rel="a24" class="caseta" title="a24" href="">a24</a> \
			<a rel="a25" class="caseta" title="a25" href="">a25</a> \
			<a rel="a26" class="caseta" title="a26" href="">a26</a> \
			<a rel="a27" class="caseta" title="a27" href="">a27</a> \
			<a rel="a28" class="caseta" title="a28" href="">a28</a> \
			<a rel="a29" class="caseta" title="a29" href="">a29</a> \
			<a rel="a30" class="caseta" title="a30" href="">a30</a> \
			<a rel="a31" class="caseta" title="31" href="">a31</a> \
			<div class="clear"></div> \
			<span>Patterns</span> \
			<a rel="1" class="casetapat" title="1" href="">1</a> \
			<a rel="2" class="casetapat" title="2" href="">2</a> \
			<a rel="3" class="casetapat" title="3" href="">3</a> \
			<a rel="4" class="casetapat" title="4" href="">4</a> \
			<a rel="5" class="casetapat" title="5" href="">5</a> \
			<a rel="6" class="casetapat" title="6" href="">6</a> \
			<a rel="7" class="casetapat" title="7" href="">7</a> \
			<a rel="8" class="casetapat" title="8" href="">8</a> \
			<a rel="9" class="casetapat" title="9" href="">9</a> \
			<a rel="10" class="casetapat" title="10" href="">10</a> \
			<a rel="11" class="casetapat" title="11" href="">11</a> \
			<a rel="12" class="casetapat" title="12" href="">12</a> \
			<a rel="13" class="casetapat" title="13" href="">13</a> \
			<a rel="14" class="casetapat" title="14" href="">14</a> \
			<a rel="15" class="casetapat" title="15" href="">15</a> \
			<a rel="16" class="casetapat" title="16" href="">16</a> \
			<a rel="17" class="casetapat" title="17" href="">17</a> \
			<a rel="18" class="casetapat" title="18" href="">18</a> \
			<a rel="19" class="casetapat" title="19" href="">19</a> \
			<a rel="20" class="casetapat" title="20" href="">20</a> \
			<a rel="21" class="casetapat" title="21" href="">21</a> \
			<a rel="22" class="casetapat" title="22" href="">22</a> \
			<a rel="23" class="casetapat" title="23" href="">23</a> \
			<a rel="24" class="casetapat" title="24" href="">24</a> \
			<a rel="25" class="casetapat" title="25" href="">25</a> \
			<a rel="26" class="casetapat" title="26" href="">26</a> \
			<a rel="27" class="casetapat" title="27" href="">27</a> \
			<a rel="28" class="casetapat" title="28" href="">28</a> \
			<a rel="29" class="casetapat" title="29" href="">29</a> \
			<a rel="30" class="casetapat" title="30" href="">30</a> \
			<a rel="31" class="casetapat" title="31" href="">31</a> \
			<a rel="32" class="casetapat" title="32" href="">32</a> \
			<a rel="33" class="casetapat" title="33" href="">33</a> \
			<a rel="34" class="casetapat" title="34" href="">34</a> \
			<a rel="35" class="casetapat" title="35" href="">35</a> \
			<a rel="36" class="casetapat" title="36" href="">36</a> \
			<a rel="37" class="casetapat" title="37" href="">37</a> \
			<a rel="38" class="casetapat" title="38" href="">38</a> \
			<a rel="39" class="casetapat" title="39" href="">39</a> \
			<a rel="40" class="casetapat" title="40" href="">40</a> \
			<a rel="41" class="casetapat" title="41" href="">41</a> \
			<a rel="42" class="casetapat" title="42" href="">42</a> \
			<a rel="43" class="casetapat" title="43" href="">43</a> \
			<a rel="44" class="casetapat" title="44" href="">44</a> \
			<a rel="45" class="casetapat" title="45" href="">45</a> \
			<a rel="46" class="casetapat" title="46" href="">46</a> \
			<a rel="47" class="casetapat" title="47" href="">47</a> \
			<a rel="48" class="casetapat" title="48" href="">48</a> \
			<a rel="49" class="casetapat" title="49" href="">49</a> \
			<a rel="50" class="casetapat" title="50" href="">50</a> \
			<a rel="51" class="casetapat" title="51" href="">51</a> \
			<a rel="52" class="casetapat" title="52" href="">52</a> \
			<a rel="53" class="casetapat" title="53" href="">53</a> \
			<a rel="54" class="casetapat" title="54" href="">54</a> \
			<a rel="55" class="casetapat" title="55" href="">55</a> \
			<a rel="56" class="casetapat" title="56" href="">56</a> \
			<a rel="57" class="casetapat" title="57" href="">57</a> \
			<a rel="58" class="casetapat" title="58" href="">58</a> \
			<a rel="59" class="casetapat" title="59" href="">59</a> \
			<a rel="60" class="casetapat" title="60" href="">60</a> \
			<a rel="61" class="casetapat" title="61" href="">61</a> \
		  <div class="clear"></div> \
	  </div> \
	<div class="switchercontainer"> \
		<a href="#" id="switcher-reset">Reset</a> \
		<div class="clear"></div> \
	</div> \
	<span class="note_switcher"><span class="text-red">Note:</span> Some patterns can be loaded slow, because the image is loaded on click</span> \
	<div class="clear"></div> \
	<span class="note_switcher"><span class="text-red">Note:</span> JQuery Cookie is not enabled! After page refresh changes will be lost</span> \
	</div> \
	</div> \
	';
	
	jQuery("body").prepend( styleswitcherstr );

	
/**************************** 

COLOR PICKER 

*****************************/


	/** Header and footer color 
********************************************************/
	jQuery('#colorpicker2').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var bgcolor = hex;
				jQuery('header.main_header').css({
					"background-color": '#' + bgcolor
				});      
			},
      color: '#243440'
    });

	
	
/***************************** 

COLOR PICKER end 

*****************************/


/**************************
HEADER MENU BACKGROUND 
***************************/
  jQuery('#style-switcher .caseta').click(function (e) {
      e.preventDefault();
      var headerbgUrl = 'url(images/pattern/' + jQuery(this).attr('rel') + '.png)';
      jQuery('header.main_header').css({
          backgroundImage: headerbgUrl,
          backgroundRepeat: "no-repeat"
      });
  });
  
   jQuery('#style-switcher .casetapat').click(function (e) {
      e.preventDefault();
      var headerbgUrl = 'url(images/pattern/' + jQuery(this).attr('rel') + '.png)';
      jQuery('header.main_header').css({
          backgroundImage: headerbgUrl,
          backgroundRepeat: "repeat"
      });
  });
/**************************
HEADER MENU BACKGROUND  end 
***************************/
	

  var headercolor		= jQuery.cookie("header_bgcolor");
  var headerbg 		= jQuery.cookie("header_footer_bgimage");
  
  

  if(headercolor){
  	jQuery('header.main_header').css({
		"background-color" : '#'+headercolor
	});
  }
	if (headerbg) {
      jQuery('header.main_header').css({
        backgroundImage: headerbg,
        backgroundRepeat: "no-repeat"
      });
  }
  
  jQuery("#switcher-reset").click(function(){
		
		var headercolor = "243440";
		jQuery('header.main_header').css({
			"background-color": '#' + headercolor
		});     
		jQuery.cookie("header_bgcolor", headercolor); 
		
				
		var headerbgUrl = 'url(images/pattern/a12.png)';
		jQuery('header.main_header').css({
		  	backgroundImage: headerbgUrl,
		  	backgroundRepeat: "no-repeat"
	  	});
		jQuery.cookie("header_footer_bgimage", headerbgUrl);
		 
		return false;
		
  });
  

jQuery(".color_whell").toggle(function () {
        jQuery("#style-switcher").animate({ left: "216px"}, {duration: 300})
    }, function () {
        jQuery("#style-switcher").animate({left: "0px"}, {duration: 300})
    });
         
});   
 