<?php 

class Modelo_pdf extends CI_model {
    

    public function get_data($fecha1, $fecha2)
    {

        $r = Array();
        $sql = "SELECT COUNT(t1.horario_id) as cuenta,t1.horario_id,(SELECT CONCAT(t3.P_nombre, ' ',t3.P_apellido) FROM personal t3 WHERE t2.C_I = t3.C_I) as P_nombre,t2.C_I FROM personal_lleva_horario t1 INNER JOIN horario t2 INNER JOIN asistencia t3 WHERE t1.horario_id = t2.horario_id AND t1.Cod_hor_asist = t3.Cod_hor_asist AND t3.Fecha BETWEEN '$fecha1 00:00:00' AND '$fecha2 23:59:59' GROUP BY t1.horario_id";
        $res = $this->db->query($sql);
        $sql = "SELECT COUNT(t1.horario_id) as cuenta,t1.horario_id,(SELECT t3.P_nombre FROM personal t3 WHERE t2.C_I = t3.C_I) as P_nombre,t2.C_I FROM personal_cumple_inasistencia t1 INNER JOIN horario t2 INNER JOIN inasistencia t3 WHERE t1.horario_id = t2.horario_id AND t1.Cod_inasist = t3.Cod_inasist AND t3.fecha_inasist BETWEEN '$fecha1 00:00:00' AND '$fecha2 23:59:59' GROUP BY t1.horario_id";
        $res1 = $this->db->query($sql);

        foreach ($res->result() as $key => $value) {
            if($res->result_id->num_rows!=0){
                if($res1->result_id->num_rows!=0){
                    foreach ($res1->result() as $k => $v){
                        if($value->C_I==$v->C_I){
                            $r['asistencia']=$value->cuenta;
                            $r['inasistencia']=$v->cuenta;
                            $r['nombre']=$value->P_nombre;
                            $r['C_I']=$value->C_I;
                        }else{
                            $r['asistencia']=$value->cuenta;
                            $r['inasistencia']=0;
                            $r['nombre']=$value->P_nombre;
                            $r['C_I']=$value->C_I;
                        }
                    }
                }else{
                    $r['asistencia']=$value->cuenta;
                    $r['inasistencia']=0;
                    $r['nombre']=$value->P_nombre;
                    $r['C_I']=$value->C_I;
                }
            }else{
                foreach ($res1->result() as $k => $v){
                        $r['asistencia']=0;
                        $r['inasistencia']=$v->cuenta;
                        $r['nombre']=$v->P_nombre;
                        $r['C_I']=$v->C_I;
                    
                }
            }
        }

        return $r;
    }
}

?>