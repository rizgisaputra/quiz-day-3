<?php
include "Bussines.php";

$bussines = new Bussines();
$customer = new Customer();
$internet_cafes = new InternetCafes();
$code_wifi = new CodeWifi();
$employement = new Employement();
$food = new Food();

showMenu($bussines, $customer, $internet_cafes, $code_wifi, $employement, $food);

function showMenu(Bussines $bussines, Customer $customer, InternetCafes $internet_cafes,
 CodeWifi $code_wifi, Employement $employement, Food $food) {
    echo "\n=========== MENU ============\n";
    echo "1. Add Internet Cafes         \n";
    echo "2. Add Computer               \n";
    echo "3. Add Code Wifi              \n";
    echo "4. Add Employement            \n";
    echo "5. Absen Employement          \n";
    echo "6. Add Customer               \n";
    echo "7. Add Food                   \n";
    echo "8. Show About Internet Cafes  \n";
    echo "9. Delete Employement         \n";
    echo "10.Exit                         ";
    echo "\n=============================\n";
    chooseUser($bussines, $customer, $internet_cafes, $code_wifi, $employement, $food);
}

function chooseUser(Bussines $bussines, Customer $customer, InternetCafes $internet_cafes,
CodeWifi $code_wifi, Employement $employement, Food $food) {
    $choose_user = readline("Choose [1-10] : ");
    switch ($choose_user) {
    case 1:
        addRuko($bussines, $internet_cafes);
        break;
    case 2:
        addComputer($bussines);
        break;
    case 3:
        addCodeWifi($bussines, $code_wifi);
        break;
    case 4:
        addEmployement($bussines, $employement);
        break;
    case 5:
        absenEmployement($bussines);
        break;
    case 6:
        addCustomer($bussines, $customer);
        break;
    case 7:
        addFood($bussines, $food);
        break;
    case 8:
        showAboutInternetCafes($bussines, $customer);
        break;
    case 9:
        deleteEmployement($bussines);
        break;
    case 10:
        echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
        echo "You Have Been Left The Program";
        echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
        return;
    default:
        echo"\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
        echo"Input Invalid Please Input Again";
        echo"\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
        chooseUser($bussines, $customer, $internet_cafes, $code_wifi, $employement, $food);
    }
    showMenu($bussines, $customer, $internet_cafes, $code_wifi, $employement, $food);
}

function addRuko(Bussines $bussines, InternetCafes $internet_cafes) {
    $inputName = readline("\nInput Name Internet Cafes   : ");
    $internet_cafes->setName($inputName);

    $inputAddres = readline("Input Addres Internet Cafes : ");
    $internet_cafes->setAddres($inputAddres);

    $bussines->setInternetCafes($internet_cafes);
}

function showRuko(Bussines $bussines) {
    $arrayBussines = $bussines->getInternetCafes();
    if (count($arrayBussines) == 0) {
        echo "No Ruko Found\n\n";
        return;
    }

    $number = 1;
    foreach($arrayBussines as $ab){
        echo  "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
        echo  "       Ruko Number {$number}"  ;
        echo  "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
        echo  "Name Ruko   : {$ab->getName()} \n";
        echo  "Alamat Ruko : {$ab->getAddres()}";
        echo  "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n\n";
        $number++;
    }
}

function addComputer(Bussines $bussines) {
    $arrayBussines = $bussines->getInternetCafes();
    showRuko($bussines);
    
    $number_ruko_add_computer = readline ("Input Number Ruko Will Be Add Computer : ");

    if ($number_ruko_add_computer > count($arrayBussines)) {
       echo "Input More Than Total Ruko\n";
       echo "Please Input Again\n";
       addComputer($bussines);
    }

    for ($i = 0; $i < count($arrayBussines); $i++) {
        if ($arrayBussines[$number_ruko_add_computer - 1]->getName() == $arrayBussines[$i]->getName()) {
           echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
           echo "            List Room            ";
           echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
           echo "1. Room Reguler                \n";
           echo "2. Room Vip                      ";
           echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";

           $choose_room = readline("Choose [1-2]: ");

            while ($choose_room > 2 || $choose_room < 1) {
               echo "Input Invalid, Please Input Again!!!\n";
               $choose_room = readline("Choose [1-2]: ");
            }

            if ($choose_room == 1) {
               $how_many_computer = readline("How Many : ");

                while($arrayBussines[$i]->getTotalPcInRegulerRoom() + (int)$how_many_computer > 20) {
                   echo "Your Input More Than Limit, Please Input Again\n";
                   $how_many_computer = readline("How Many : ");
                }
                
                $arrayBussines[$i]->setTotalPcInRegulerRoom($arrayBussines[$i]->getTotalPcInRegulerRoom() + (int)$how_many_computer);
               echo "Computer Succes Be Added In Room Reguler\n";

            }
            else if ($choose_room == 2) {
               $how_many_computer = readline("How Many : ");

                while ($arrayBussines[$i]->getTotalPcInVipRoom() + (int)$how_many_computer > 10) {
                   echo "Your Input More Than Limit, Please Input Again\n";
                   $how_many_computer = readline("How Many : ");
                }

                $arrayBussines[$i]->setTotalPcInVipRoom($arrayBussines[$i]->getTotalPcInVipRoom() + $how_many_computer);
               echo "Computer Succes Be Added In Room Vip\n";
            }
        }
    }
}

