    <?php defined('BASEPATH') or exit('No direct script access allowed');

    class M_retur extends CI_Model
    {
        //SERVER SIDE
        var $table = 'tb_atk_rusak'; //nama tabel dari database
        var $column_order = array(null, 'user_nama', 'nm_barang', 'kd_inputatk', 'harga', 'kat_barang', 'qty_rusak', 'alasan', 'tgl_retur'); //field yang ada di table user
        var $column_search = array('user_nama', 'nm_barang', 'alasan', 'no_ambilatk', 'tgl_retur'); //field yang diizin untuk pencarian 
        var $order = array('id_atk' => 'desc'); // default order 

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        private function _get_datatables_query()
        {

            $this->db->from($this->table);

            $i = 0;

            foreach ($this->column_search as $item) // looping awal
            {
                if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
                {

                    if ($i === 0) // looping awal
                    {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if (count($this->column_search) - 1 == $i)
                        $this->db->group_end();
                }
                $i++;
            }

            if (isset($_POST['order'])) {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else if (isset($this->order)) {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }

        function get_datatables()
        {
            $this->_get_datatables_query();
            if ($_POST['length'] != -1)
                $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }

        function count_filtered()
        {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function count_all()
        {
            $this->db->from($this->table);
            return $this->db->count_all_results();
        }
        //END SERVER SIDE

        public function insertRetur($retur)
        {
            $this->db->insert('tb_atk_rusak', $retur);
        }

        public function inputRetur($gantiatk)
        {
            $this->db->insert('tb_detail_ambilatk', $gantiatk);
        }

        public function showAll()
        {
            $this->db->select('*');
            $this->db->from('tb_ambil_atk');
            $this->db->order_by('id_detail_ambilatk', 'DESC');
            $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
            return $this->db->get()->result_array();
        }
        public function joinTable($no_ambilatk)
        {
            $this->db->select('*');
            $this->db->from('tb_ambil_atk');
            $this->db->order_by('id_detail_ambilatk', 'DESC');
            $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
            $this->db->where('tb_detail_ambilatk.no_ambilatk', $no_ambilatk);
            return $this->db->get()->result_array();
        }

        public function gantiAtk($id)
        {
            $this->db->select('*');
            $this->db->from('tb_ambil_atk');
            $this->db->order_by('id_detail_ambilatk', 'DESC');
            $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
            $this->db->where('id_detail_ambilatk', $id);
            return $this->db->get()->result_array();
        }

        public function returFinish($id)
        {
            return $this->db->update('tb_detail_ambilatk', ['status' => 1], ['id_detail_ambilatk' => $id]);
        }

        public function updateRetur($retur, $id)
        {
            $this->db->update('tb_atk_rusak', $retur, ['id_atk' => $id]);
        }
    }
