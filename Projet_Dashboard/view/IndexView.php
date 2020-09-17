<?php
  ob_start();
  session_start();
  session_regenerate_id();

?>

    <link rel="stylesheet" href="main.css">

    <div id="viewport">

      <!-- Content -->

    <div class="dash-title">
      <h1> Dashboard </h1>
      <h6 id="subtitle"> Voici la description de la page d'accueil du dashboard </h6>
    </div>

      <!-- Content -->
      <div class="container-fluid d-flex justify-content-center row" id="content">

        <div id="graph" class="container-fluid d-flex flex-column align-items-center row p-2 col-md-9">
          <div class="container d-flex justify-content-center col row p-2 ">
          <div id="shadow" class="container border border-dark col-lg-6 p-2">
            <div class="categorie"><h4>Ventes par catégories global</h4></div>
            <canvas id="myChart" ></canvas>
          </div>

          <div id="shadow" class="container border border-dark col-lg-6 p-2" >
            <canvas class="p-2" id="myChart2" ></canvas>
          </div>
        </div>
          <div class="container d-flex justify-content-center col row  p-2">
          <div id="shadow" class="container border border-dark col-lg-6 p-2">
            <canvas class="p-2" id="myChart3" ></canvas>
          </div>
          <div id="shadow" class="container border border-dark col-lg-6 p-2">
            <canvas class="p-2" id="myChart4" ></canvas>
        </div>
      </div>
          </div>

          <div class="container col-md-3 shadowlist" id="list_book">

            <div class="container d-flex flex-column align-items-center justify-content-center">
                  <img id='king' src="template/img/crown.png" alt="...">
                    <div class="title">
                  <!-- <img id="crown" src="template/img/crown1.png"> -->
                  <h5 class="card-title titlelist">Best-Sellers</h5>
                  </div>

                  <table class="table table-responsive table-sm text-center mx-auto">

                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Titre</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Ventes</th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php
                      $count = 0;
                      foreach ($ventetop as $top) {
                          $count = $count + 1;
                          echo "<tr id='";
                          if ($count==1) {
                              echo"gold";
                          } elseif ($count == 2) {
                              echo"silver";
                          } elseif ($count == 3) {
                              echo"bronze";
                          } else {
                              echo"endlist";
                          }
                          echo"'>";
                          echo "<th scope='row'>".$count."</th>";
                          echo "<td><img src='template/img/livre.jpg'></td>";
                          echo "<td>".$top['nom']."</td>";
                          echo "<td>".$top['prix_vente']."</td>";
                          echo "<td>".$top['nbre_vente']."</td>";
                          echo "</tr>";
                      }

                       ?>
                    </tbody>
                  </table>
                </div>
              </div>

          <div class="row mt-5 scoreboard container-fluid">
            <!-- <div class="card bg-dark text-white vw-100"> -->
              <!-- <div class="card-img-overlay"> -->
                <div class="row text-center container-fluid vw-100">
                  <div id="text-appear" class="">
                    <ul class="text hidden d-flex pl-0 pb-4">
                      <li class="ghost">S</li>
                      <li class="ghost">C</li>
                      <li class="ghost">O</li>
                      <li class="ghost">R</li>
                      <li class="ghost">E</li>
                      <li class="ghost">B</li>
                      <li class="ghost">O</li>
                      <li class="ghost">A</li>
                      <li class="ghost">R</li>
                      <li class="ghost">D</li>
                    </ul>
                  </div>
                  <div class="pt-2 col">
                    <div class="counter">
                      <i class="fa fa-line-chart fasize"></i>
                      <h2 class="timer count-title count-number" data-to="<?php echo prixtotalvente();?>" data-speed="2500"></h2>
                      <p class="count-text ">Montant des ventes/€</p>
                    </div>
                    </div>
                      <div class="pt-2 col">
                        <div class="counter">
                          <i class="fa fa-shopping-basket fasize"></i>
                          <h2 class="timer count-title count-number" data-to="<?php echo testctotgraph();?>" data-speed="2500"></h2>
                          <p class="count-text ">Montant des achats/€</p>
                        </div>
                      </div>
                      <div class="pt-2 col">
                        <div class="counter">
                          <i class="fa fa-truck fasize"></i>
                          <h2 class="timer count-title count-number" data-to="<?php echo nbretotalachat();?>" data-speed="2500"></h2>
                          <p class="count-text ">Stock: </p>
                        </div>
                      </div>
                        <div class="pt-2 col">
                          <div class="counter">
                            <i class="fa fa-handshake-o fasize"></i>
                            <h2 class="timer count-title count-number" data-to="<?php echo    nbretotalvente();?>" data-speed="2500"></h2>
                            <p class="count-text ">Total des ventes</p>
                          </div>
                        </div>
                      </div>
                    <!-- </div> -->
                  <!-- </div> -->
                </div>


        <!-- <div class="simple_data  m-2 p-2 text-center  rounded-pill ">
          <p>Total des ventes : <span class="font-weight-bolder"><?php echo prixtotalvente();?></span> €<br></p>
          </div>
        <div class="simple_data  m-2 p-2 text-center rounded-pill">
            <p>Total des achat : <span class="font-weight-bolder"><?php echo testctotgraph();?></span> €<br></p>
          </div>
        <div class="simple_data  m-2 p-2 text-center rounded-pill">
          <p>Nombre d'achat : <span class="font-weight-bolder"><?php echo nbretotalachat();?></span><br></p>
          </div>
        <div class="simple_data  m-2 p-2 text-center rounded-pill">
          <p>Nombre de vente : <span class="font-weight-bolder"><?php echo nbretotalvente();?></span><br></p>
          </div>
        </div> -->




    <script>
    function submitResult() {
    if ( confirm("Etes vous sur de vouloir effacer ce fichier?") == false ) {
      return false ;
    } else {
      return true ;
    }
    }


    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',
    // The data for our dataset
    data: {
      labels: [<?php echo testcatgraph();?>],/*'total'*/
      datasets: [{
          label: 'cout',
          data: [<?php echo testprix(); ?>],/*echo testctot();*/
          backgroundColor:
              poolColors([<?php echo testcatgraph(); ?>].length),

          borderColor:
              poolColors([<?php echo testcatgraph(); ?>].length),


      }]
    },
    // Configuration options go here
    options: { defaultFontColor: 'black' }
    });

    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'horizontalBar',
    // The data for our dataset
    data: {
      labels: [<?php echo labelvente();?>],/*'total'*/
      datasets: [{
          label: 'nombre de vente',
          data: [<?php echo nbrevente(); ?>],/*echo testctot();*/
          backgroundColor:
              poolColors([<?php echo nbrevente(); ?>].length),

          borderColor:
              poolColors([<?php echo nbrevente(); ?>].length),


      }]
    },
    // Configuration options go here
    options: {
      defaultFontColor: 'black',
      legend: { display: false },
      title: {
        display: true,
        text: 'Nombre de ventes'
      },
      scales: {
                 xAxes: [{
                     ticks: {
                         beginAtZero: true
                     }
                 }]
             } }
    });

    var ctx = document.getElementById('myChart3').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
      labels: [<?php echo labelvente();?>],/*'total'*/
      datasets: [{
          label: 'total des vente en €',
          data: [<?php echo vente(); ?>],/*echo testctot();*/
          backgroundColor: poolColors([<?php echo vente(); ?>].length),
          borderColor:
              poolColors([<?php echo vente(); ?>].length),

      }]
    },

    // Configuration options go here
    options: {
      defaultFontColor: 'black',
      legend: { display: false },
      title: {
        display: true,
        text: 'Prix total des ventes (€)'
      },
      scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero: true
                     }
                 }]
             }}
    });
    var ctx = document.getElementById('myChart4').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
      labels: ['',<?php echo getcatyear();?>'total'],/*'total'*/
      datasets: [{
          label: 'achat par categorie sur l\'année 2020',
          data: [0,<?php echo getpriyear(); echo getpritotyear(); ?>],/*echo testctot();*/
          backgroundColor: poolColors(['',<?php echo getcatyear(); ?>'total'].length),
          borderColor:
              poolColors(['',<?php echo getcatyear(); ?>'total'].length),


      }]
    },

    // Configuration options go here
    options: {
      defaultFontColor: 'black',
      legend: { display: false },
      title: {
        display: true,
        text: 'Nombre d\'achat total par catégorie sur l\'année 2020'
      },
      scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero: true
                     }
                 }]
             }
    }
    });
    //random color rgba
    function dynamicColors() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgba(" + r + "," + g + "," + b + ", 0.5)";
    }
    //color with array.lenght for graph
    function poolColors(a) {
        var pool = [];
        for(i =0 ; i <= a; i++) {
            pool.push(dynamicColors());
        }
        return pool;
    }
    </script>



<?php
$content = ob_get_clean();
 require('template.php');
