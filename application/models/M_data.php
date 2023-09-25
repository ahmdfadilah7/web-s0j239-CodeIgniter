<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {


    #################################
    ####### LOGIN DATA WEB ##########

    public function cek_login($data,$where){
		return $this->db->get_where($data,$where);
    }
    
	public function insertLog($tabel,$data){
		return $this->db->insert($tabel,$data);
	}


    ######################################
    ####### All Function Master ##########

    public function insert($set,$tabel){
        $this->db->set($set);
        return $this->db->insert($tabel);
    }

    public function selectData($select,$tabel){
        $this->db->select($select);
        return $this->db->get($tabel);
    }

    // public function selectDataLimit($select,$tabel,$whereAsc,$order){
    //     $this->db->select($select);
    //     $this->db->order_by($whereAsc,$order);
    //     $this->db->limit(1);
    //     return $this->db->get($tabel);
    // }

    public function selectDataWhere($select,$tabel,$whereAsc = '',$id = '', $urutan = '', $order = 'DESC'){
        $this->db->select($select);
        if($whereAsc <> '')
            $this->db->where($whereAsc,$id);
        $this->db->order_by('id', $order);
        return $this->db->get($tabel);
    }

    // public function selectDataFilter($select,$tabel,$whereAsc = '',$id = '', $urutan = '', $order = 'ASC'){
    //     $this->db->select($select);
    //     if($whereAsc <> '')
    //         $this->db->like($whereAsc,$id);
    //     if($urutan <> '')
    //         $this->db->order_by($urutan,$order);
    //     return $this->db->get($tabel);
    // }

    // public function selectJoinData($select,$tabel1,$tabel2,$where1,$where2,$order='DESC')
    // {
    //     $this->db->select($select);
    //     $this->db->from($tabel1);
    //     $this->db->join($tabel2,'"'.$tabel2.'.'.$where2.'='.$tabel1.'.'.$where1);
    //     $this->db->order_by($tabel1.'.id',$order);
    //     return $this->db->get();
    // }

    // public function selectFilter($select,$tabel1,$tabel2,$where1,$where2,$where,$filter,$order='DESC')
    // {
    //     $this->db->select($select);
    //     $this->db->from($tabel1);
    //     $this->db->join($tabel2,'"'.$tabel2.'.'.$where2.'='.$tabel1.'.'.$where1);
    //     $this->db->like($where,$filter);
    //     $this->db->order_by($tabel1.'.id',$order);
    //     return $this->db->get();
    // }

    // public function selectPagination($id,$limit,$start){
    //     $this->db->select('*');
    //     $this->db->from('content');
    //     $this->db->where('nama_menu',$id);
    //     $this->db->limit($limit);
    //     $this->db->offset($start);
    //     return $this->db->get();
    // }

    // public function selectDataWherev3($select,$tabel,$whereAsc,$id, $where2, $id2, $urutan = '', $order = 'ASC'){
    //     $this->db->select($select);
    //     $this->db->where($whereAsc,$id);
    //     $this->db->where($where2,$id2);
    //     if($urutan <> '')
    //         $this->db->order_by($urutan,$order);
    //     return $this->db->get($tabel);
    // }   
    

    // public function selectMenu($select,$tabel)
    // {
    //     $this->db->select($select);
    //     $this->db->group_by('nama_menu');
    //     return $this->db->get($tabel);
    // }

    // public function selectDataWherev2($select,$tabel,$whereAsc, $urutan = '', $order = 'ASC'){
    //     $this->db->select($select);
    //     $this->db->where($whereAsc);
    //     if($urutan <> '')
    //         $this->db->order_by($urutan,$order);
    //     return $this->db->get($tabel);
    // }

    public function updateData($set,$tabel,$where,$id){
        $this->db->where($where,$id);
        return $this->db->update($tabel,$set);
    }
    
    public function delete($tabel,$where){
        return $this->db->delete($tabel,$where);
    }
}