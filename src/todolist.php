<?php

/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 4/23/16
 * Time: 5:59 PM
 */
class todolist
{
    public function __construct()
    {
        session_start();
    }

    public function initial(){
        $_SESSION['list'] = [
            ['state' => False, 'name' => 'Eating'],
            ['state' => False, 'name' => 'Write an essay'],
            ['state' => False, 'name' => 'Programming']
        ];
    }

    public function get_list(){
        return $_SESSION['list'];
    }

    public function add_item($item_name){
        $_SESSION['list'][] = [
            'state' => False,
            'name' => $item_name
        ];
    }

    public function remove_item($item_name){
        foreach ($_SESSION['list'] as $i => $item) {
            if($item['name'] === $item_name){
                unset($_SESSION['list'][$i]);
                return;
            }
        }
    }

    public function reverse_state($item_name){
        foreach ($_SESSION['list'] as $i => $item){
            if($item['name'] === $item_name){
                if($item['state']){
                    $_SESSION['list'][$i]['state'] = False;
                } else {
                    $_SESSION['list'][$i]['state'] = True;
                }
                return;
            }
        }
    }

    public function find_state($item_name){
        foreach($_SESSION['list'] as $item){
            if($item['name'] === $item_name){
                return $item['state'];
            }
        }
        return -1;
    }

    public function false_all_items(){
        foreach($_SESSION['list'] as $i =>$item){
            $_SESSION['list']['i']['state'] = False;
        }
    }

    public function edit_name($org_name, $new_name){
        foreach($_SESSION['list'] as $i => $item){
            if($item['name'] === $org_name){
                $_SESSION['list'][$i]['name'] = $new_name;
                return;
            }
        }
    }
}