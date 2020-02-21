<?php

namespace App\Http\Controllers;
use JasperPHP\JasperPHP as JasperPHP;
use Illuminate\Http\Request;

//dd(__DIR__ . '/../../vendor/cossou/jasperphp/examples/hello_world.jasper');
class ReportController extends Controller {

  public function generateReport() {
       
    $jasper = new JasperPHP;
    $jasper->compile(base_path('//public/productList.jrxml'))->execute();
    
    $filename = 'productList';
    $output = base_path('//public/' . $filename);
    $jasper->process(
            base_path('//public/productList.jasper'),
            $output,
            array('pdf', 'rtf'),
            array(),
            array(
              'driver' => 'mysql',
              'host' => 'localhost',
              'port' => '3306',
              'database' => 'reservation',
              'username' => 'root',
              'password' => '1234',
            ),
    )->execute();
    return response()->json(['message' => 'Available products list saved on path /public']);
}

}