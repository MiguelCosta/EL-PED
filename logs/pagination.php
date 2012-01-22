<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- This is a pagination script using Jquery, Ajax and PHP
The enhancements done in this script pagination with first,last, previous, next buttons -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        function loading_show(){
			  $('#loading').html("<img src='../pagination/images/loading.gif'/>").fadeIn('fast');
        }
        function loading_hide(){
            $('#loading').fadeOut('fast');
        }                
        function loadData(page){
            loading_show();                    
            $.ajax
            ({
                type: "POST",
                url: "load_data.php",
                data: "page="+page,
                success: function(msg)
                {
                    $("#container_p").ajaxComplete(function(event, request, settings)
                    {
                        loading_hide();
                        $("#container_p").html(msg);
                    });
                }
            });
        }
        loadData(1);  // For first time page load default results
        $('#container_p .pagination li.active').live('click',function(){
            var page = $(this).attr('p');
            loadData(page);

        });           
        $('#go_btn').live('click',function(){
            var page = parseInt($('.goto').val());
            var no_of_pages = parseInt($('.total').attr('a'));
            if(page != 0 && page <= no_of_pages){
                loadData(page);
            }else{
                alert('Introduza uma página entre 1 e '+no_of_pages); // TODO: alterar

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
