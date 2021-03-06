<?php
require dirname(__DIR__, 1) . "/db/database.php";

class Data extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function setData(array $data) {
        $this->data = $data;
    }

    public function deleteEntry(string $id) {
        $sql = "DELETE FROM pizza WHERE id = :id";
        $this->prepare($sql);
        $this->bind(":id", intval($id));
        $this->execute();
    }

    public function getById(string $id) {
        $this->prepare("SELECT * FROM pizza WHERE id = :id");
        $this->bind(":id", intval($id));
        return $this->fetch();
    }

    public function getAll() {
        $this->prepare("SELECT * FROM pizza");
        $this->execute();
        return $this->fetchAll();
    }

    public function updateById(string $id) {
        $this->checkHerbs();

        $this->prepare("UPDATE pizza SET bodemformaat = :size, saus = :sauce, toppings = :toppings, peterselie = :peterselie, oregano = :oregano, chili = :chili, peper = :peper WHERE id = :id");        
        $this->bind(":id", intval($id));
        $this->bind(":size", $this->data['size']);
        $this->bind(":sauce", $this->data['sauce']);
        $this->bind(":toppings", $this->data['topping']);
        $this->bind(":peterselie", $this->peterselie);
        $this->bind(":oregano", $this->oregano);
        $this->bind(":chili", $this->chili);
        $this->bind(":peper", $this->peper);
        $this->execute();
    }

    public function addEntry() {
        $this->checkHerbs();

        if(is_null($this->data) || empty($this->data)) {
            return false;
        }
    
        $this->prepare("INSERT INTO pizza (bodemformaat, saus, toppings, peterselie, oregano, chili, peper)
         VALUES (:bodemformaat, :saus, :toppings, :peterselie, :oregano, :chili, :peper)");
        $this->bind(":bodemformaat", intval($this->data['size']));
        $this->bind(":saus", $this->data['sauce']);
        $this->bind(":toppings", $this->data['topping']);
        $this->bind(":peterselie", $this->peterselie);
        $this->bind(":oregano", $this->oregano);
        $this->bind(":chili", $this->chili);
        $this->bind(":peper", $this->peper);
        $this->execute();
    }

    private function checkHerbs() {
        $this->peterselie = isset($this->data['peterselie']) ? true : false;
        $this->oregano = isset($this->data['oregano']) ? true : false;
        $this->chili = isset($this->data['chili']) ? true : false;
        $this->peper = isset($this->data['peper']) ? true : false;
    }
}

?>