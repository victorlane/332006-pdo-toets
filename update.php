<?php
require "models/data.php";
$d = new Data();
$data = $d->getByid($_GET['id']);
var_dump($data);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <h1 style="text-align: center;">Maak je eigen pizza</h1>
    <div class="justify-content-center mt-4 mb-2">
            <form class="form" action="entries.php?action=update" method="POST" style="text-align: center">

                <div class="row justify-content-center">
                    <div class="col-2">
                      <input type="hidden" name="id" value="<?=$_GET['id']?>"/>
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
                                    <option disbaled>Maak je keuze</option>
                                    <option>>Extra tomatensaus</option>
                                    <option> Spicy tomatensaus</option>
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
                                    <input class="form-check-input" type="radio" name="topping" id="vegan" value="vegan" <?=$data['toppings'] == "vegan" ? 'checked' : ''?>>
                                    <label class="form-check-label" for="vegan">
                                        Vegan
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="topping" id="vegetarian" value="vegetarian" <?=$data['toppings'] == "vegetarian" ? 'checked' : ''?>>
                                    <label class="form-check-label" for="vegetarian">
                                        Vegetarisch
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="topping" id="meat" value="meat <?=$data['toppings'] == "meat" ? 'checked' : ''?>">
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
                            <input class="form-check-input" type="checkbox" value="true" id="check" name="peterselie" <?=$data['peterselie'] ? 'checked' : ''?>>>
                            <label class="form-check-label" for="check">
                                Peterselie
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="check" name="oregano" <?=$data['oregano'] ? 'checked' : ''?>>>
                            <label class="form-check-label" for="check">
                                Oregano
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="check" name="chili" <?=$data['chili'] ? 'checked' : ''?>>
                            <label class="form-check-label" for="check">
                                Chili Flakes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="check" name="peper" <?=$data['peper'] ? 'checked' : ''?>>
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
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>