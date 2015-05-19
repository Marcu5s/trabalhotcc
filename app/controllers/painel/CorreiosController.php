<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 *
 *
 */

namespace app\controllers\painel;


class CorreiosController extends  \core\app\Controller {


    public function actionCep(){


        $cep = filter_input(INPUT_POST,'cep');

        if(empty($cep))
            $this->Json([
                'message' => 'Faltando valor no campo Cep',
            ]);

        $postCorreios = "CEP={$cep}&Metodo=listaLogradouro&TipoConsulta=cep";

        $cUrl = curl_init('http://www.buscacep.correios.com.br/servicos/dnec/consultaLogradouroAction.do');

        curl_setopt($cUrl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($cUrl,CURLOPT_HEADER,0);
        curl_setopt($cUrl,CURLOPT_POSTFIELDS,$postCorreios);

        $saida = curl_exec($cUrl);

        curl_close($cUrl);

        $saida = utf8_encode($saida);

        preg_match_all('@<td.*>(.*)<\/td>@i',$saida,$campoTd);

        $this->Json($campoTd[1]);

    }

}