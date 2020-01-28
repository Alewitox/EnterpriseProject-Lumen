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

        $this->get('/api/products/2', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'id',
                'name',
                'description',
            ]   
        );
    }

}  

