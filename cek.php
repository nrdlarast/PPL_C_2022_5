<div class="roq">
    <div class="col" style="margin-top: 75px;padding-left: 40px; ">
        <h1>Nama Mahasiswa:</h1> <br>
        <input type="text" id="live_search" name="nama"class="form-control" placeholder="Search.."> <br>
	</div>
</div>

    <div id="searchresult"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input = $(this).val();
            // alert(input);

            if(input != ""){
                $.ajax({
                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                    }
                });
            } else{
                $("#searchresult").css("display","none");
            }
        });
    });
</script>