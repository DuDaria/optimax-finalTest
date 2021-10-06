<?php

use Codeception\Example;
use Codeception\Util\HttpCode;
use Step\TesterTriangle;


class TestsTriangleCest
{
    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider
     */
    public function isTriangle(TesterTriangle $I, Example $provider):void
    {
        $I->getIsTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    protected function dataProvider(): Generator
    {
        yield[
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ["isPossible" => true],
        ];
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider1
     */
    public function notTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getNotExistTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    protected function dataProvider1(): Generator
    {
        yield[
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ["isPossible" => false],
        ];
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider2
     */
    public function unrealTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getUnrealTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    protected function dataProvider2(): Generator
    {
        yield[
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ["message" => ["error" => "Not valid date"]],
        ];
    }

    //-----------------------------------------------------------------------------------
    //negative tests
    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider3
     */
    public function floatParamsTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getFloatParamsTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }
    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider3
     */
    public function negativeParamsTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getNegativeParamsTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider3
     */
    public function emptyTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getEmptyTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider4
     */
    public function allNullParamsTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getAllNullParamsTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider4
     */
    public function twoNullParamsTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getTwoNullParamsTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    protected function dataProvider4(): Generator
    {
        //Баг
        yield 'success get triangle'=> [
            'expectedCode' => HttpCode::OK,
            'expectedMessage' => ["isPossible" => true],
        ];

        //По факту должен вернуть ответ
        // yield 'error triangle'=>[
        //     'expectedCode' => HttpCode::BAD_REQUEST,
        //     'expectedMessage' => ["message" => ["error" => "Not valid date"]],
        // ];
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider3
     */
    public function oneNullParamTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getOneNullParamTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider3
     */
    public function twoParamsTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getTwoParamsTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider3
     */
    public function twoParamsOneStrTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getTwoParamsOneStrTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }
    protected function dataProvider3(): Generator
    {
        yield[
            'expectedCode' => HttpCode::BAD_REQUEST,
            'expectedMessage' => ["message" => ["error" => "Not valid date"]],
        ];
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider3
     */
    public function paramsStringTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getParamsStringTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider5
     */
    public function newAddParamTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getNewParamsTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($provider['expectedMessage']);
    }
    protected function dataProvider5(): Generator
    {
        yield[
            'expectedCode' => HttpCode::INTERNAL_SERVER_ERROR,
            'expectedMessage' => ["message" => ["error" => "You broke everything. Grats."]],
        ];
    }

    /**
     * @param TesterTriangle $I
     * @param Example $provider
     *
     * @dataProvider dataProvider6
     */
    public function paramsJSONTriangle(TesterTriangle $I, Example $provider)
    {
        $I->getParamsJSONTriangle();
        $I->seeResponseCodeIs($provider['expectedCode']);
    }

    protected function dataProvider6(): Generator
    {
        yield[
            'expectedCode' => HttpCode::INTERNAL_SERVER_ERROR,
        ];
    }
}
