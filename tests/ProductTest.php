<?php


use App\Product;

class ProductTest extends TestCase
{

    public function testCreateProduct()
    {
        $this->post('/api/products', ['name' => 'masaje', 'description' => 'en el hotel Riu Maspalomas']);
        $this->seeStatusCode(201);
        $this->seeJson(['name' => 'masaje', 'description' => 'en el hotel Riu Maspalomas']);
    }

    public function testGetProduct(){

        $this->get('/api/products/1', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'id',
                'name',
                'description',
            ]   
        );
    }

    public function testGetAllProducts(){

        $this->get("/api/products", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            '*' =>[
                    'name',
                    'description'
                ]
        ]);
        
    }
    /**
     * /products/id [PUT]
     */
    public function testUpdateProduct(){

        $parameters = [
            'name' => 'Update succesfull',
            'description' => 'New change',
        ];

        $this->put("/api/products/1", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJson($parameters);
    }

    /**
     * /products/id [DELETE]
     */
    public function testDeleteProduct(){
        
        $this->delete("/api/products/1", [], []);
        $this->seeStatusCode(200);
        $this->seeJson(['Product deleted']);
    }

}  