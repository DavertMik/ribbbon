<?php


class APICest
{
    // tests
    public function createClient(ApiTester $I)
    {
        $I->sendPOST('/login', [
          'email' => 'admin@admin.com',
          'password' => '123456789'
        ]);
        $I->sendPOST('/api/clients', ['user_id' => '1', 'name' => 'davert']);
        $I->seeResponseCodeIs(200);
    }
}
