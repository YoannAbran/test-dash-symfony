<?php
ob_start();
session_start();
session_regenerate_id();
if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
} else {
    $search='';
}
if (isset($_GET['cat'])) {
    $cat = htmlspecialchars($_GET['cat']);
} else {
    $cat='';
}
?>
<nav class="navbar navbar-light bg-light">
  <form class="form-inline" method="GET" action="index.php">
    <input type="hidden" name="action" value="listbook"/>
    <input type="hidden" name="page_no" value="<?php $page_no ?>"/>
    <input type="hidden" name="orderBy" value="<?php $order ?>"/>
    <input type="hidden" name="sort" value="<?php $ascdesc ?>"/>
    <input type="hidden" name="cat" value="<?php $cat ?>"/>
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
  </form>

  <form class="form-inline" method="GET" action="index.php">
    <input type="hidden" name="action" value="listbook"/>
    <input type="hidden" name="page_no" value="<?php $page_no ?>"/>
    <input type="hidden" name="orderBy" value="<?php $order ?>"/>
    <input type="hidden" name="sort" value="<?php $ascdesc ?>"/>
    <input type="hidden" name="search" value="<?php $search ?>"/>
    <select class="p-2" name="cat">
      <option value="">Catégorie</option>
<?php foreach ($allcat as $row)
 { ?>
      <option value="<?php echo $row['categorie']; ?>"><?php echo $row['categorie']; ?></option>
    <?php } ?>
    </select>
    <button class="btn btn-outline-dark p-2 m-2 " type="submit">select</button>
  </form>


</nav>
<table class='table table-responsive-md table-striped table-light shadow-sm'>
          <thead class="thead-dark">
            <tr>
              <th class='text-center align-middle' scope='col'>#</th>

              <th class='text-center align-middle' scope='col'><a class="text-light" href="<?php echo "index.php?action=listbook&cat=".$cat."&search=".$search."&page_no=". $page_no."&orderBy=nom&sort=".(($ascdesc=='ASC')? 'DESC' : 'ASC').""?>">Nom</a></th>

              <th class='text-center align-middle' scope='col'><a class="text-light" href="<?php echo "index.php?action=listbook&cat=".$cat."&search=".$search."&page_no=". $page_no."&orderBy=reference&sort=".(($ascdesc=='ASC')? 'DESC' : 'ASC').""?>">Reference</a></th>

              <th class='text-center align-middle' scope='col'><a class="text-light" href="<?php echo "index.php?action=listbook&cat=".$cat."&search=".$search."&page_no=". $page_no."&orderBy=date_achat&sort=".(($ascdesc=='ASC')? 'DESC' : 'ASC').""?>">Achat</a></th>

              <th class='text-center align-middle' scope='col'><a class="text-light" href="<?php echo "index.php?action=listbook&cat=".$cat."&search=".$search."&page_no=". $page_no."&orderBy=date_garantie&sort=".(($ascdesc=='ASC')? 'DESC' : 'ASC').""?>">Garantie</a></th>

              <th class='text-center align-middle' scope='col'><a class="text-light" href="<?php echo "index.php?action=listbook&cat=".$cat."&search=".$search."&page_no=". $page_no."&orderBy=prix&sort=".(($ascdesc=='ASC')? 'DESC' : 'ASC').""?>">Prix d'achat</a></th>

              <th class='text-center align-middle ' scope='col'>Conseil</th>

              <th class='text-center align-middle' scope='col'>Ticket</th>

              <th class='text-center align-middle' scope='col'>Photo</th>

              <th class='text-center align-middle' scope='col'><a class="text-light" href="<?php echo "index.php?action=listbook&cat=".$cat."&search=".$search."&page_no=". $page_no."&orderBy=categorie&sort=".(($ascdesc=='ASC')? 'DESC' : 'ASC').""?>">Catégorie</a></th>

              <?php if (isset($_SESSION['isAdmin'])) {
    echo "<th class='text-center align-middle' scope='col'>Suppression</th>
                ";
}?>
            </tr>
          </thead>
        <tbody>


<?php
foreach ($books as $row)  {
    ?>
      <tr>
        <th scope="row"><?php echo $row['id']; ?></th>
        <?php if (isset($_SESSION['isAdmin'])) {
        echo "<td class='text-center align-middle'><a class='text-dark' href='index.php?action=edit&id=".$row['id']."'>".htmlspecialchars($row['nom'])."</a></td>";
    } else {
        echo "<td class='text-center align-middle'>".htmlspecialchars($row['nom'])."</td>";
    } ?>

          <td class='text-center align-middle'><?php echo htmlspecialchars($row['reference']); ?></td>

          <td class='text-center align-middle'><?php echo htmlspecialchars($row['date_achat']); ?></td>

          <td class='text-center align-middle'><?php echo htmlspecialchars($row['date_garantie']); ?></td>

          <td class='text-center align-middle'><?php echo htmlspecialchars($row['prix']); ?></td>

          <td class='text-center align-middle text-truncate' style="max-width: 50px;"><?php echo htmlspecialchars($row['conseil']); ?></td>

          <td class='text-center align-middle'><?php echo htmlspecialchars($row['photo_ticket']); ?></td>

          <td class='text-center align-middle'><?php echo htmlspecialchars($row['photo']); ?></td>

          <td class='text-center align-middle'><?php echo htmlspecialchars($row['categorie']); ?></td>
        <?php    if (isset($_SESSION['isAdmin'])) {
        echo "<td class='text-center align-middle'><form action ='index.php?action=delete&id=".$row['id']."' method='post' onsubmit='return submitResult();'><button class='btn btn-link'type='submit' name='suppr' value=''><i class='text-dark fas fa-trash-alt'></i></button></form></td>";
    } ?>
      </tr>
      <?php
}  ?>
            </tbody>
          </table>
          <nav aria-label="Page navigation" class="">
            <ul class="pagination justify-content-center ">
    <?php if ($page_no > 1) {
        echo "<li class='page-item'><a class='  text-dark page-link' href='index.php?action=listbook&cat=$cat&search=$search&page_no=1&orderBy=$order&sort=$ascdesc'>First Page</a></li>";
    } ?>

    <li class='page-item <?php if ($page_no <= 1) {
        echo "disabled";
    } ?> ' >
    <a class=' text-dark page-link'<?php if ($page_no > 1) {
        echo "href='index.php?action=listbook&cat=$cat&search=$search&page_no=$previous_page&orderBy=$order&sort=$ascdesc'";
    } ?>>Previous</a>
    </li>

    <li class='page-item <?php if ($page_no >= $total_no_of_pages) {
        echo "disabled";
    } ?>'>
    <a class=' text-dark page-link'<?php if ($page_no < $total_no_of_pages) {
        echo "href='index.php?action=listbook&cat=$cat&search=$search&page_no=$next_page&orderBy=$order&sort=$ascdesc'";
    } ?>>Next</a>
    </li>

    <?php if ($page_no < $total_no_of_pages) {
        echo "<li><a class=' text-dark page-link' href='index.php?action=listbook&cat=$cat&search=$search&page_no=$total_no_of_pages&orderBy=$order&sort=$ascdesc'>Last &rsaquo;&rsaquo;</a></li>";
    }

       ?>
    </ul>
  </nav>
  </div>
<?php
$content = ob_get_clean();
 require('template.php');
