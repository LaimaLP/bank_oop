<?php

namespace App\DB;

use Exception;


class FileBase implements DataBase
{
    private $indexFile, $file, $data, $index, $save = true;

    public function __construct($name)
    {
        $this->file = ROOT . 'data/' . $name . '.json';
        $this->indexFile = ROOT . 'data/' . $name . '-index.json';
        //sitas ifas ivyksta jei kazka naujo padarom
        if (!file_exists($this->file)) { //tikrinam ar failas egsituoja. tik pirma karta tikrinama
            file_put_contents($this->file, json_encode([])); //jei nera, sukuria tuscius
            file_put_contents($this->indexFile, json_encode(1)); //pradinis indeksas yra vienas.
        } // kai failai sugeneruoti, toliau vyksta nuskaitymas
        $this->data = json_decode(file_get_contents($this->file)); //nuskaitomas masyvas
        $this->index = json_decode(file_get_contents($this->indexFile));// nuskaitomas indexas
    }

    public function __destruct()
    {
        if ($this->save) {
            //paima is data ir index duomenis ir iraso juos i failus. Kad jis nepasileistu darant show ir show all uzdedam flaga savinimo.
            file_put_contents($this->file, json_encode($this->data));
            file_put_contents($this->indexFile, json_encode($this->index));
        }
    }   

    public function create(object $data) : int //situos data gaunam is creat.php
    {
        $this->save = true;
        
        $id = $this->index; //pasiima indexa
        $this->index++; //paruosia sekanti indexa
        $data->id = $id; //i data idedam idx
        $this->data[] = $data; //ir viska ipaiso i duomenis
        return $id; //grazina naujai sukurto id, jo nenaudojam, bet gaunam, OK.
    }

    public function update(int $id, object $userData) : bool
    {
        $this->save = true;
        
        foreach ($this->data as $key => $value) {
            if ($value->id === $id) {

                $this->data[$key] = $userData;
                return true;
            }
        }
        return false;
    }

    public function delete(int $id) : bool
    {
        $this->save = true;
        foreach ($this->data as $key => $value) {
            if ($value->id == $id) {
                unset($this->data[$key]);//po istrynimo atsiranda skyle, po json iraso kaip masyva, su skyle negali buti, todel pries tai dar array_values padarom
                $this->data = array_values($this->data); //sugrazina i teisingas eiles.
                return true;
            }
        }
        return false;
    }

    public function show(int $id) : object 
    {
       
        $this->save = false; //jei tik show, savint nreikia, pazymim kad false
        foreach ($this->data as $key => $value) {
            if ($value->id == $id) {
                return $value;
            }
        }
        throw new Exception("No user found with this $id ID. ");
    
    }
    
    public function showAll() : array
    {
        $this->save = false;
        return $this->data; //grazina pries tai konstruktoriuje nuskaitytus duomenis, visa masyva
    }
}