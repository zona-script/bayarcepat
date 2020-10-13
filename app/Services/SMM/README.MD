


contohnya gini

$orderID = SMMFactory::make($smmProvider)
->order($payload);

(new TransactionSMM($smmProvider, $product, $orderID))
->createTransaction();



----
Design pattern yang digunakan adalah
strategy

````
class Storage {
    private $source;

    public function __constructor(AdapterInterface $source) {
        $this->source = $source;
    }
    public function getOne(int $id) : ?object {
        return $this->source->find($id);
    }

    public function getAll(array $criteria = []) : Collection {
        return $this->source->findAll($criteria);
    }
}
````


````
interface AdapterInterface {
    public function find(int $id) : ?object;
    public function findAll(array $criteria = []) : Collection;
}
````


````
$row = $mysql->fetchRow(...);
$data = $mysql->fetchAll(...);
````


````
class MySqlAdapter implements AdapterInterface {

     ...
     public function find(int $id) : ?object {

         $data = $this->mysql->fetchRow(['id' => $id]);
         // some data transformation
     }
     public function findAll(array $criteria = []) : Collection {

         $data = $this->mysql->fetchAll($criteria);
         // some data transformation
     }

     ...
}
````


````
$storage = new Storage(new MySqlAdapter($mysql));
````
