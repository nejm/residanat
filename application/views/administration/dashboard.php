    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
                <!--<ol class="breadcrumb">
                    <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Blank Page</li>
                </ol>-->
            </div>
        </div><!-- /.row -->
        <?php
        $data ="";
        $data2="";
        $i=0;
        foreach ($spec as $s)
        {
            if($s->nbr_place > 0){
                $i++;
                $data.="[ '$s->libelle' , $s->nbr_place ],";
            }
            if($i===10) break;
        }

        //moyenne
        foreach ($moyenne as $k => $v)
        {
            $data2.= "[ '$k' , $v ],";
        }


        //admission
        $s=$nombre-$admis;
        $data3= "[ 'Admis(e)' , $admis ],";
        $data3.= "[ 'Non Admis(e)' , $s ]";

        substr($data2,0,-1);
        substr($data,0,-1);
        ?>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Classement par moyenne</h3>
                </div>
                <div class="panel-body">
                    <div id="moy"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o">
                    </i> Pourcentage des étudiants selon leurs résultats</h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-6" id="choix"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o">
                    </i> Pourcentage des étudiants selon la faculté</h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-6 " id="fac"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o">
                    </i> Places libres des 10 premiers spécialités</h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-6 " id="spec"></div>
                </div>
            </div>
        </div>
    </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
    google.setOnLoadCallback(drawChart2);
    google.setOnLoadCallback(drawChart3);
    google.setOnLoadCallback(drawChart4);


    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?=$data?>
        ]);

        // Set chart options
        var options = {'title':'Places libres des 10 premiers spécialités',
            'width':540,
            'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('spec'));
        chart.draw(data, options);
    }

    //---------------------------------------------------------\\
    function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
            ['Moyenne', 'Nombre d\'étudiants'],
            <?=$data2?>
        ]);

        var options2 = {
            title: 'Classement par moyenne',
            hAxis: {
                title: 'Moyenne',
                titleTextStyle: {color: 'black'}
            },
            is3D :true

        };

        var chart2 = new google.visualization.ColumnChart(document.getElementById('moy'));
        chart2.draw(data2, options2);
    }
    //---------------------------------------------------------------
    function drawChart3() {

        // Create the data table.
        var data3 = new google.visualization.DataTable();
        data3.addColumn('string', 'Topping');
        data3.addColumn('number', 'Slices');
        data3.addRows([
            <?=$data3?>
        ]);

        // Set chart options
        var options3 = {'title':'Pourcentage des étudiants selon leurs résultat',
            'width':540,
            'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart3 = new google.visualization.PieChart(document.getElementById('choix'));
        chart3.draw(data3, options3);
    }
    //-----------------------------------------------------------------------------------------
    //---------------------------------------------------------------
    function drawChart4() {

        // Create the data table.
        var data4 = new google.visualization.DataTable();
        data4.addColumn('string', 'Topping');
        data4.addColumn('number', 'Slices');
        data4.addRows([
            ['Sousse',  <?=$sousse?>   ],
            ['Sfax',    <?=$sfax?>     ],
            ['Monastir',<?=$monastir?> ],
            ['Tunis',   <?=$tunis?>    ]
        ]);

        // Set chart options
        var options4 = {'title':'Pourcentage des étudiants selon la faculté',
            'width':540,
            'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart4 = new google.visualization.PieChart(document.getElementById('fac'));
        chart4.draw(data4, options4);
    }
</script>

</body>
</html>