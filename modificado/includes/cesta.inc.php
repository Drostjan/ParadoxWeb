<?php session_start();
class Cart {
    protected $cesta = array();
    
    public function __construct(){
        $this->cesta = !empty($_SESSION['cesta'])?$_SESSION['cesta']:NULL;
        if ($this->cesta === NULL){
            $this->cesta = array('total' => 0, 'items' => 0);
        }
    }

    public function contents(){
        $cart = array_reverse($this->cesta);

        unset($cart['items']);
        unset($cart['total']);

        return $cart;
    }
    
    public function get_item($row_id){
        return (in_array($row_id, array('items', 'total'), TRUE) OR ! isset($this->cesta[$row_id]))
            ? FALSE
            : $this->cesta[$row_id];
    }
    
    public function total_items(){
        return $this->cesta['items'];
    }
    
    public function total(){
        return $this->cesta['total'];
    }
    
    public function insert($item = array()){
        if(!is_array($item) OR count($item) === 0){
            return FALSE;
        }else{
            if(!isset($item['id'], $item['nombre'], $item['precio'], $item['qty'])){
                return FALSE;
            }else{
                $item['qty'] = (float) $item['qty'];
                if($item['qty'] == 0){
                    return FALSE;
                }
                $item['precio'] = (float) $item['precio'];
                $rowid = md5($item['id']);
                $old_qty = isset($this->cesta[$rowid]['qty']) ? (int) $this->cesta[$rowid]['qty'] : 0;
                $item['rowid'] = $rowid;
                $item['qty'] += $old_qty;
                $this->cesta[$rowid] = $item;
                
                if($this->save()){
                    return isset($rowid) ? $rowid : TRUE;
                }else{
                    return FALSE;
                }
            }
        }
    }
    
    public function update($item = array()){
        if (!is_array($item) OR count($item) === 0){
            return FALSE;
        }else{
            if (!isset($item['rowid'], $this->cesta[$item['rowid']])){
                return FALSE;
            }else{
                if(isset($item['qty'])){
                    $item['qty'] = (float) $item['qty'];
                    if ($item['qty'] == 0){
                        unset($this->cesta[$item['rowid']]);
                        return TRUE;
                    }
                }
                $keys = array_intersect(array_keys($this->cesta[$item['rowid']]), array_keys($item));
                if(isset($item['precio'])){
                    $item['precio'] = (float) $item['precio'];
                }
                foreach(array_diff($keys, array('id', 'nombre')) as $key){
                    $this->cesta[$item['rowid']][$key] = $item[$key];
                }
                $this->save();
                return TRUE;
            }
        }
    }

    protected function save(){
        $this->cesta['items'] = $this->cesta['total'] = 0;
        foreach ($this->cesta as $key => $val){
            if(!is_array($val) OR !isset($val['precio'], $val['qty'])){
                continue;
            }
            $this->cesta['total'] += ($val['precio'] * $val['qty']);
            $this->cesta['items'] += $val['qty'];
            $this->cesta[$key]['subtotal'] = ($this->cesta[$key]['price'] * $this->cesta[$key]['qty']);
        }
        if(count($this->cesta) <= 2){
            unset($_SESSION['cesta']);
            return FALSE;
        }else{
            $_SESSION['cesta'] = $this->cesta;
            return TRUE;
        }
    }
    
     public function remove($row_id){
        unset($this->cesta[$row_id]);
        $this->save();
        return TRUE;
     }
     
    public function destroy(){
        $this->cesta = array('total' => 0, 'items' => 0);
        unset($_SESSION['cesta']);
    }
}