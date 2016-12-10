<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see('Lorem ipsum');
        $I->seeLink('About');
        $I->click('About');
        $I->see('A');
    }
}