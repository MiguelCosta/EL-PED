<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- This is a pagination script using Jquery, Ajax and PHP
The enhancements done in this script pagination with first,last, previous, next buttons -->

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script type="text/javascript">
   /* Comentarios para instruir: This is the first thing to learn about jQuery: If you want an event to work on your page, you should call it inside the $(document).ready() function. Everything inside it will load as soon as the DOM is loaded and before the page contents are loaded. */
    $(document).ready(function(){
        function loading_show(){
			  /* In an HTML document, .html() can be used to get the contents of any element. If the selector expression matches more than one element, only the first match will have its HTML content returned. */
			  $('#loading').html("<img src='../pagination/images/loading.gif'/>").fadeIn('fast');
        }
        function loading_hide(){
            $('#loading').fadeOut('fast');
        }                
        function loadData(page){
            loading_show();                    
            $.ajax ({ /* Perform an asynchronous HTTP (Ajax) request */
                type: "POST",
                url: "load_data.php",
				data: "page="+page,
                success: function(msg) {
					  $("#container_p").ajaxComplete(function(event, request, settings) { /* .ajaxComplete( handler(event, XMLHttpRequest, ajaxOptions)). Register a handler to be called when Ajax requests complete. This is an Ajax Event. */
                        loading_hide();
                        $("#container_p").html(msg);
                    });
                }
            });
        }

        loadData(1);  // For first time page load default results
		$('#container_p .pagination li.active').live('click',function(){ /* .live( events, handler(eventObject)). Attach an event handler for all elements which match the current selector, now and in the future. */
            var page = $(this).attr('p');
            loadData(page);
        });           
        $('#go_btn').live('click',function(){
            var page = parseInt($('.goto').val());
            var no_of_pages = parseInt($('.total').attr('a'));
            if(page != 0 && page <= no_of_pages){
                loadData(page);
            }else{
                alert('Introduza uma p�gina entre 1 e '+no_of_pages); 
                $('.goto').val("").focus();
                return false;
            }

        });
    });
</script>


<div id="loading"></div>
<div id="container_p">
    <div class="pagination"></div>
</div>