function addCodeWifi(Bussines $bussines, CodeWifi $code_wifi) {
    $arrayBussines = $bussines->getInternetCafes();
    showRuko($bussines);
    $numberRukoAddWifi = readline("Input Number Ruko Will Be Add Code Wifi : ");

    for ($i = 0; $i < count($arrayBussines); $i++) {
        if ($arrayBussines[(int)$numberRukoAddWifi - 1]->getName() == $arrayBussines[$i]->getName()) {
           echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
           echo "         List Code Wifi          ";
           echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
           echo "1. Code Wifi 3 hours           \n";
           echo "2. Code Wifi 10 hours          \n";
           echo "3. Code Wifi 24 hours            ";
           echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
           $choose_code_wifi = readline("Choose [1-3] : ");

            while ((int)$choose_code_wifi > 3 ||(int)$choose_code_wifi < 1) {
               echo "Input Invalid, Please Input Again\n";
               $choose_code_wifi = readline("Choose [1-3] : ");
            }

            if ($choose_code_wifi == 1) {
               $code = readline("Input Code : ");
               
                for ($j = 0; $j < count($arrayBussines[$i]->getCodeWifi()); $j++) {
                    for ($k = 0; $k < count($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi2k()); $k++) {
                        if ($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi2k() == $code) {
                           echo "This Code Has Already Added\n";
                            return;
                        }
                        if ($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi5k() == $code) {
                           echo "This Code Has Already Added\n";
                            return;
                        }
                        if ($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi10k() == $code) {
                           echo "This Code Has Already Added\n";
                            return;
                        }
                    }
                }

               echo "Code Wifi Succes Be Added\n\n";
               $code_wifi->setCodeWifi2k($code);
            }
            else if ($choose_code_wifi == 2) {
                $code = readline("Input Code : ");

                for ($j = 0; $j < count($arrayBussines[$i]->getCodeWifi()); $j++) {
                    for ($k = 0; $k < count($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi5k()); $k++) {
                        if ($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi2k() == $code) {
                           echo "This Code Has Already Added\n";
                            return;
                        }
                        if ($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi5k() == $code) {
                           echo "This Code Has Already Added\n";
                            return;
                        }
                        if ($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi10k() == $code) {
                           echo "This Code Has Already Added\n";
                            return;
                        }
                    }
                }

               echo "Code Wifi Succes Be Added\n\n";
               $code_wifi->setCodeWifi5k($code);
            }
            else if ($choose_code_wifi == 3) {
                $code = readline("Input Code : ");

                for ($j = 0; $j < count($arrayBussines[$i]->getCodeWifi()); $j++) {
                    for ($k = 0; $k < count($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi10k()); $k++) {
                        if ($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi2k() == $code) {
                           echo "This Code Has Already Added\n";
                            return;
                        }
                        if ($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi5k() == $code) {
                           echo "This Code Has Already Added\n";
                            return;
                        }
                        if ($arrayBussines[$i]->getCodeWifi()[$j]->getCodeWifi10k() == $code) {
                           echo "This Code Has Already Added\n";
                            return;
                        }
                    }
                }
               echo "Code Wifi Succes Be Added\n\n";
               $code_wifi->setCodeWifi10k($code);
            }
            $arrayBussines[$i]->setCodeWifi($code_wifi);
        }
    }
}


