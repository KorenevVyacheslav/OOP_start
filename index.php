
<?php
 
interface machine_interface {
                                         // обязательные методы в дочерних классах
    public function move_forward ();     // вперед
    public function move_back();         // назад
    public function beep();              // сигнал
    public function wipers_on();         // дворники
}

abstract class machine implements machine_interface {       
    public string $brand;
    public int $max_weight;
    public function speciality () { echo 'any';}        // метод будет переопределён в наследнике  
}

abstract class automobile extends machine {       
    public bool $interior_trim;                         // отделка салона - только для авто
}

class auto_bmw extends automobile {
    public string $brand = 'BMW';
    public int $max_weight = 2000;
    public bool $interior_trim = true;

    public function move_forward () { return ('move forward '. $this::class); }
    public function move_back ()    { return ('move back '. $this::class) ; }
    public function beep()          { return ('beep '. $this::class); }                        
    public function wipers_on()     { return ('wipers_on '. $this::class); }    
    
    public function speciality()    { return ('nitrous_oxide '. $this::class); }    //унаследовано от класса machine
}

abstract class excavator extends machine {       
    public bool $backet;                        // ковш - только для экскаватора  
}

class excavator_Kobelco extends excavator {
    public string $brand = 'Kobelco';
    public int $max_weight = 10000;
    public bool $backet = true;

    public function move_forward () { return ('move forward '. $this::class); }
    public function move_back ()    { return ('move back '. $this::class) ; }
    public function beep()          { return ('beep '. $this::class); }                        
    public function wipers_on()     { return ('wipers_on '. $this::class); }

    public function speciality()    { return ('control_bucket '. $this::class); }    //унаследовано от класса machine
}

abstract class tank extends machine {       
    public bool $gun;                                   // пушка - только для танка
}

class tank_UVZ extends tank {
    public string $brand = 'UVZ';
    public int $max_weight = 50000;
    public bool $gun = true;

    public function move_forward () { return ('move forward '. $this::class); }
    public function move_back ()    { return ('move back '. $this::class) ; }
    public function beep()          { return ('beep '. $this::class); }                         
    public function wipers_on()     { return ('wipers_on '. $this::class); }  
    
    public function speciality()    { return ('fire '. $this::class);  }               //унаследовано от класса machine
}

$car = new auto_bmw ();
$excavat = new excavator_Kobelco();
$t_90 = new tank_UVZ();

function make_forward_and_use_speciality (machine $x) {
          echo nl2br ($x->move_forward ()."\n") ;
          echo nl2br ($x->speciality ()."\n") ;
}

make_forward_and_use_speciality ($car);
make_forward_and_use_speciality ($excavat);
make_forward_and_use_speciality ($t_90);

echo nl2br ($car->beep ()."\n") ;           //способность сигналить и включать дворники
echo nl2br ($t_90->wipers_on()."\n") ;
