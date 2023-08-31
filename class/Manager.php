<?php
require "./crud/Crud.php";
require "./class/Stamp.php";
require "./class/User.php";

class Manager {
    private $stampReq = [ 
        "table" => "stamp",
        "tablesMerge" => [
            "aspect",
            "category"
        ],
        "targets" => [
            "stamp.id",
            "stamp.name as name",
            "stamp.year",
            "stamp.origin",
            "stamp.description",
            "aspect.name as aspect", 
            "category.name as category"
        ]
    ];

    public function getStamps() {
        $crud = new Crud("stamp");
        $stamps = $crud->readStd($this->stampReq["table"], $this->stampReq["targets"], $this->stampReq["tablesMerge"]);
        foreach ($stamps as $stamp) $objStamps[] = new Stamp($stamp);
        return $objStamps;
    }

    public function getStampNames() {
        $crud = new Crud("stamp");
        return $crud->readStd($this->stampReq["table"], ["stamp.name", "stamp.id"]);
    }

    public function getObjStamp($id) {
        $where = [
            "target" => "stamp.id",
            "value" => $id
        ];
        $crud = new Crud("stamp");
        $stamps = $crud->readStd($this->stampReq["table"], $this->stampReq["targets"], $this->stampReq["tablesMerge"], $where);
        foreach ($stamps as $stamp) $objStamp = new Stamp($stamp);
        return $objStamp;
    }

    public function getUserNames() {
        $crud = new Crud("stamp");
        return $crud->readStd("user", ["user.name", "user.id"]);
    }

    public function getUsers() {
        $objUsers = [];
        $objStamps = [];
        $crud = new Crud("stamp");
        $users = $crud->readStd("user");
        foreach ($users as $user) {
            $userId = $user["id"];
            $stamps = [];
            $userStamps = $crud->readUserStamp(["target" => "user.id", "value" => $userId]);
            foreach ($userStamps as $userStamp) $objStamps[] = new Stamp($userStamp);
            $objUsers[] = new User($user, $objStamps);
        }
        return $objUsers;
    }

    public function getCategories() {
        $crud = new Crud("stamp");
        return $crud->readStd("category");
    }

    public function getAspects() {
        $crud = new Crud("stamp");
        return $crud->readStd("aspect");
    }

    public function createUser($data) {
        $crud = new Crud("stamp");
        $users = $crud->create("user", $data);
    }

    public function createStamp($data) {
        $crud = new Crud("stamp");
        $users = $crud->create("stamp", $data);
    }
}