function addEmployement(Bussines $bussines, Employement $employement) {
    $arrayBussines = $bussines->getInternetCafes();
    showRuko($bussines);
    $number_ruko = readline("Input Number Ruko Will Be Add Employement : ");

    if ($number_ruko > count($arrayBussines)) {
       echo "Input More Than Total Ruko\n";
       echo "Please Input Again\n";
       addEmployement($bussines);
    }

    for ($i = 0; $i < count($arrayBussines); $i++) {
        if ($arrayBussines[$i]->getName() == $arrayBussines[(int)$number_ruko - 1]->getName()) {
            $name_employement = readline("\nInput Name Employement     : ");
            $employement->setName($name_employement);

            $nomor_id_employement = readline("Input Nomor Id Employement : ");
            $employement->setNomorId($nomor_id_employement);

            $employement->setTotalAbsen(0);
            $employement->setTotalGaji(0);

            $arrayBussines[$i]->setEmployement($employement);
            echo "Employement Sukses Ditambahkan";
        }
    }
}

function absenEmployement(Bussines $bussines) {
    $arrayBussines = $bussines->getInternetCafes();

    if (count($arrayBussines) == 0) {
        echo "No Ruko Found\n\n";
        return;
    }

    $arrayBussines = $bussines->getInternetCafes();
    showRuko($bussines);
    $choose_ruko = readline("Input Number Ruko : ");

    for ($i = 0; $i < count($arrayBussines); $i++) {
        if ($arrayBussines[$i]->getName() == $arrayBussines[(int)$choose_ruko - 1]->getName()) {

           $nomor_id= readline("Input Nomor Id: ");

            for ($j = 0; $j < count($arrayBussines[$i]->getEmployement()); $j++) {
                if ($arrayBussines[$i]->getEmployement()[$j]->getNomorId() == $nomor_id) {
                   echo "Nomor Id Has Found\n";
                   echo "Employement With Number Id {$nomor_id} Succes Present\n\n";
                    $arrayBussines[$i]->getEmployement()[$j]->setTotalGaji($arrayBussines[$i]->getEmployement()[$j]->getTotalGaji() + 50000);
                    $arrayBussines[$i]->getEmployement()[$j]->setTotalAbsen($arrayBussines[$i]->getEmployement()[$j]->getTotalAbsen() + 1);                    
                    $bussines->setOmzet($bussines->getOmzet() - 50000);
                }
                else {
                   echo "\nNomor Id Not Found, Please Absen Again!!!\n";
                   absenEmployement($bussines);
                }
            }
        }
    }
}

function addCustomer(Bussines $bussines, Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();
    showRuko($bussines);
    $number_ruko_add_customer =readline("Input Number Ruko Will Be Add Customer : ");

    for ($i = 0; $i < count($arrayBussines); $i++) {
        if ($arrayBussines[$i]->getName() == $arrayBussines[(int)$number_ruko_add_customer - 1]->getName()) {
            $name_customer = readline("\nInput Name Customer   : ");
            $customer->setName($name_customer);

            $age_customer = readline("Input Age Customer    : ");
            $customer->setAge($age_customer);

            $addres_customer = readline("Input Addres Customer : ");
            $customer->setAddres($addres_customer);

            serviceInternetCafes($bussines, $i, $customer);
            $arrayBussines[$i]->setCustomer($customer);
        }
    }
}

function serviceInternetCafes(Bussines $bussines, int $index_ruko, Customer $customer) {
    echo "\n== LIST SERVICE ==\n";
    echo "1. Warnetan         \n";
    echo "2. Fotocopy         \n";
    echo "3. Print            \n";
    echo "4. Scan             \n";
    echo "5. Create Photo     \n";
    echo "6. Wifian             ";
    echo "\n==================\n";

    chooseServiceCustomer($bussines, $index_ruko , $customer);
}

function chooseServiceCustomer(Bussines $bussines, int $index_ruko, Customer $customer) {
    $choose_serivice_customer = readline("Choose [1-6] : ");

    switch ((int)$choose_serivice_customer) {
    case 1:
        chooseServiceUserWarnetan($bussines, $index_ruko, $customer);
        break;
    case 2:
        chooseServiceUser($bussines, "Foto Copy ", 500, $index_ruko, $customer);
        break;
    case 3:
        chooseServiceUserPrint($bussines, $index_ruko, $customer);
        break;
    case 4:
        chooseServiceUser($bussines, "Scan ", 3000, $index_ruko, $customer);
        break;
    case 5:
        chooseServiceCreatePhoto($bussines, $index_ruko, $customer);
        break;
    case 6:
        chooseServiceWifi($bussines, $index_ruko, $customer);
        break;
    }
}

