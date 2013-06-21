/*!
 * jCloner 1.0
 * jCloner is a jQuery plugin for the elements on your webpage. It allows you to create clones of any HTML elements on your page with just a single click of a mouse.
 * http://shouvik.net/jcloner.php
 *
 * Copyright 2010, Shouvik Chatterjee  [mailme@shouvik.net]
 * This plugin is free for both personal and commercial use as long as the copyright text retains.
 *
 * Date: Sunday Oct 24, 2010
 */

(function(jQuery){

jQuery.fn.jCloner = function(options){


	options = jQuery.extend({

		cloneID: $(this).attr('id'),
		cloneClass: null,
		addTextID: null,
		removeText: 'Remove this field',
		removeClass: null,
		removeTextAppend: null,
		confirmOnRemove: true,
		confirmText: 'Sure to remove?',
		maxItemsAllowed: 10,
		appendElement: null,
		counter: $('.'+options.cloneClass).length		
		
	},options);


	return this.each(function (index){
		
	displayRemoveLinksBydefault();
	
	$('#'+options.addTextID).click(function(){
			options.counter++;
			var newElement = $('#' + options.cloneID).clone().appendTo('#' + options.appendElement);

			
			$(newElement).attr('value',options.cloneID + '_' + options.counter);
			$(newElement).after('<span class="lnk_remove '+options.removeClass+'" value="'+options.cloneID + '_' + options.counter+'"><a href="javascript:void(0)">'+options.removeText + options.removeTextAppend+'</a></span>');
			$(newElement).each(function(){
				$(this).find("input[type='text']").val('');
				$(this).find("input[type='checkbox']").removeAttr('checked');
			}); 
			
		if($('.'+ options.cloneClass).length >= options.maxItemsAllowed){
			$(this).hide();
		}
	});		
		
		
		
	$('.lnk_remove').live('click',function(){
		
		var value 			= $(this).attr('value');
		var currentTable 	= $('* [value='+ value+']').attr('value');	

		if((options.confirmOnRemove==true) && (value==currentTable)){
			var answer = confirm(options.confirmText);
			if(answer==0){
				return false;
			}
		}
			
			$('* [value='+ value+']').remove();
			$(this).remove();
			
			if($('.'+ options.cloneClass).length < options.maxItemsAllowed){
				$('#'+options.addTextID).show();
			}
			
	});		
		

	function displayRemoveLinksBydefault(){
		var counter = 1;
		if($('.'+ options.cloneClass).length>= options.maxItemsAllowed){
			$('#'+ options.addTextID).remove();
		}
		$('.' + options.cloneClass ).each(function(){
			counter++;
			
			
			$("* [value='"+options.cloneID + '_' + counter+"']").after('<a class="lnk_remove '+ options.removeClass+'" value="'+ options.cloneID + '_' + counter +'" href="javascript:void(0)">'+ options.removeText + options.removeTextAppend+'</a>');
			
		});
	
	}		
		
		

	})

}






})(jQuery)

