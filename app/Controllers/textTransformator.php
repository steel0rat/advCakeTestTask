<?php
namespace App\Controllers;


class textTransformator
{
    public function revertCharacters($inString)             // функция преобразования предложения
    {

        if(is_bool($inString)) {                            // определяем тип данных
            return !$inString;
        } elseif (is_array($inString)) {
            $arrFlag = true;
            $inString = implode($inString);
        } else {
            $arrFlag = false;
        }

        $return_str = '';
        $exlopedstring = $this->explodeString($inString);
        foreach ($exlopedstring as &$item){
            foreach ($item as &$el) {
                $el =  $this->revertWord($el);
            }
            $return_str .= ($item == end($exlopedstring)) ? implode($item) : implode($item).' ';
        }
        return ($arrFlag) ? mb_str_split($return_str) : $return_str;
    }

    private function explodeString($inStrhing)                  // функция подрыва строки
    {
        $returnArr = array();
        foreach (explode(' ',$inStrhing) as $word){     // взорвем по пробелу, так как каждое слово, независимо от знаков препинания разделяется
            $returnArr[] = preg_split('/([\.,\/!\(\)\?])/', $word, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        }
        return $returnArr;
    }

    public function revertWord($inArray)                        // функция переворачивания слова
    {
        $inArray = mb_str_split($inArray);
        $returnArr = array();
        foreach ($inArray as $key => &$el){
            $letterFunc = (mb_strtolower($el) != $el) ? "mb_strtoupper" : "mb_strtolower";
            $returnArr[] = $letterFunc($inArray[count($inArray) - $key - 1]);
        }
        return implode($returnArr);
    }
}