function chooseServiceUserWarnetan(Bussines $bussines, int $index_ruko , Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();

    echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
    echo "            List Room           ";
    echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
    echo "1. Reguler        Rp 4000/hrs  \n";
    echo "2. Vip            Rp 8000/hrs    ";
    echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";

    $choose_room = readline("Choose [1-2] : ");
    $how_long = readline("How Long : ");

    $customer->setKeperluan("Warnetan");

    if ((int)$choose_room == 1) {
        
        if ($arrayBussines[$index_ruko]->getTotalPcInRegulerRoom() == 0) {
            echo "No Computer Found In Reguler Room\n";
            echo "Please Add Computer In Reguler Room\n";
            $customer->setTotalPay(0);
            return;
        }

        $totalPrice = (int)$how_long * 4000;
        echo "Total Price Is {$totalPrice}";
        $arrayBussines[$index_ruko]->setTotalPcInRegulerRoom($arrayBussines[$index_ruko]->getTotalPcInRegulerRoom() - 1);
        $bussines->setOmzet($how_long * 4000);
        $customer->setTotalPay($how_long * 4000);
    }
    else if ((int)$choose_room == 2) {

        if ($arrayBussines[$index_ruko]->getTotalPcInVipRoom() == 0) {
            echo "No Computer Found In Vip Room\n";
            echo "Please Add Computer In Vip Room\n";
            $customer->setTotalPay(0);
            return;
        }

        echo "Total Price Is " << $how_long * 8000;
        $arrayBussines[$index_ruko]->setTotalPcInVipRoom($arrayBussines[$index_ruko]->getTotalPcInVipRoom() - 1);
        $bussines->setOmzet($how_long * 8000);
        $customer->setTotalPay($how_long * 4000);
    }
    else {
        echo "Input Invalid, Please Input Again\n";
        chooseServiceUserWarnetan($bussines, $index_ruko, $customer);
    }

    $confirmation = readline ("\nDo You Want To Order Food [y/n] ? ");
    while ($confirmation != "y" && $confirmation != "n") {
        echo "Input Invalid, Please Input Again";
        $confirmation = readline("Do You Want To Order Food [y/n] : ");
    }

    if ($confirmation == "y") {
        customerBuyFood($bussines, $index_ruko, $customer);
    }
    else {
        echo "Thanks For Your Respon\n";
    }
}

function customerBuyFood(Bussines $bussines, int $index_ruko, Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();

    if (count($arrayBussines[$index_ruko]->getFood())== 0) {
        echo "No Food Found In Internet Cafes\n";
        echo "Please Add Food\n";
        return;
    }

    $number = 1;
    for ($i = 0; $i < count($arrayBussines[$index_ruko]->getFood()); $i++) {
       echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
       echo "         Food Number {$number} ";
       echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
       $name = $arrayBussines[$index_ruko]->getFood()[$i]->getName();
       $price = $arrayBussines[$index_ruko]->getFood()[$i]->getPrice();
       $stok = $arrayBussines[$index_ruko]->getFood()[$i]->getStok();
       echo "Name   : {$name}\n";
       echo "Price  : {$price}\n";
       echo "Stok   : {$stok}";
       echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
       $number++;
    }

    $choose_food = readline("Input Number Food Will Be Buy : ");

    while ((int)$choose_food > count($arrayBussines[$index_ruko]->getFood())) {
        echo "Input Invalid, Please Input Again\n";
        $choose_food = readline ("Input Number Food Will Be Buy : ");
    }

    $how_many = readline ("How Many : ");

    while ((int)$how_many > $arrayBussines[$index_ruko]->getFood()[(int)$choose_food - 1]->getStok()) {
        echo "Your Amount Order More Than Stok!!!\n";
        echo "Please Input Again\n";
        $how_many = readline("How Many : ");
    }

    $foods = $arrayBussines[$index_ruko]->getFood();
    $foods[(int)$choose_food - 1]->setStok($foods[(int)$choose_food - 1]->getStok() - (int)$how_many);
    $customer->setTotalPay($customer->getTotalPay() + ($foods[(int)$choose_food - 1]->getPrice() * (int)$how_many));
    $customer->setNeeds("Warnet And Buy Food");
}


