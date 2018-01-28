<?php
class Reservation
{
    private $destination;
    private $number_places;
    private $firstname;
    private $lastname;
    private $age;
    private $page;
    private $error;
    private $checkbox;
    private $price;
    private $update;

    public function __construct($destination = '', $number_places = '')
    {
        $this->destination = $destination;
        $this->number_places = $number_places;
        $this->firstname = [];
        $this->lastname = [];
        $this->age = [];
        $this->page = True;
        $this->error = False;
        $this->checkbox = False;
        $this->price = 0;
        $this->update = False;
    }

    // Getters and Setters
    public function getDestination()
    {
        return $this->destination;
    }

    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    public function getPlace()
    {
        return $this->number_places;
    }

    public function setPlace($places)
    {
        $this->number_places = $places;
    }

    public function getFirstName()
    {
        while (count($this->firstname) < $this->number_places)
        {
            array_push($this->firstname, '');
        }
        return $this->firstname;
    }

    public function setFirstName($firstnames)
    {
        $this->firstname = $firstnames;
    }

    public function getLastName()
    {
        while (count($this->lastname) < $this->number_places)
        {
            array_push($this->lastname, '');
        }
        return $this->lastname;
    }

    public function setLastName($lastnames)
    {
        $this->lastname = $lastnames;
    }

    public function getAge()
    {
        while (count($this->age) < $this->number_places)
        {
            array_push($this->age, '');
        }
        return $this->age;
    }

    public function setAge($ages)
    {
        $this->age = $ages;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function getCheckBox()
    {
        return $this->checkbox;
    }

    public function setCheckBox($checkbox)
    {
        $this->checkbox = $checkbox;
    }

    public function getStateUpdate()
    {
        return $this->update;
    }

    public function setStateUpdate($update)
    {
        $this->update = $update;
    }

    public function getPrice()
    {
        $price = 0;
        foreach ($this->age as $age) {
            if (is_numeric($age) && $age < 13)
                $price += 10;

            elseif (is_numeric($age) && $age > 12)
                $price += 15;
        }
        if ($this->checkbox == True)
            return $price + 20;

        else
            return $price;
    }

    public function setPrice($price)
    {
        return $this->price;
    }

    public function getIdUpdate()
    {
        return $this->idUpdate;
    }

    public function setIdUpdate($idUpdate)
    {
        $this->idUpdate=$idUpdate;
    }

    // Erros Manager
    public function getError()
    {
        return $this->error;
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function getDestinationError($destination)
    {
        if (!is_numeric($destination) && $destination != '')
            return False;
        return True;
    }

    public function getPlaceError($places)
    {
        if ((int)$places <= 10 && is_numeric($places) && (int)$places > 0 && $places != '')
            return False;
        return True;
    }

    public function getNameError($names)
    {
        if(empty($names))
            return True;

        for($i=0; $i<count($names); $i++)
        {
            if(is_numeric($names[$i]) || $names[$i]=="")
            {
                return True;
            }
        }
        return False;
    }

    public function getAgeError($ages)
    {
        if(empty($ages))
            return True;

        for($i=0; $i<count($ages); $i++)
        {
            if((int)($ages[$i])<=0 || (int)($ages[$i])>100)
            {
                return True;
            }
        }
        return False;
    }

    public function getAge18Error($ages)
    {
        if(!empty($ages)){
            $pass = 0;
            for($i=0; $i<count($ages); $i++)
            {
                if ((int)($ages[$i]) >= 18)
                {
                    $pass += 1 ;
                }
            }
            return $pass;
        }
    }
}
?>
