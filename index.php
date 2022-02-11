<?php
require "models/data.php";
$d = new Data();
$data = $d->getAll();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="js/app.js" defer></script> -->

    <title></title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-6">
                <h1 style="text-align: center;">Maak je eigen pizza</h1>
            </div>
        </div>
        <div class="justify-content-center mt-4 mb-2">
            <form class="form" action="entries.php?action=add" method="POST" style="text-align: center">

                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputSize">Bodemformaat (cm)</label>
                            <select id="inputSize" class="form-control" placeholder="test" name="size">
                                <option selected disabled>Maak je keuze</option>
                                <option>20</option>
                                <option>25</option>
                                <option>30</option>
                                <option>35</option>
                                <option>40</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputSauce">Saus</label>
                                <select id="inputSauce" class="form-control" placeholder="test" name="sauce">
                                    <option selected disabled>Maak je keuze</option>
                                    <option>Tomatensaus</option>
                                    <option>Extra tomatensaus</option>
                                    <option>Spicy tomatensaus</option>
                                    <option>BBQ saus</option>
                                    <option>Creme fraiche</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Toppings & Herbs -->
                <div class="row justify-content-center">
                    <div class="col-2 mb-4">
                        <p class="bold">PIZZATOPPINGS</p>
                        <div class="form-group">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="topping" id="vegan" value="vegan">
                                    <label class="form-check-label" for="vegan">
                                        Vegan
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="topping" id="vegetarian" value="vegetarian">
                                    <label class="form-check-label" for="vegetarian">
                                        Vegetarisch
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="topping" id="meat" value="meat">
                                    <label class="form-check-label" for="meat">
                                        Vlees
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
                    <div class="col-2">
                        <p class="bold">KRUIDEN</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="check" name="peterselie">
                            <label class="form-check-label" for="check">
                                Peterselie
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="check" name="oregano">
                            <label class="form-check-label" for="check">
                                Oregano
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="check" name="chili">
                            <label class="form-check-label" for="check">
                                Chili Flakes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="check" name="peper">
                            <label class="form-check-label" for="check">
                                Zwarte peper
                            </label>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-7">
                <button type="submit" class="btn btn-success w-100">Bestel</button>
            </div>
        </div>
        </form>
        
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Formaat</th>
                        <th scope="col">Saus</th>
                        <th scope="col">Toppings</th>
                        <th scope="col">Peterselie</th>
                        <th scope="col">Oregano</th>
                        <th scope="col">Chili</th>
                        <th scope="col">Peper</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row) { ?>
                            <th id=<?=$row["id"]?>><?= $row["bodemformaat"] ?>cm</th>
                            <td id=<?=$row["id"]?>><?= ucfirst($row["saus"]) ?></td>
                            <td id=<?=$row["id"]?>><?= ucfirst($row["toppings"]) ?></td>
                            <td id=<?=$row["id"]?>><?= $row["peterselie"] ? 'Ja' : 'Nee'?></td>
                            <td id=<?=$row["id"]?>><?= $row["oregano"] ? 'Ja' : 'Nee' ?></td>
                            <td id=<?=$row["id"]?>><?= $row["chili"] ? 'Ja' : 'Nee' ?></td>
                            <td id=<?=$row["id"]?>><?= $row["peper"] ? 'Ja' : 'Nee' ?></td>
                            <td>
                                <a href="update.php?id=<?=$row["id"]?>"><input class="editBtn" type="image" src="img/b_edit.png" alt="Edit" id=<?=$row["id"]?>></a>
                            </td>
                            <td>
                                <a href="entries.php?action=delete&id=<?=$row['id']?>">
                                    <img src="img/b_drop.png" alt="Delete">
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>