function chooseServiceUser(Bussines $bussines, string $alert, int $price, int $index_ruko, Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();

    for ($i = 0; $i < count($arrayBussines); $i++) {
        if ($arrayBussines[$i]->getName() ==  $arrayBussines[$index_ruko]->getName()) {
            $how_many = readline("How Many Dokumen Will Be {$alert} : ");

            $totalPrice = $how_many * $price;
            echo "\nTotal Price Must Be Pay By Customer Is {$totalPrice}";
            $bussines->setOmzet($bussines->getOmzet() + (int)$totalPrice);
            $customer->setTotalPay($totalPrice);
        }
    }
    $customer->setKeperluan($alert);
}

function chooseServiceUserPrint(Bussines $bussines, int $index_ruko, Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();

    for ($i = 0; $i < count($arrayBussines); $i++) {
        if ($arrayBussines[$i]->getName() == $arrayBussines[$index_ruko]->getName()) {
            echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
            echo "         List Type Print         ";
            echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
            echo "1. Print Copy         Rp 500   \n";
            echo "2. Print Color        Rp 2000  \n";
            echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";

            $choose_type_print = readline("Choose [1-2] : ");

            while ((int)$choose_type_print > 2 || (int)$choose_type_print < 1) {
                echo "Input Invalid, Please Input Again!!!\n";
                $choose_type_print = readline("Choose [1-2] : ");
            }

            $how_many = readline("How Many : ");

            if ($choose_type_print == 1) {
                $total = (int)$how_many * 500;
                echo "Total Price Must Be Pay By Customer Is $total";
                $bussines->setOmzet($bussines->getOmzet() + (int)$total);
                $customer->setTotalPay((int)$total);
                $customer->setKeperluan("Print Copy");
            }
            else if ($choose_type_print == 2) {
                $total = 2000 * (int)$how_many;
                echo "Total Price Must Be Pay By Customer Is $total";
                $bussines->setOmzet($bussines->getOmzet() + $total);
                $customer->setTotalPay($total);
                $customer->setKeperluan("Print Color");
            }
        }
    }
}


function chooseServiceCreatePhoto(Bussines $bussines, int $index_ruko, Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();

    for ($i = 0; $i < count($arrayBussines); $i++) {
        if ($arrayBussines[$i]->getName() == $arrayBussines[$index_ruko]->getName()) {
            echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
            echo "      List Size Create Photo     ";
            echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
            echo "1. Photo 2 x 3        Rp 1000  \n";
            echo "2. Photo 3 x 4        Rp 2000  \n";
            echo "3. Photo 4 x 6        Rp 3000  \n";
            echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";

            $choose_size_photo = readline("Choose [1-3] : ");

            while ((int)$choose_size_photo > 3 || (int)$choose_size_photo < 1) {
                cout << "Input Invalid, Please Input Again!!!\n";
                $choose_size_photo = readline("Choose [1-3] : ");
            }

            $how_many = readline("How Many : ");

            if ((int)$choose_size_photo == 1) {
                $totalPrice = 1000 * (int)$how_many;
                echo "Total Price Must Be Pay By Customer Is $totalPrice";
                $bussines->setOmzet($bussines->getOmzet() + $totalPrice);
                $customer->setTotalPay($totalPrice);
            }
            else if ((int)$choose_size_photo == 2) {
                $totalPrice = 2000 * (int)$how_many;
                echo "Total Price Must Be Pay By Customer Is " << $totalPrice;
                $bussines->setOmzet($bussines->getOmzet() + $totalPrice);
                $customer->setTotalPay($totalPrice);
            }
            else if ((int)$choose_size_photo == 3) {
                $totalPrice = 3000 * (int)$how_many;
                echo "Total Price Must Be Pay By Customer Is " << $totalPrice;
                $bussines->setOmzet($bussines->getOmzet() + $totalPrice);
                $customer->setTotalPay($totalPrice);
            }
            $customer->setKeperluan("Create Photo");
        }
    }
}


