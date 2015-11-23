<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <meta charset="UTF-8">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/papa/papaparse.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row" style="position: fixed;right: 30px;top:30px;z-index: 1000">
        <button class="btn btn-info route" go="analiz">Analiz </button>
        <button class="btn btn-info route" go="costumer">Costumer Analiz</button>
        <button class="btn btn-info route" go="worker">Worker Analiz</button>
    </div>
    <div class="row">
        <div class="col-xs-12 analiz">
            <h1 style="text-align: center">Data Analiz</h1>
            <a class="csv-download btn btn-danger">CSV İndir</a>

            <table class="table table-hover">
                <tr>
                    <td>count</td>
                    <td>opaque_id</td>
                    <td>ap_name</td>
                    <td>İsim Text</td>
                    <td>İsim</td>
                    <td>izleme_sayisi</td>
                    <td>yes_click</td>
                    <td>no_click</td>
                    <td>siralama</td>
                </tr>
                <?php
                $coutnt = 0;
                while ($row = mysqli_fetch_assoc($data)):
                    ?>
                    <tr>
                        <td><?= $coutnt ?></td>
                        <td><?= $row['opaque_id'] ?></td>
                        <td><?= $row['ap_name'] ?></td>
                        <td><?= $row['name_text'] ?></td>
                        <td><?= $row['name_'] ?></td>
                        <td><?= $row['izleme_sayisi'] ?></td>
                        <td><?= $row['yes_click'] ?></td>
                        <td><?= $row['no_click'] ?></td>
                        <td><?= $row['siralama'] ?></td>
                    </tr>
                    <?php

                    $coutnt++;
                    if ($coutnt == 100) {
                        break;
                    }
                endwhile;
                ?>
                ...
            </table>
        </div>
        <div class="col-xs-12 costumer">
            <h1 style="text-align: center">Costumer Data Analiz</h1>
            <a class="costumer-csv-download btn btn-danger">CSV İndir</a>

            <table class="table table-hover">
                <tr>
                    <td>count</td>
                    <td>opaque_id</td>
                    <td>ap_name</td>
                    <td>İsim Text</td>
                    <td>İsim</td>
                    <td>izleme_sayisi</td>
                    <td>yes_click</td>
                    <td>no_click</td>
                    <td>siralama</td>
                </tr>
                <?php
                $coutnt = 0;
                while ($rows = mysqli_fetch_assoc($costumer)):
                    ?>
                    <tr>
                        <td><?= $coutnt ?></td>
                        <td><?= $rows['opaque_id'] ?></td>
                        <td><?= $rows['ap_name'] ?></td>
                        <td><?= $rows['name_text'] ?></td>
                        <td><?= $rows['name_'] ?></td>
                        <td><?= $rows['izleme_sayisi'] ?></td>
                        <td><?= $rows['yes_click'] ?></td>
                        <td><?= $rows['no_click'] ?></td>
                        <td><?= $rows['siralama'] ?></td>
                    </tr>
                    <?php

                    $coutnt++;
                    if ($coutnt == 100) {
                        break;
                    }
                endwhile;
                ?>
                ...
            </table>

        </div>
        <div class="col-xs-12 worker">
            <h1 style="text-align: center">Worker Data Analiz</h1>
            <a class="worker-csv-download btn btn-danger">CSV İndir</a>

            <table class="table table-hover">
                <tr>
                    <td>count</td>
                    <td>opaque_id</td>
                    <td>ap_name</td>
                    <td>İsim Text</td>
                    <td>İsim</td>
                    <td>izleme_sayisi</td>
                    <td>yes_click</td>
                    <td>no_click</td>
                    <td>siralama</td>
                </tr>
                <?php
                $coutnt = 0;
                while ($row = mysqli_fetch_assoc($worker)):
                    ?>
                    <tr>
                        <td><?= $coutnt ?></td>
                        <td><?= $row['opaque_id'] ?></td>
                        <td><?= $row['ap_name'] ?></td>
                        <td><?= $row['name_text'] ?></td>
                        <td><?= $row['name_'] ?></td>
                        <td><?= $row['izleme_sayisi'] ?></td>
                        <td><?= $row['yes_click'] ?></td>
                        <td><?= $row['no_click'] ?></td>
                        <td><?= $row['siralama'] ?></td>
                    </tr>
                    <?php

                    $coutnt++;
                    if ($coutnt == 100) {
                        break;
                    }
                endwhile;
                ?>
                ...
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.route').click(function(){
        var button = $(this);
        var div = button.attr('go');
        window.scrollTo(0,$('.'+div).offset().top);
    });
    /**  Analiz data download*/
    var data;

    var button = $('.csv-download');
    data = Papa.unparse(<?=json_encode($data->fetch_all())?>);
    var d = new Blob([data]);
    button.attr('href', window.URL.createObjectURL(d));
    //window.location.href = URI.createObjectURL(d);

    /**  Costumer data download*/
    var data;

    var button = $('.costumer-csv-download');
    data = Papa.unparse(<?=json_encode($costumer->fetch_all())?>);
    var d = new Blob([data]);
    button.attr('href', window.URL.createObjectURL(d));
    //window.location.href = URI.createObjectURL(d);
    button.attr('download', 'costumer_analize.csv');

    /**  Worker data download*/
    var data;

    var button = $('.worker-csv-download');
    data = Papa.unparse(<?=json_encode($worker->fetch_all())?>);
    var d = new Blob([data]);
    button.attr('href', window.URL.createObjectURL(d));
    //window.location.href = URI.createObjectURL(d);
    button.attr('download', 'worker_analize.csv');

</script>
</body>
</html>

