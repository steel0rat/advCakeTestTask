<?php
namespace tests\advCake;
use PHPUnit\Framework\TestCase;
use App\Controllers\textTransformator;

class advCakeTest extends TestCase
{
    private $transformator;

    protected function setUp(): void
    {
        $this->transformator = new textTransformator();
    }

    /**
     # Тестирование нашего класса трансформатора текста заданными в конфиге textArray.php массивами
     *
     # Для начала возьмем массив текстов, у которых мы точно знаем тект до трансформации и текст после трансформации
     *
     * @dataProvider transformTextProvider
     */
    public function testTransform($text,$transformed)
    {
        $this->assertEquals($transformed,$this->transformator->revertCharacters($text));
    }


    /**
     * Проверим, что текст правильно трансформируется - по задумке, текст дважды пропущенный через трансформатор не должен изменится
     *
     * @dataProvider transformTextProvider
     */
    public function testDoubleTransform($text)
    {
        $this->assertEquals($text,$this->transformator->revertCharacters($this->transformator->revertCharacters($text)));
    }

    /**
     # Проверим, что слова также трансформируются правильно
     * @dataProvider transformWordsProvider
     */

    public function testWordTransform($text,$transformed)
    {
        $this->assertEquals($transformed,$this->transformator->revertWord($text));
    }
    /**
     # Проверим, что слова также трансформируются правильно и при двойной трансформации
     * @dataProvider transformWordsProvider
     */

    public function testWordDoubleTransform($text)
    {
        $this->assertEquals($text, $this->transformator->revertWord($this->transformator->revertWord($text)));
    }

    /**
     # Проверим, что, мы можем передать в функцию разные типпы переменных
     * @dataProvider manyTypesWordsProvider
     */

    public function testTypesTransform($text,$transformed)
    {
        $this->assertEquals($transformed, $this->transformator->revertCharacters($text));
    }

    /**
     # Объявим и заполним массив, в котором мы знаем текст до, и желаемый текст после трансформации
     *
     */
    public function transformTextProvider(){

        $textsArraychecked = array();
        $textsArraychecked[] = [
            "Привет! Давно не виделись.",
            "Тевирп! Онвад ен ьсиледив."
        ];
        $textsArraychecked[] = [
            "Hello world!",
            "Olleh dlrow!"
        ];
        $textsArraychecked[] = [
            "123, 321, 123, 321.",
            "321, 123, 321, 123."
        ];
        $textsArraychecked[] = [
            "Мега интересный текст, со знаками пунктуации и уточнением (в скобочках)",
            "Агем йынсеретни тскет, ос имаканз иицауткнуп и меиненчоту (в хакчобокс)"
        ];
        $textsArraychecked[] = [
            "Палиндромы шалаш шорош тащат",
            "Ыморднилап шалаш шорош тащат"
        ];
        $textsArraychecked[] = [
            "Палиндромы шалаш шорош тащат",
            "Ыморднилап шалаш шорош тащат"
        ];
        $textsArraychecked[] = [
            "!,.?/\\",
            "!,.?/\\"
        ];

        //$textsArraychecked[] = [ // развлекухи ради можно указать неправильные данные, чтобы убедится, что unit test работает
        //    "Hello world!",
        //    "321123"
        //];
        return $textsArraychecked;
    }

    /**
    # Объявим и заполним массив, в котором мы знаем слова до, и желаемое слово после трансформации
     *
     */
    public function transformWordsProvider(){
        $wordsArray = array();
        $wordsArray[] = [
            'Hello',
            'Olleh'
        ];
        $wordsArray[] = [
            'Привет',
            'Тевирп'
        ];
        $wordsArray[] = [
            '12345',
            '54321'
        ];
        $wordsArray[] = [
            'LorEm',
            'MerOl'
        ];
        return $wordsArray;
    }

    /**
    # Объявим и заполним массив, в котором используем много разных типпов данных
     *
     */

    public function manyTypesWordsProvider(){
        $typesArray = array();
        $typesArray[] = [
            123321,
            123321
        ];
        $typesArray[] = [
            123456,
            654321
        ];
        $typesArray[] = [
            'Word',
            'Drow'
        ];
        $typesArray[] = [
            ['H','e','l','l','o'],
            ['O','l','l','e','h']
        ];
        $typesArray[] = [
            true,
            false
        ];
        $typesArray[] = [
            1123.113,
            3211.311
        ];
        $typesArray[] = [
            null,
            null
        ];

        return $typesArray;
    }

}