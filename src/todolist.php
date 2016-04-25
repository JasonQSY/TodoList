<?php

/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 4/23/16
 * Time: 5:59 PM
 */
class TodoList
{
    //$file = 'data.csv';

    public function __construct()
    {
        session_start();
    }

    public function initial(){
        $_SESSION['list'] = [
            ['state' => FALSE, 'name' => 'Eating'],
            ['state' => FALSE, 'name' => 'Write an essay'],
            ['state' => FALSE, 'name' => 'Programming']
        ];
    }

    public function get_list(){
        return $_SESSION['list'];
    }

    public function add_item($item_name){
        $_SESSION['list'][] = [
            'state' => FALSE,
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
                    $_SESSION['list'][$i]['state'] = FALSE;
                } else {
                    $_SESSION['list'][$i]['state'] = TRUE;
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
            $_SESSION['list']['i']['state'] = FALSE;
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
