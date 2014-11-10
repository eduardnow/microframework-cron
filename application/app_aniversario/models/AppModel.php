<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\app_aniversario\models;

/**
 * Description of AppModel
 *
 * @author ecastro
 */
class AppModel {

    //put your code here

    static function queryListAniversario() {
        $query = "SELECT a.cedula, a.primer_nombre, a.primer_apellido, date_part('day',c.fecha_ingreso) as dia, 
	date_part('month',c.fecha_ingreso) as mes, date_part('year',c.fecha_ingreso) as anio, 
	b.nombre as dependencia, EXTRACT(YEAR FROM age(timestamp 'now()',date(c.fecha_ingreso) ) ) as dif_anios
	FROM personal a, trabajador c, dependencia b 
	WHERE b.id_dependencia = c.id_dependencia
		AND a.id_personal = c.id_personal 
		AND c.estatus = 'A' 
		AND date_part('day',c.fecha_ingreso) = ?
		AND date_part('month',c.fecha_ingreso) = ?
	ORDER BY dependencia DESC";
        return $query;
    }

    static function queryListEmail() {
        $query = "SELECT pfl.cedula, usr.username FROM usuarios.user as usr, usuarios.perfil as pfl WHERE usr.id = pfl.user_id";
        return $query;
    }

}