function chooseServiceWifi(Bussines $bussines, int $index_ruko, Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();

    for ($i = 0; $i < count($arrayBussines); $i++) {
        if ($arrayBussines[$i]->getName() == $arrayBussines[$index_ruko]->getName()) {
            echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
            echo "            List Wifi            ";
            echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
            echo "1. 3 hours            Rp 2000  \n";
            echo "2. 10 hours           Rp 5000  \n";
            echo "3. 24 hours           Rp 10000 \n";
            echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";

            $choose_wifi = readline("Choose [1-3]: ");

            while ((int)$choose_wifi > 3 || (int)$choose_wifi < 1) {
                echo "Input Invalid, Please Input Again!!!\n";
                $choose_wifi = readline("Choose [1-3]: ");
            }

            $customer->setKeperluan("Wifian");

            if ((int)$choose_wifi == 1) {
                chooseCodeWifi3Hours($bussines, $index_ruko, $customer);
                $bussines->setOmzet($bussines->getOmzet() + 2000);
                $customer->setTotalPay(2000);
            }
            else if ((int)$choose_wifi == 2) {
                chooseCodeWifi10hours($bussines, $index_ruko, $customer);
                $bussines->setOmzet($bussines->getOmzet() + 5000);
                $customer->setTotalPay(5000);
            }
            else {
                chooseCodeWifi24hours($bussines, $index_ruko, $customer);
                $bussines->setOmzet($bussines->getOmzet() + 10000);
                $customer->setTotalPay(10000);
            }
        }
    }
}

function chooseCodeWifi3Hours(Bussines $bussines, int $index_ruko, Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();

    for ($i = 0; $i < count($arrayBussines[$index_ruko]->getCodeWifi()); $i++) {
        $code_wifi = $arrayBussines[$index_ruko]->getCodeWifi()[$i]->getCodeWifi2k();
        echo "Code Wifi : $code_wifi";
        
        $code_wifies = readline("\nInput Code Above For Connect Wifi : ");

        while ($code_wifies !== $code_wifi) {
           echo "Code Is Wrong, Please Input Again";
           $code_wifies = "\nInput Code Above For Connect Wifi : ";
        }

        echo "Wifi Succes Connected\n";
        return;
    }
}

function chooseCodeWifi10Hours(Bussines $bussines, int $index_ruko, Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();

    for ($i = 0; $i < count($arrayBussines[$index_ruko]->getCodeWifi()); $i++) {
        $code_wifi = $arrayBussines[$index_ruko]->getCodeWifi()[$i]->getCodeWifi5k();
        echo "Code Wifi : $code_wifi";
        
        $code_wifies = readline("\nInput Code Above For Connect Wifi : ");

        while ($code_wifies != $code_wifi) {
           echo "Code Is Wrong, Please Input Again";
           $code_wifies = "\nInput Code Above For Connect Wifi : ";
        }

        echo "Wifi Succes Connected\n";
        return;
    }
}

function chooseCodeWifi24Hours(Bussines $bussines, int $index_ruko, Customer $customer) {
    $arrayBussines = $bussines->getInternetCafes();

    for ($i = 0; $i < count($arrayBussines[$index_ruko]->getCodeWifi()); $i++) {
        $code_wifi = $arrayBussines[$index_ruko]->getCodeWifi()[$i]->getCodeWifi10k();
        echo "Code Wifi : $code_wifi";
        
        $code_wifies = readline("\nInput Code Above For Connect Wifi : ");

        while ($code_wifies != $code_wifi) {
           echo "Code Is Wrong, Please Input Again";
           $code_wifies = "\nInput Code Above For Connect Wifi : ";
        }

        echo "Wifi Succes Connected\n";
        return;
    }
}


function addFood(Bussines $bussines, Food $foods) {
    $arrayBussines = $bussines->getInternetCafes();
    showRuko($bussines);
    $number_bussines = readline("Input Number Internet Cafes : ");

    for($i = 0 ; count($arrayBussines); $i++) {
        if ($arrayBussines[$i]->getName() == $arrayBussines[(int)$number_bussines - 1]->getName()) {
            $name_food = readline("\nInput Name Food : ");
            $foods->setName($name_food);

            $stok = readline("Input Stok      : ");
            $foods->setStok((int)$stok);

            $price = readline("Input Price     : ");
            $foods->setPrice((int)price);

            $arrayBussines[$i]->setFood($foods);
        }
    }
}

function showAboutInternetCafes() {
    echo "\n============= MENU =============\n";
    echo "1. Show All Ruko                  \n";
    echo "2. Show Employement               \n";
    echo "3. Show All Customer              \n";
    echo "4. Show All Food                  \n";
    echo "5. Show Salary Employement        \n";
    echo "6. Show Total Computer Available  \n";
    echo "7. Show Omzet                       ";
    echo "\n================================\n";
}
