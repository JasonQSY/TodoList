<?php

/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 4/23/16
 * Time: 5:59 PM
 */
class TodoList
{
    protected $list = [];
    protected $username;
    protected $password;

    public function __construct()
    {
        session_start();
        $username = $_SESSION['username'];
        if( !file_exists('../data/'.$username.'.csv')){
            header("Location: login.php");
        }
        $info = file_get_contents('../data/'.$username.'.csv');
        $lines = explode(PHP_EOL, $info);
        foreach ($lines as $i => $line){
            /* first line about username and password */
            $words = explode(',', $line);
            if( $i === 0 ){
                $this->username = $words[0];
                $this->password = $words[1];
                continue;
            }
            /* other lines for the contents */
            if( empty($words[0]) || empty($words[1]) ){
                continue;
            }
            if( $words[0] === 'incomplete' ) {
                $this->list[] = [
                    'state' => FALSE,
                    'name' => $words[1]
                ];
            } else {
                $this->list[] = [
                    'state' => TRUE,
                    'name' => $words[1]
                ];
            }
        }
    }

    public function save_list(){
        $content = $this->username.','.$this->password.PHP_EOL;
        foreach($this->list as $item){
            if( $item['state'] ){
                $line = 'complete';
            } else {
                $line = 'incomplete';
            }
            $line .= ','.$item['name'].PHP_EOL;
            $content .= $line;
        }
        file_put_contents('../data/'.$this->username.'.csv', $content);
    }

    public function get_list(){
        return $this->list;
    }

    public function add_item($item_name){
        $this->list[] = [
            'state' => FALSE,
            'name' => $item_name
        ];
    }

    public function remove_item($item_name){
        foreach ($this->list as $i => $item) {
            if($item['name'] === $item_name){
                unset($this->list[$i]);
                return;
            }
        }
    }

    public function reverse_state($item_name){
        foreach ($this->list as $i => $item){
            if($item['name'] === $item_name){
                if($item['state']){
                    $this->list[$i]['state'] = FALSE;
                } else {
                    $this->list[$i]['state'] = TRUE;
                }
                return;
            }
        }
    }

    public function find_state($item_name){
        foreach($this->list as $item){
            if($item['name'] === $item_name){
                return $item['state'];
            }
        }
        return -1;
    }

    public function false_all_items(){
        foreach($this->list as $i =>$item){
            $this->list['i']['state'] = FALSE;
        }
    }

    public function edit_name($org_name, $new_name){
        foreach($this->list as $i => $item){
            if($item['name'] === $org_name){
                $this->list[$i]['name'] = $new_name;
                return;
            }
        }
    }
}
