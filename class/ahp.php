<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ahp
 *
 * @author ozgur.kuru
 */
class ahp {

    private $db;

    function __construct() {
        global $db;
        $this->db = $db;
    }

    function newSubject($input_data) {
        foreach ($input_data as $key => $val) {
            $data[$key] = removeXSS($val);
        }

        $this->db->table('subject');
        $result = $this->db->insert($data);
        if ($result) {
            $return['state'] = true;
            $return['data'] = $result;
            $return['message'] = 'Başarılı';
        } else {
            $return['state'] = false;
            $return['data'] = $result;
            $return['message'] = 'Başarısız';
        }
        return $return;
    }

    function newCriteria($input_data) {
        foreach ($input_data as $key => $val) {
            $data[$key] = removeXSS($val);
        }
        $this->db->table('criteria');
        $result = $this->db->insert($data);
        if ($result) {
            $return['state'] = true;
            $return['data'] = $result;
            $return['message'] = 'Başarılı';
        } else {
            $return['state'] = false;
            $return['data'] = $result;
            $return['message'] = 'Başarısız';
        }
        return $return;
    }

    function newAlternative($input_data) {
        foreach ($input_data as $key => $val) {
            $data[$key] = removeXSS($val);
        }
        $this->db->table('alternatives');
        $result = $this->db->insert($data);
        if ($result) {
            $return['state'] = true;
            $return['data'] = $result;
            $return['message'] = 'Başarılı';
        } else {
            $return['state'] = false;
            $return['data'] = $result;
            $return['message'] = 'Başarısız';
        }
        return $return;
    }

    function getAlternatives($subject_id) {
        $sql = "select * from alternatives where subject_id=" . $subject_id;
        $this->db->run($sql);
        while ($a = $this->db->result()) {
            $data[] = $a;
        }
        return $data;
    }

    function getCriteriaInfo($id) {
        $sql = "select * from criteria where id=" . $id;
        $this->db->run($sql);
        return $this->db->result();
    }

    function getCriteria($subject_id) {
        $sql = "select * from criteria where subject_id=" . $subject_id;
        $this->db->run($sql);
        while ($a = $this->db->result()) {
            $data[] = $a;
        }
        return $data;
    }

    function sampling($chars, $size, $combinations = array()) {

        # if it's the first iteration, the first set 
        # of combinations is the same as the set of characters
        if (empty($combinations)) {
            $combinations = $chars;
        }

        # we're done if we're at size 1
        if ($size == 1) {
            return $combinations;
        }

        # initialise array to put new values in
        $new_combinations = array();

        # loop through existing combinations and character set to create strings

        foreach ($combinations as $combination) {

            foreach ($chars as $char) {
                $new_combinations[] = $combination['id'] . '-' . $char['id'];
            }
        }

        # call same function again for the next iteration
        return self::sampling($chars, $size - 1, $new_combinations);
    }

    function insertCriterValue($data) {
        foreach($data as $key=>$val){
            $input[$key]=  removeXSS($val);
        }
        $this->db->table('kriter_deger');
        return $this->db->insert($input);
    }

}
