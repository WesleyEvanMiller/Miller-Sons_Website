(function($, window, document) {
	$(function()
		{	
			var invItems = [];						
			
			jQuery.ajax({
				url: "http://localhost/Miller&Sons/getData.php",
				type: "GET",
				dataType: "json",
				async: false,
				success: function (data) {
					var test = JSON.stringify(data);
					var cleansed = test.replace(/\\'/g, "'");
					var parsedData = JSON.parse(test);
					for(var i =0;i<parsedData.length;i++){
						var a = parsedData[i];
						invItems[i]=a;
					}
				}
			});
				
				
					
			for(var i=0;i<invItems.length;i++) //Drop Down List Edit
			{
				$('#itemSelect').append(('<option value="'+invItems[i].Name+'">'+invItems[i].Name+'</option>'));
				$('#manageTable').append( '<tr><td>'+i+'</td><td>'+invItems[i].Name+'</td><td>'+invItems[i].Description+'</td><td>'+invItems[i].Image+'</td><td>'+invItems[i].Price+'</td><td>'+invItems[i].Tag+'</td></tr>');
			}
			
			$('#itemSelect').on('change',function()
			{			
				var i = document.getElementById("itemSelect").selectedIndex;
				$('#NameBox').val("");
				$('#DecriptionBox').val("");
				$('#selectedimg').css({'background-Image':"url('')"});
				$('#PriceBox').val("");
				$('#TagBox').val("");
				
				$('#NameBox').val(invItems[i-1].Name);
				$('#DecriptionBox').val(invItems[i-1].Description);
				$('#selectedimg').css({'background-Image':"url('"+invItems[i-1].Image+"')"});
				$('#PriceBox').val(invItems[i-1].Price);
				$('#TagBox').val(invItems[i-1].Tag);
			});
			
			
			
			var filter = "";
			createPages();
			createDiv();
			$('#num1').css("color", "#0080FF");	//Div Creation
			var sHide=$('.DivShopContent'); 
			sHide.hide().first().show();					
			
			
			$('#filterNone').on('click',function()
			{
				$('.pnums').remove();
				filter = "";
				createPages();
				createDiv();
				for(var a=1;a<=getPageNum();a++){						//resets page numbers
						$('#num'+a).css("color", "#444444");}
				$('#num1').css("color", "#0080FF");
				sHide.hide().first().show();
			});
				
			$('#filterWell').on('click',function()
			{
				$('.pnums').remove();
				filter = "Submersible Well Pumps";
				createPages();
				createDiv();
				for(var a=1;a<=getPageNum();a++){						//resets page numbers
						$('#num'+a).css("color", "#444444");}
				$('#num1').css("color", "#0080FF");
				sHide.hide().first().show();
			});
			
			$('#filterGrinder').on('click',function()
			{
				$('.pnums').remove();
				filter = "Sewer Grinders";
				createPages();
				createDiv();
				for(var a=1;a<=getPageNum();a++){						//resets page numbers
						$('#num'+a).css("color", "#444444");}
				$('#num1').css("color", "#0080FF");
				
				sHide.hide().first().show();
			});
			
			$('#filterEffluent').on('click',function()
			{
				$('.pnums').remove();
				filter = "Effluent Pumps";
				createPages();
				createDiv();
				for(var a=1;a<=getPageNum();a++){						//resets page numbers
						$('#num'+a).css("color", "#444444");}
				$('#num1').css("color", "#0080FF");
				sHide.hide().first().show();
			});

			function createDiv()
			{
				
				if(filter!="")
				{		
					var p = 0;
					var t = 0;
					for(var i=0;i<invItems.length;i++)
					{	
						if(invItems[i].Tag==(filter))
						{
							if(t%9==0)
								p++;
							$('#page'+p).append('<div class="DivItemWindows"><div class="DivItemPics" id="iPic'+i+'"></div><div class="DivItemDecription"><b>'+invItems[i].Name+'</b><br><br><i class="Prices">$'+invItems[i].Price+'</i></div></div>');
							$('#iPic'+i).css({'background-Image':"url('"+invItems[i].Image+"')"});
							t++;
						}
					}
				}
				if(filter=="")
				{
					var p = 0;
					for(var i=0;i<invItems.length;i++)
					{
						
						if(i%9==0)
							p++;
							
							$('#page'+p).append('<div class="DivItemWindows"><div class="DivItemPics" id="iPic'+i+'"></div><div class="DivItemDecription"><b>'+invItems[i].Name+'</b><br><br><i class="Prices">$'+invItems[i].Price+'</i></div></div>');
							$('#iPic'+i).css({'background-Image':"url('"+invItems[i].Image+"')"});

					}
				}
			}
			
			function getPageNum()
			{
				if(filter!="")
				{		
					var p = 0;
					var t = 0;
					for(var i=0;i<invItems.length;i++)
					{	
						if(invItems[i].Tag==(filter))
						{
							if(t%9==0)
								p++;
							t++;
						}
					}
					return(p);
				}
				if(filter=="")
				{
					var p = 0;
					for(var i=0;i<invItems.length;i++)
					{
						if(i%9==0)
							p++;
					}
					return(p);
				}

				
			}
			
			function createPages()
			{
				$('.DivShopContent').remove();
				
				for(var b=1;b<=getPageNum();b++)
				{              
                    $('#pageHolder').append('<div class="DivShopContent" id="page'+b+'"></div>');
                    $('#nums').append('<span class="pnums" id="num'+b+'">'+b+' &nbsp;&nbsp;</span>');  
				}
				sHide = $('.DivShopContent');
				sHide.hide().first().show();
			}
			
			var j=0;
			var i=[];
			
			for(var a=0;a<=getPageNum();a++)
			{
				i[a]=$('#page'+(a+1));
			}
			$('#prev').on('click',function()
			{
				var j=curPage()-1;
				if(j!=0){
				j--;
				sHide.hide();
				$('#page'+(j+1)).show();
				window.scrollTo(0,240);
				for(var a=0;a<=getPageNum();a++){
					if(a!=(j+1))
						$('#num'+a).css("color", "#444444");}
				$('#num'+(j+1)).css("color", "#0080FF");}
			});
			$('#next').on('click',function()
			{	
				var j=curPage()-1;
				if(j!=getPageNum()-1){
					
				j++;
				sHide.hide();
				$('#page'+(j+1)).show();
				window.scrollTo(0,240);
				for(var a=0;a<=getPageNum();a++){
					if(a!=(j+1))
						$('#num'+a).css("color", "#444444");}
				$('#num'+(j+1)).css("color", "#0080FF");}
			});	
					
			var t=1;
			for(t;t<=getPageNum();t++)
			{
				(function(b){
					$('#num'+b).on('click',function()
					{
						sHide.hide();
						$('#page'+b).show();
						window.scrollTo(0,240);
						for(var a=0;a<=getPageNum();a++){
							if(a!=b)
								$('#num'+a).css("color", "#444444");}
						$('#num'+b).css("color", "#0080FF");
					});
				})(t);
			}
			
			function curPage()
			{
				var curPage = 1;
				for(var a=0;a<=getPageNum();a++)
				if($('#page'+a).is(':visible'))
					curPage = a;
				return curPage;
			}
	
	});
}(window.jQuery, window, document));