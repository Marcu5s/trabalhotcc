<?php

/**
 * @copyright (c) KandaFramework 2014
 * @access public
 *
 *
 * @GridView Criação de tables dinâmicas
 *
 */

namespace core\widgets;

use core\app\Controller;
use core\helps\Url;

class GridView extends Controller {

    /**
     * @access public
     *
     * @static
     *
     * @description Gerar table dinâmicamente.
     * Conforme os parametros do SQL
     *
     *
     * @param arary $dataProvider Serar carregado os dados recupedados conforme
     * os parametros montado no sql
     *
     * @param array $columns Colunas a ser exibidas na table
     *
     * @param arary $actionColumns Ações para update, delete, view.
     * A url base é carregada conforme a view
     *
     *
     * @example
     * <code>
     *  columns =>[
     *      @string nome,
     *      @array  nivel =>[
     *              @string 'header'=>'Kanda',
     *              @object 'container' => function( @object $model, @int $key){
     *               @model Valores do dataProvaider
     *               @key   Valor do id da dataProvaider_@primary_key
     *              }
     *      ]
     *  ];
     * </code>
     *

     *
     * @description Os valores da $dataProvider deve ser no padrão do ActiveRecord
     *
     * @example
     *
     * <code>
     * array_merge(
    ['data'=> Kanda::find_by_sql("SELECT nome FROM kanda ")],
    Kanda::attributeLabels(),['primary_key'=>Kanda::$primary_key, ]
    );
     *
     * </code>
     *
     * @example
     *
     * <code>
     *   echo GridView::widget([
     *      'dataProvider' => $dataProvider,
    'columns' => [
    'nivel' => [
    'header'=>'KandaFramework',
    'container'=> function($model,$key){
    return $key;
    }
    ],
    'nome',
    ],
    'actionColumns'=>['update','delete'],
     *  ]);
     * </code>
     */
    public static function widget($param = []) {

        $tr = '';
        $theader = '';
        $table = '';


        foreach ($param['columns'] as $columns) {

            if (is_array($columns)) {
                $theader .= "<th>{$columns['header']}</th>";
            }else {
                if(isset($param['dataProvider'][$columns]))
                    $theader .= "<th>{$param['dataProvider'][$columns]}</th>";
                else{
                    $theader .= "<th>".ucfirst($columns)."</th>";
                }
            }
        }

        $theader .= '<th>Açao</th>';

        $i = 0;
        foreach ($param['dataProvider']['data'] as $column) {

            $primary_key = $column->$param['dataProvider']['primary_key'];

            $tr .= "<tr id='dataProvider_{$primary_key}' >";

            foreach ($param['columns'] as $columns) {

                if (is_array($columns)) {
                    $tr .= "<td>" . $columns['container']($param['dataProvider']['data'][$i], $primary_key) . "</td>";
                } else {
                    if (isset($column->$columns))
                        $tr .= "<td>" . $column->$columns . "</td>";
                    else
                        $tr .= "<td>-</td>";
                }
            }
            $tr .= "<td>" . self::createActionColumns($param['actionColumns'], $param['dataProvider']['primary_key'], $primary_key) . "</td>";
            $tr .= "</tr>";

            ++$i;
        }

        $table = "<table class='table table-bordered table-striped datatable' ><thead><tr>$theader</tr></thead> <tbody>$tr</tbody></table>";
        $table .= "<script>var ConfirmDelete = function(){ };</script>";

        return $table;
    }

    /**
     *
     * @param  type $action
     * @return type
     */
    public static function createActionColumns($action, $param, $id) {


        $i = 0;
        $count = count($action);
        $Action = [];

        $actionColumn = [
            'update' => "<a class='btn btn-info' href='" . parent::$base . "/update/$id'>
                                <i class=\"halflings-icon white edit\"></i>
                            </a>",
            'delete' => "<a class='btn btn-danger' href='" . parent::$base . "/delete/$id' onclick=\" if(confirm('Deseja excluir esse item?')){return true;}else{return false;};\">
                                <i class=\"halflings-icon white trash\"></i>
                            </a>",
            'view' => "<a href='" .parent::$base . "/view/$id' class='btn btn-success'>
                                <i class='fa fa-fw fa-zoom-in'></i>  
                            </a>",
        ];
        foreach ($action as $columns) {

            if (is_array($columns)) {

                $Action[] = $columns['container']($id);
            } else {
                while ($i < $count) {
                    $Action[] = $actionColumn[$action[$i]];
                    ++$i;
                }
            }
        }
        return implode(' ', $Action);
    }

}
