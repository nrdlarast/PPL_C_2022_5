<?php include'header.html' ?>
<?php error_reporting(0) ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbaradmin.php' ?>
    </div>

    <div class="col-10">
    <div class="roq">
        <div class="batas">
            <h1>Data</h1>
            <h1>Mahasiswa</h1>
        </div>
    </div>
<div class="roq">
    <div class="col" style="margin-top: 75px;padding-left: 40px; ">
        <h1>Nama Mahasiswa:</h1> <br>
        <input type="text" id="live_search" name="nama"class="form-control" placeholder="Search.."> <br>
	</div>
</div>

    <div id="searchresult">
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>More</th>
                </tr>

                <?php
                $no = 1;
                $result = mysqli_query($db,'SELECT * FROM mahasiswa');
                while($row = mysqli_fetch_assoc($result)){ 
                    $nama = $row['nama'];
                    $nim = $row['nim'];
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $nim; ?></td>
                        <td>
                            <a class="button" href="edit5.php?nim=<?= $row['nim']; ?>">More</a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input = $(this).val();
            // alert(input);

            if(input != ""){
                $.ajax({
                    url:"livesearch1.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                        $("#searchresult").css("display",block)
                    }
                });
            } else{
                $("#searchresult").css("display","none");
            }
        });
    });
</script>    