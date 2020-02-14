<?php


use App\Product;

class ProductTest extends TestCase
{

    /**
     * /products [POST]
     */

    public function testCreateProduct()
    {
        $this->post('/api/products', ['name' => 'masaje', 'description' => 'en el hotel Riu Maspalomas', 'id_distribution' => '1']);
        $this->seeStatusCode(201);
        $this->seeJson(['name' => 'masaje', 'description' => 'en el hotel Riu Maspalomas', 'id_distribution' => '1']);
    }
   
    
    /**
     * /products/id [GET]
     */

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

    /**
    * /products [GET]
    */

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
            'id_distribution' => '1',
        ];

        $this->put("/api/products/1", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJson(['Product updated']);
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