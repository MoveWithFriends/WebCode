<?php include('header2.php'); ?>

<style>
table, th, td {
  border: 1px solid black;
  padding-left: 10px;
  padding-right:10px;
  text-align: center;
}
</style>
<article class="container opacity shadow p-3 mb-4 mt-4 col-xl-8 bg-light" >
  <div class="wrapper">
    <h1>Beschikbaarheid</h1>
  <table>
    <tr>
      <th>Dag</th>
      <th>Ochtend</th>
      <th>Middag</th>
      <th>Avond</th>
    </tr>
    <tr>
      <td> Maandag</td>
      <td><input type="checkbox" name="available" value="ochtend" > </td>
      <td><input type="checkbox" name="available" value="middag" ></td>
      <td><input type="checkbox" name="available" value="avond" ></td>
    </tr>
    <tr>
      <td> Dinsdag</td>
      <td><input type="checkbox" name="available" value="ochtend" > </td>
      <td><input type="checkbox" name="available" value="middag" ></td>
      <td><input type="checkbox" name="available" value="avond" ></td>
    </tr>
    <tr>
      <td> Woendag</td>
      <td><input type="checkbox" name="available" value="ochtend" > </td>
      <td><input type="checkbox" name="available" value="middag" ></td>
      <td><input type="checkbox" name="available" value="avond" ></td>
    </tr>
    <tr>
      <td> Donderdag</td>
      <td><input type="checkbox" name="available" value="ochtend" > </td>
      <td><input type="checkbox" name="available" value="middag" ></td>
      <td><input type="checkbox" name="available" value="avond" ></td>
    </tr>
    <tr>
      <td> Vrijdag</td>
      <td><input type="checkbox" name="available" value="ochtend" > </td>
      <td><input type="checkbox" name="available" value="middag" ></td>
      <td><input type="checkbox" name="available" value="avond" ></td>
    </tr>
    <tr>
      <td> Zaterdag</td>
      <td><input type="checkbox" name="available" value="ochtend" > </td>
      <td><input type="checkbox" name="available" value="middag" ></td>
      <td><input type="checkbox" name="available" value="avond" ></td>
    </tr>
    <tr>
      <td> Zondag</td>
      <td><input type="checkbox" name="available" value="ochtend" > </td>
      <td><input type="checkbox" name="available" value="middag" ></td>
      <td><input type="checkbox" name="available" value="avond" ></td>
    </tr>
  </table>
</article>


<article class="container opacity shadow p-3 mb-4 mt-4 col-xl-8 bg-light" >
    <div class="wrapper">
    <h1>Activiteit</h1>

<table>
    <tr>
      <th>Activiteit</th>
      <th>Voorkeur</th>
    </tr>
    <tr>
      <td> Boksen</td>
      <td><input type="checkbox" name="Interest" value="boksen" > </td>
    </tr>
    <tr>
      <td> Fitness</td>
      <td><input type="checkbox" name="Interest" value="fitness" > </td>
    </tr>
    <tr>
      <td> Hardlopen</td>
      <td><input type="checkbox" name="Interest" value="hardlopen" > </td>
    </tr>
    <tr>
      <td> Squash</td>
      <td><input type="checkbox" name="Interest" value="squash" > </td>
    </tr>
    <tr>
      <td> Tennis</td>
      <td><input type="checkbox" name="Interest" value="tennis" > </td>
    </tr>
    <tr>
      <td> Wandelen</td>
      <td><input type="checkbox" name="Interest" value="wandelen" > </td>
    </tr>
    <tr>
      <td> Wielrennen</td>
      <td><input type="checkbox" name="Interest" value="wielrennen" > </td>
    </tr>
    <tr>
      <td> Zwemmen</td>
      <td><input type="checkbox" name="Interest" value="zwemmen" > </td>
    </tr>


  </table>
</article>
  
  
<?php include('footer.php'); ?>



