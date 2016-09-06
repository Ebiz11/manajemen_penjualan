<?php

      class penjualan{

        public function __construct(){
          $this->dbh = new PDO('mysql:host=localhost; dbname=penjualan','root','');
        }

        public function tampil_barang(){
          $sql= "SELECT*FROM barang_demo2 ORDER BY id_barang";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function cari_penjualan($start, $end){
          $sql = "SELECT * FROM transaksi_demo2 WHERE tanggal BETWEEN '$start' AND '$end' ORDER BY id_transaksi";
          $query = $this->dbh->query($sql);
          return $query;
        }

        public function cari_pembelian($start, $end){
          $sql = "SELECT * FROM pembelian_demo2 WHERE tanggal BETWEEN '$start' AND '$end' ORDER BY id_pembelian";
          $query = $this->dbh->query($sql);
          return $query;
        }

        public function tampil_supplier(){
          $sql= "SELECT*FROM supplier_demo2 ORDER BY id_supplier";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function hitung(){
          $sql="SELECT SUM(sub_total) AS grand_total FROM keranjang_demo2";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function tampil_transaksi(){
          $sql= "SELECT*FROM transaksi_demo2 ORDER BY id_transaksi";
          $query=$this->dbh->query($sql);
          return $query;
        }


        public function tampil_pembelian(){
          $sql= "SELECT*FROM pembelian_demo2 ORDER BY id_pembelian";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function tampil_keranjang(){
          $sql= "SELECT*FROM keranjang_demo2 ORDER BY id_transaksi";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function detail_barang($id_barang){
          $sql= "SELECT*FROM barang_demo2 WHERE id_barang='$id_barang' ORDER BY id_barang";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function detail_penjualan($id_transaksi){
          $sql= "SELECT*FROM penjualan_demo2 WHERE id_transaksi='$id_transaksi' ORDER BY id_transaksi";
          $query=$this->dbh->query($sql);
          return $query;
        }
        public function pendapatan_laba($id_transaksi){
          $sql= "SELECT SUM(pendapatan) AS laba FROM penjualan_demo2 WHERE id_transaksi='$id_transaksi' ORDER BY id_transaksi";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function detail_barang_chart($nama_barang){
          $sql= "SELECT*FROM barang_demo2 WHERE nama_barang='$nama_barang' ORDER BY id_barang";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function chart(){
          $sql= "SELECT nama_barang, jumlah, SUM(jumlah) AS stok_total FROM penjualan_demo2 GROUP BY nama_barang";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function add_supplier($nama_supplier, $kode_langganan, $alamat, $no_telp){
          $sql= "INSERT INTO supplier_demo2 (nama_supplier, kode_langganan, alamat, no_telp) VALUES('$nama_supplier', '$kode_langganan', '$alamat', '$no_telp')";
          $query= $this->dbh->query($sql);
          if (!$query){
          return "Failed";
          }else{
          return "Success";
          }
          }

        public function del_barang($id_barang){
          $sql = "DELETE FROM barang_demo2 WHERE id_barang='$id_barang'";
          $query = $this->dbh->query($sql);
        }

        public function del_keranjang(){
          $sql = "DELETE FROM keranjang_demo2";
          $query = $this->dbh->query($sql);
        }

        public function del_keranjang_id($id_barang){
          $sql = "DELETE FROM keranjang_demo2 WHERE id_barang='$id_barang'";
          $query = $this->dbh->query($sql);
        }

        public function del_supplier($id_supplier){
          $sql = "DELETE FROM supplier_demo2 WHERE id_supplier='$id_supplier' ";
          $query = $this->dbh->query($sql);
        }

        public function detail_supplier($id_supplier){
          $sql= "SELECT*FROM supplier_demo2 WHERE id_supplier='$id_supplier' ORDER BY id_supplier";
          $query=$this->dbh->query($sql);
          return $query;
        }

        public function update_suplier($id_supplier, $nama_supplier, $kode_langganan, $alamat, $no_telp){
          $stmt= $this->dbh->prepare("UPDATE supplier_demo2 SET nama_supplier=:nama_supplier, kode_langganan=:kode_langganan, alamat=:alamat, no_telp=:no_telp WHERE id_supplier=:id_supplier ");
          $stmt->bindparam(":id_supplier",$id_supplier);
          $stmt->bindparam(":nama_supplier",$nama_supplier);
          $stmt->bindparam(":kode_langganan",$kode_langganan);
          $stmt->bindparam(":alamat",$alamat);
          $stmt->bindparam(":no_telp",$no_telp);
          $stmt->execute();
          return true;
          }

        public function add_pembelian($nama_barang, $id_barang, $id_supplier, $stok, $harga_beli){
          $stmt = $this->dbh->prepare("INSERT INTO pembelian_demo2 (nama_barang, id_barang, id_supplier, stok, harga_beli) VALUES(:nama_barang, :id_barang, :id_supplier, :stok, :harga_beli)");
          $stmt->bindparam(":nama_barang",$nama_barang);
          $stmt->bindparam(":id_barang",$id_barang);
          $stmt->bindparam(":id_supplier",$id_supplier);
          $stmt->bindparam(":stok",$stok);
          $stmt->bindparam(":harga_beli",$harga_beli);
          $stmt->execute();
        }

        public function add_barang($nama_barang, $id_supplier, $stok, $harga_beli, $harga_jual){
          $stmt = $this->dbh->prepare("INSERT INTO barang_demo2 (nama_barang, id_supplier, stok, harga_beli, harga_jual) VALUES (:nama_barang, :id_supplier, :stok, :harga_beli, :harga_jual)");
          $stmt->bindparam(":nama_barang",$nama_barang);
          $stmt->bindparam(":id_supplier",$id_supplier);
          $stmt->bindparam(":stok",$stok);
          $stmt->bindparam(":harga_beli",$harga_beli);
          $stmt->bindparam(":harga_jual",$harga_jual);
          $stmt->execute();
        }

      public function add_keranjang($id_barang, $jumlah, $nama_barang, $harga_jual, $sub_total, $harga_beli){
        $stmt = $this->dbh->prepare("INSERT INTO keranjang_demo2 (id_barang, jumlah, nama_barang, harga_jual, sub_total, harga_beli) VALUES(:id_barang,:jumlah,:nama_barang,:harga_jual,:sub_total, :harga_beli)");
        $stmt->bindparam(":id_barang",$id_barang);
        $stmt->bindparam(":jumlah",$jumlah);
        $stmt->bindparam(":nama_barang",$nama_barang);
        $stmt->bindparam(":harga_jual",$harga_jual);
        $stmt->bindparam(":sub_total",$sub_total);
        $stmt->bindparam(":harga_beli",$harga_beli);
        $stmt->execute();
      }

      public function add_transaksi($total_harga){
        $stmt = $this->dbh->prepare("INSERT INTO transaksi_demo2 (total_harga) VALUES(:total_harga)");
        $stmt->bindparam(":total_harga",$total_harga);
        $stmt->execute();
      }

      public function add_penjualan($id_barang,$id_transaksi, $nama_barang, $jumlah, $sub_total, $pendapatan){
        $stmt = $this->dbh->prepare("INSERT INTO penjualan_demo2 (id_barang, id_transaksi, nama_barang, jumlah, sub_total, pendapatan) VALUES(:id_barang, :id_transaksi,:nama_barang, :jumlah,:sub_total, :pendapatan)");
        $stmt->bindparam(":id_barang",$id_barang);
        $stmt->bindparam(":id_transaksi",$id_transaksi);
        $stmt->bindparam(":nama_barang",$nama_barang);
        $stmt->bindparam(":jumlah",$jumlah);
        $stmt->bindparam(":sub_total",$sub_total);
        $stmt->bindparam(":pendapatan",$pendapatan);
        $stmt->execute();
      }

      }
 ?>
