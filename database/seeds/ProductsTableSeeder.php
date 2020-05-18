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
          'name' => 'Macbook Pro 15',
          'category' => 'Laptop',
          'brand' => 'Apple',
          'description' => '13.3‑inch (diagonal) LED-backlit display with IPS technology; 2560‑by‑1600 native resolution at 227 pixels per inch with support for millions of colors',
          'basic_price' => 1799,'price' => 1799,
          'quantity' => 10,
          'path' => '/macpro1.jpg',
          'promo'=> true,
          'promo_percentage' => 20,
        ]);
        Product::create([
          'name' => 'Samsung galaxy S9 Plus',
          'category' => 'Phone',
          'brand' => 'Samsung',
          'description' => 'Super Speed Dual Pixel Camera with Rear Dual Camera - Infinity Display: edge to edge immersive screen, enhancing your entertainment experience',
          'basic_price' => 800,'price' => 800,
          'quantity' => 30,
          'path' => '/s9_2.jpg',
          'promo'=> true,
          'promo_percentage' => 10,
        ]);
        Product::create([
          'name' => 'Ipad Air',
          'category' => 'tablet',
          'brand' => 'Apple',
          'description' => '10.5-inch Retina Display with True Tone and wide Color - A12 Bionic chip - Touch ID Fingerprint Sensor and Apple Pay
8MP back - camera, 7MP FaceTime HD Front camera - Stereo speakers - 802.11ac Wi-Fi - Up to 10 hours of battery life',
          'basic_price' => 249,'price' => 249,
          'quantity' => 5,
          'path' => '/ipad1.jpg',
          'promo'=> true,
          'promo_percentage' => 20,
        ]);
        Product::create([
          'name' => 'Canon EOS 2000D',
          'category' => 'Camera',
          'brand' => 'Canon',
          'description' => 'Video Full HD 1080p - WiFi/NFC - Ecran 7,5 cm',
          'basic_price' => 690,'price' => 690,
          'quantity' => 10,
          'path' => '/canon1.jpg',
        ]);
        Product::create([
          'name' => 'IPhone 11 Pro',
          'category' => 'Phone',
          'brand' => 'Apple',
          'description' => 'The iPhone 11 Pro is Apple\'s most powerful phone that come in a one-hand-friendly size. It has a triple-lens camera to capture best-in-class photos and video from a variety of perspectives, a new night mode to enhance low-light photography and extra battery life prowess. Even if the design hasn\'t changed, this is the camera and battery upgrade iPhone users have been after.',
          'basic_price' => 999,'price' => 999,
          'quantity' => 10,
          'path' => '/pro11_1.jpg',
        ]);
        Product::create([
          'name' => 'Huawei P20 Pro 128 Go Dual Sim ',
          'category' => 'Phone',
          'brand' => 'Huawei',
          'description' => 'Paying this much for a Huawei phone may seem a tough sell. But great battery life, top specs and some of the most compelling use of computational photography seen in a phone make the Huawei P20 Pro one of the most interesting handsets available.',
          'basic_price' => 445,'price' => 445,
          'quantity' => 10,
          'path' => '/hua1.jpg',
          'promo'=> true,
          'promo_percentage' => 30,
        ]);
        Product::create([
          'name' => 'Acer Aspire',
          'category' => 'Laptop',
          'brand' => 'Other',
          'description' => 'From everyday computing to a tough professional workload, experience a new level of design and performance options.',
          'basic_price' => 499,'price' => 499,
          'quantity' => 100,
          'path' => '/acer1.jpg',
          'promo'=> true,
          'promo_percentage' => 25,
        ]);
        Product::create([
          'name' => 'HP Spectre',
          'category' => 'Laptop',
          'brand' => 'Other',
          'description' => 'Special offers: Get 15% off Care pack with Consumer PC purchase (Exclusions apply) | Save 20% on McAfee with PC purchase | Save $30 on Microsoft Office with PC Purchase.',
          'basic_price' => 1099,'price' => 1099,
          'quantity' => 10,
          'path' => '/hp1.jpg',
        ]);
        Product::create([
          'name' => 'TV LED Samsung UE49RU7305',
          'category' => 'TV',
          'brand' => 'Samsung',
          'description' => 'QLED 4K features stunning scenes with 8 million pixels – that’s four times the pixels of Full HD.',
          'basic_price' => 549.00,'price' => 549.00,
          'quantity' => 10,
          'path' => '/samtv1.jpg',
        ]);
        Product::create([
          'name' => 'TV LED Hisense H50B7500',
          'category' => 'TV',
          'brand' => 'Other',
          'description' => 'With four times the resolution of an HD TV, you can enjoy your favorite content in a spectacular way.
It has a SMart TV VIDAA U operating system, developed specifically for Hisense televisions.',
          'basic_price' => 300,'price' => 300,
          'quantity' => 10,
          'path' => '/hisense1.jpg',
          'promo'=> true,
          'promo_percentage' => 30,
        ]);
        Product::create([
          'name' => 'Sony DSC-RX10M4 ',
          'category' => 'Camera',
          'brand' => 'Sony',
          'description' => 'Next Gen speed: experience the world’s fastest 0. 02 sec AF with real time AF and object tracking
Enhanced subject capture: wide 425 Phase/ 425 contrast detection points over 84 percent of the sensor',
          'basic_price' => 1455,'price' => 1455,
          'quantity' => 10,
          'path' => '/sony1.jpg',
        ]);
        Product::create([
          'name' => 'Nikon D850 FX-format Digital SLR Camera Body',
          'category' => 'Camera',
          'brand' => 'Other',
          'description' => 'Nikon designed back side illuminated (BSI) full frame image sensor with no optical low pass filter
45.7 megapixels of extraordinary resolution, outstanding dynamic range and virtually no risk of moiré',
          'basic_price' => 2996.95,'price' => 2996.95,
          'quantity' => 10,
          'path' => '/nikon1.jpg',
          'promo'=> true,
          'promo_percentage' => 10,
        ]);
        Product::create([
          'name' => 'Alienware Aurora R4 Gaming PC',
          'category' => 'Gaming',
          'brand' => 'Other',
          'description' => '9th Gen Intel Core i7 9700 (8-Core, 12MB Cache, up to 4.7GHz with Intel Turbo Boost Technology)
                            NVIDIA GeForce RTX 2070 8GB GDDR6 (OC Ready)
                            16GB Dual Channel DDR4 at 2666MHz; up to 64GB (additional memory sold separately)
                            1TB M.2 PCIe NVMe SSD
                            Windows 10 Home 64bit English',
          'basic_price' => 1879,'price' => 1879,
          'quantity' => 10,
          'path' => '/alien1.jpg',
        ]);
        Product::create([
          'name' => 'iBUYPOWER Gaming PC Computer Desktop Element 9260',
          'category' => 'Gaming',
          'brand' => 'Other',
          'description' => 'System: Intel Core i7-9700F 8-Core 3. 0GHz (4. 70 GHz Max Turbo) | 16GB DDR4-2666 RAM | 1TB HDD | 240GB SSD | Genuine Windows 10 Home 64-bit
Graphics: NVIDIA GeForce GTX 1660 Ti 6GB Dedicated Gaming Video Card | VR Ready | 1x DVI | 1x HDMI | 1x Display Port',
          'basic_price' => 9999,'price' => 9999,
          'quantity' => 10,
          'path' => '/ibuy1.jpg',
          'promo'=> true,
          'promo_percentage' => 30,
        ]);
        Product::create([
          'name' => 'DJ Sound Board',
          'category' => 'Other',
          'brand' => 'Other',
          'description' => 'Let’s Get This Party Started Portable two channel DJ Controller for Serato DJ Lite (Included) compatible with Mac and PC
Complete DJ System with DJ Lights Built in light show with three room filling LED light arrays that auto sync to your music and guarantee to make your party utterly unforgettable',
          'basic_price' => 889,'price' => 889,
          'quantity' => 10,
          'path' => '/studio.jpg',
        ]);
        Product::create([
          'name' => 'Galaxy Tab S6',
          'category' => 'Tablet',
          'brand' => 'Samsung',
          'description' => 'The 2-in-1 that’s your all-in-one. Instantly transform your Android tablet into a PC desktop experience when you attach the keyboard with built-in trackpad.
Power to multitask. Thanks to the speed of the fast mobile processor, rapidly switch between apps and tasks or immerse yourself in graphic-intensive games. Plus, get PC-caliber internal RAM.',
          'basic_price' => 727.99,'price' => 727.99,
          'quantity' => 10,
          'path' => '/tab6_1.jpg',
          'promo'=> true,
          'promo_percentage' => 20,
        ]);
        Product::create([
          'name' => 'TAB 7G Tablet 7 Inch, Android Tablet',
          'category' => 'Tablet',
          'brand' => 'Other',
          'description' => 'TAB-7G Android Tablet - Features Android 8.1 Oreo GO and Google Mobile Service that quickly lauches apps, games and videos
13 Inch HD Display - Bright, vivid 1024 x 600 Screen Resolution with Capacitive 5 Point Touch Screen perfect for streaming',
          'basic_price' => 100,'price' => 100,
          'quantity' => 10,
          'path' => '/kids1.jpg',
          'promo'=> true,
          'promo_percentage' => 10,
        ]);
        Product::create([
          'name' => 'Playstation 4 Slim',
          'category' => 'Accessory',
          'brand' => 'Other',
          'description' => 'Incredible games; Endless entertainment
All new lighter slimmer PS4
1TB hard drive
All the greatest, games, TV, music and more',
          'basic_price' => 429,'price' => 429,
          'quantity' => 10,
          'path' => '/play1.jpg',
        ]);
        Product::create([
          'name' => 'DualShock 4 Wireless Controller for PlayStation 4',
          'category' => 'Accessory',
          'brand' => 'Other',
          'description' => 'The feel, shape, and sensitivity of the dual analog sticks and trigger buttons have been improved to provide a greater sense of control, no matter what you play
The new multi touch and clickable touch pad on the face of the DualShock 4 Wireless Controller opens up worlds of new gameplay possibilities for both newcomers and veteran gamers
The DualShock 4 Wireless Controller features a built in speaker and stereo headset jack, putting several new audio options in the player\'s hands',
          'basic_price' => 74.99,'price' => 74.99,
          'quantity' => 10,
          'path' => '/cont1.jpg',
        ]);
        Product::create([
          'name' => 'Xbox Wireless Controller',
          'category' => 'Accessory',
          'brand' => 'Other',
          'description' => 'Experience the enhanced comfort and feel of the Xbox wireless controller
Features a dark grey design with light grey and blue accents
Plug in any compatible headset with the 3.5 millimeter stereo headset jack
Stay on target with textured grip
Includes Bluetooth technology for gaming on Windows 10 PCs and tablets',
          'basic_price' => 72.99,'price' => 72.99,
          'quantity' => 10,
          'path' => '/xbox1.jpg',
        ]);
        // Product::create([
        //   'name' => 'Macbook Pro21',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro20',
        //   'category' => 'phone',
        //   'brand' => 'samsung',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro30',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro40',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro50',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro60',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro70',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro80',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro90',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro1010',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro1100',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro200',
        //   'category' => 'phone',
        //   'brand' => 'samsung',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro300',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro400',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro500',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro600',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro700',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro800',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro900',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro11010',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro112',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro223',
        //   'category' => 'phone',
        //   'brand' => 'samsung',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro3123',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro412',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro5123',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro6123',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro7123',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro8123',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro9123',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro101234',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro1123',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro2123',
        //   'category' => 'phone',
        //   'brand' => 'samsung',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro1233',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro4234',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro534',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro346',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro7534',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro8546',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro96453',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
        // Product::create([
        //   'name' => 'Macbook Pro10345',
        //   'category' => 'Laptop',
        //   'brand' => 'Apple',
        //   'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        //   'basic_price' => 1000,'price' => 1000,
        //   'quantity' => 10,
        //   'path' => '/macpro2.jpg',
        // ]);
    }
}
