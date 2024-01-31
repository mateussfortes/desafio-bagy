<?php 

namespace App\Helpers;

class ManipularArray {

    public function dobrarNumeros($arrayNumeros) {

        if(is_array($arrayNumeros)) {

            foreach($arrayNumeros as $key => $elemento ) {

                ///essa forma de validar pode ser melhorada
                if(is_numeric($elemento)) {
                    $arrayNumeros[$key] = $elemento * 2;
                }

            }

            return $arrayNumeros;

        }
        
    }

    public function converterParaAssociativa($collection) {
        $arrayAssociativa = [];
        foreach ($collection as $item) {
            $arrayAssociativa[] = [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email
            ];
        }
        return $arrayAssociativa;
    }

}