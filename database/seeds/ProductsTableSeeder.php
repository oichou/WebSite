  <?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
          'name' => 'Macbook Pro1',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1234.321,'price' => 1234.321,
          'quantity' => 10,
          'path' => '/macpro.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro2',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 2342.23,'price' => 2342.23,
          'quantity' => 10,
          'path' => '/mac_slide.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro3',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 999.99,'price' => 999.99,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'samsung s10 +',
          'category' => 'Phone',
          'brand' => 'Samsung',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 332.332,'price' => 332.332,
          'quantity' => 10,
          'path' => '/cat_phones2.jpg',
        ]);
        Product::create([
          'name' => 'samsung s10',
          'category' => 'Phone',
          'brand' => 'Samsung',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/brand_samsung.jpg',
        ]);
        Product::create([
          'name' => 'Sony Camera',
          'category' => 'Camera',
          'brand' => 'Sony',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/brand_sony2.jpg',
        ]);
        Product::create([
          'name' => 'iphone X',
          'category' => 'Phone',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 24323.43,'price' => 24323.43,
          'quantity' => 10,
          'path' => '/iphoneX.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro8',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro9',
          'category' => 'Accessory',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 432.44,'price' => 432.44,
          'quantity' => 10,
          'path' => '/Apple_watch.jpg',
        ]);
        Product::create([
          'name' => 'Sony',
          'category' => 'Gaming',
          'brand' => 'Sony',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 98.54,'price' => 98.54,
          'quantity' => 10,
          'path' => '/brand_sony.jpg',
        ]);
        Product::create([
          'name' => 'Computer for games',
          'category' => 'Computer',
          'brand' => 'Other',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/cat_computers.jpg',
        ]);
        Product::create([
          'name' => 'iphone 11',
          'category' => 'Phone',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 678.44,'price' => 678.44,
          'quantity' => 10,
          'path' => '/cat_phones.jpg',
        ]);
        Product::create([
          'name' => 'dj board',
          'category' => 'Other',
          'brand' => 'Other',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 123.33,'price' => 123.33,
          'quantity' => 10,
          'path' => '/studio.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro14',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro15',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro16',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro17',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro18',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro19',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro2340',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro21',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro20',
          'category' => 'phone',
          'brand' => 'samsung',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro30',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro40',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro50',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro60',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro70',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro80',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro90',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro1010',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro1100',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro200',
          'category' => 'phone',
          'brand' => 'samsung',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro300',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro400',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro500',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro600',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro700',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro800',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro900',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro11010',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro112',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro223',
          'category' => 'phone',
          'brand' => 'samsung',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro3123',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro412',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro5123',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro6123',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro7123',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro8123',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro9123',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro101234',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro1123',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro2123',
          'category' => 'phone',
          'brand' => 'samsung',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro1233',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro4234',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro534',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro346',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro7534',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro8546',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro96453',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
        Product::create([
          'name' => 'Macbook Pro10345',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
          'basic_price' => 1000,'price' => 1000,
          'quantity' => 10,
          'path' => '/macpro2.jpg',
        ]);
    }
}
